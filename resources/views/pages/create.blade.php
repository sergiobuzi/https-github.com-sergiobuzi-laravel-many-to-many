@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>crea un nuovo progetto</h1>
    <form method="POST">

        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        <br>
        <label for="type_id">Type</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type -> id }}">{{$type -> category }}</option>
            @endforeach
        </select>
        <br>
        @foreach ($technologies as $technology)
                <div>
                    <input 
                    type="checkbox"
                    name="technology_id[]"
                    value="{{$technology -> id}}"
                    id="{{$technology -> id}}"                    
                    >

                    <label for="{{$technology -> id}}">
                        {{$technology-> name}}
                    </label>
                </div>
        @endforeach
        <input type="submit" value="CREATE">
    </form>

@endsection