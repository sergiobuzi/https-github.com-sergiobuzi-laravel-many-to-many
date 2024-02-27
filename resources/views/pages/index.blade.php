@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>cose</h1>
    <a href=" {{route('project.create')}}">CREA UN NUOVO PROGETTO</a>
    <br><br>
    <ul>
        @foreach ($projects as $project)

            <li>
                <div><b>progetto:</b> {{$project -> name}}</div>
                <div><b>tipo:</b> {{$project -> type -> category}}</div>
                <img src="{{ asset('storage/' . $project -> image )}}" alt="">
                
                @foreach ($project ->technologies as $technology)
                    <div><b>tecnologia:</b> {{$technology -> name}}</div>
                @endforeach 
                <br>      
            </li>
            
        @endforeach


        
    </ul>
@endsection
