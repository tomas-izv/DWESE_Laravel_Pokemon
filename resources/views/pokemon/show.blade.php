@extends('pokemon.base')

@section('basecontent')

    <div class="form-group">
        pokemon id #:
        {{$pokemon->id}}
    </div>
    <div class="form-group">
        pokemon name:
        {{$pokemon->name}}
    </div>
    <div class="form-group">
        pokemon lvl:
        {{$pokemon->lvl}}
    </div>
    <div class="form-group">
        pokemon type:
        {{$pokemon->type}}
    </div>
    <div class="form-group">
        <a href="{{url()->previous()}}">back</a>
    </div>

@endsection