@extends('Layouts.layout')

@section('section')
    <h1 class="h1 text-secondary text-center mt-4">Welcome to your note</h1>


    <a href="{{ route('notes')}}">View notes</a>
@endsection