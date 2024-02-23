@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>cose</h1>
    <ul>
        @foreach ($projects as $project)

            <li>
                <div>progetto: {{$project -> name}}</div>
                <div>tipo: {{$project -> type -> category}}</div>
                <br>
            </li>
            
        @endforeach
    </ul>
@endsection
