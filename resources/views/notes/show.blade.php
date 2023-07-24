@extends('Layouts.layout')

@section('section')
    
    <button class="btn btn-sm btn-secondary mb-4  ">
        <a class='text-decoration-none text-white' href=" {{ url('/notes') }}">Back</a>
    </button>
    <div class="bg-secondary p-3">
        <div class="d-flex justify-content-between mb-3">
            <span class="fw-bold">{{ $note->title }}</span>
            <span class="fw-bold">{{ $note->created_at->format('d/m/Y') }}</span>
        </div>
        <div class="bg-dark text-white border-white rounded p-5 text-start">
            {{$note->description}}
        </div>
    </div>

    <div class="p-5 d-flex justify-content-center">

        @if (!$note->completed)
            <a href='/note/complete/{{ $note->id }}'> <button class="btn btn-warning btn-sm me-1">Complete</span></button>   
        @endif
         
        <a href=' {{ route('note.edit', ['note'=> $note->id]) }}'><button class="btn btn-primary btn-sm px-3 me-1">Edit</button></a>
        
        <a href=' {{ route('note.delete', ['note'=> $note->id]) }}'><button class="btn btn-danger btn-sm px-3">Delete</button></a>
        
    </div>
@endsection