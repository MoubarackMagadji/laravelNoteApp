@extends('Layouts.layout')

@section('section')
    <a href="{{ route('note.create')}}"><button>Create a note</button></a>

    <h2 class="h2 mt-5">Your notes</h2>

    
    <div class="text-start">
        @foreach ($notes as $note)
            <div class='py-3 border-bottom border-secondary d-flex justify-content-between'>
                <span> {{ $note->title }} </span>
                <span>
                    @if ($note->completed)
                        <button class="btn btn-dark btn-sm me-1">Completed</span>
                    @else
                       <a href='/note/complete/{{ $note->id }}'> <button class="btn btn-warning btn-sm me-1">Complete</span></button>
                    @endif
                    
                    <a href="/note/{{ $note->id }}"><button class='btn btn-primary btn-sm'> View </button></a>
                </span>
            </div>
        @endforeach
    </div>



    <div class='mb-5 mt-5 '>
        @if ($notes->hasPages())
            <nav>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($notes->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">@lang('pagination.previous')</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $notes->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($notes->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $notes->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">@lang('pagination.next')</span>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    </div>

@endsection
