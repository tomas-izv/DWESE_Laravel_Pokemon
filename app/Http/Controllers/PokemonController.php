<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{

    function index() {
        return view('pokemon.index', ['lipokemon' => 'active',
                                        'pokemon' => Pokemon::orderBy('name')->get(),]);
    }

    function create() {
        return view('pokemon.create', ['lipokemon' => 'active']);
    }

    function store(Request $request) {
        $validated = $request->validate([
            'name'  => 'required|unique:pokemon|max:100|min:2',
            'lvl' => 'required|numeric|gte:0|lte:100000',
            'type'  => 'required|unique:pokemon|max:100|min:2',
        ]);
        $pokemon = new Pokemon($request->all());
        try {
            //$result = $object->save();
            $pokemon = Pokemon::create($request->all());
            return redirect('pokemon')->with(['message' => 'The pokemon has been created.']);
        } catch(\Exception $e) {
            //si no lo he guardado volver a la página anterior con sus datos para volver a rellenar el formulario y mensaje
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been created.']);
        }
    }

    function show(Request $request, $id)
    {
        $pokemon = Pokemon::find($id);
        if ($pokemon === null) {
            abort(404);
        }
        return view('pokemon.show', ['lipokemon' => 'active', 'pokemon' => $pokemon]);
    }
    // function show(pokemon $pokemon) {
    //     return view('pokemon.show', ['lipokemon' => 'active',
    //                                     'pokemon' => $pokemon,]);
    // }

    function edit(Request $request, Pokemon $pokemon) {
        return view('pokemon.edit', ['lipokemon' => 'active',
                                        'pokemon' => $pokemon,]);
    }

    function update(Request $request, Pokemon $pokemon) {
        $validated = $request->validate([
            'name'  => 'required|max:100|min:2|unique:pokemon,name,' . $pokemon->id,
            'lvl' => 'required|numeric|gte:0|lte:100000',
            'type'  => 'required|max:100|min:2'
        ]);
        try {
            $result = $pokemon->update($request->all());
            //$pokemon->fill($request->all());
            //$result = $pokemon->save();
            return redirect('pokemon')->with(['message' => 'The pokemon has been updated.']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been updated.']);
        }
    }

    function destroy(Pokemon $pokemon) {
        try {
            $pokemon->delete();
            return redirect('pokemon')->with(['message' => 'The pokemon has been deleted.']);
        } catch(\Exception $e) {
             return back()->withErrors(['message' => 'The pokemon has not been deleted.']);
        }
    }
}