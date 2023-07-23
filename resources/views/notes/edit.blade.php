@extends('Layouts.layout')


@section('section')

    
    
    <h3 class='h3'>Update a note</h3>
    <div class="text-center d-flex justify-content-center">
        <form action="{{route('note.store')}}" method='post' class='w-50 text-start'>

            @csrf

            <div class="mb-2">
                <label class='form-label fw-bold' for="">Title</label>
                <input type="text" name='title' value="{{ old('title') ? old('title') : $note->title }}" class='form-control '>

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label class='form-label fw-bold' for="">Description</label>
                <textarea class='form-control' name='description'  >{{ old('description') ? old('description') : $note->description }} </textarea>
                
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-check mb-2">
                <input class="form-check-input" name='completed' type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
            </div>

            <div class="mb-2">
                <input type="submit" class="btn btn-primary btn-sm px-4">
            </div>
        </form>
    </div>
@endsection