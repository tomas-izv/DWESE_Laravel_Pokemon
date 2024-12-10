@extends('pokemon.base')

@section('basecontent')

    <form action="{{url('pokemon')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">pokemon name</label>
            <input value="{{old('name')}}" required type="text" class="form-control" id="name" name="name" placeholder="pokemon name">
        </div>
        <div class="form-group">
            <label for="price">pokemon lvl</label>
            <input value="{{old('lvl')}}" required type="number" step="1" class="form-control" id="lvl" name="lvl" placeholder="pokemon lvl">
        </div>
        <div class="form-group">
            <label for="type">pokemon type</label>
            <input value="{{old('type')}}" required type="text" class="form-control" id="type" name="type" placeholder="pokemon type">
        </div>
        <button type="submit" class="btn btn-primary">add</button>
    </form>

@endsection