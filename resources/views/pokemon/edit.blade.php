@extends('pokemon.base')

@section('basecontent')

    <form action="{{url('pokemon/' . $pokemon->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">pokemon name</label>
            <input value="{{old('name', $pokemon->name)}}" required type="text" class="form-control" id="name" name="name" placeholder="pokemon name">
        </div>
        <div class="form-group">
            <label for="lvl">pokemon lvl</label>
            <input value="{{old('lvl', $pokemon->lvl)}}" required type="number" step="0.001" class="form-control" id="lvl" name="lvl" placeholder="pokemon lvl">
        </div>
        <div class="form-group">
            <label for="name">pokemon type</label>
            <input value="{{old('type', $pokemon->type)}}" required type="text" class="form-control" id="type" name="type" placeholder="pokemon type">
        </div>
        <button type="submit" class="btn btn-primary">edit</button>
    </form>

@endsection