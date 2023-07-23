@extends('Layouts.layout')

@section('section')
    
    <button class="btn btn-sm btn-secondary mb-4  ">
        <a class='text-decoration-none text-white' href=" {{ url()->previous() }}">Back</a>
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
        <button class="btn btn-primary btn-sm px-3 me-3">Edit</button>
        <form action="">
            <button class="btn btn-sm btn-danger">Delete</button>
        </form>
    </div>
@endsection