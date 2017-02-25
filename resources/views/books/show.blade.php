@extends('layouts.app')
@section('title', $book->title)
@section('content')

@include('_nav')
@include('_flash')

<div class="container">
  <div class="row">
    <div class="col-md-3 ml-1 mr-1 mt-1 py-2 px-2 white z-depth-1">
      <img src="/images/cover/{{ $book->cover }}" alt="Book Cover" class="w-100">
    </div>
  <div class="col-md-5 px-3 pt-2 pb-2 ml-1 mr-1 mt-1 z-depth-1 white">
      <h3><strong>{{ $book->title }}</strong></h3>
      <hr class="mt-0">
      <p>by: <em>{{ $book->author }}</em></p>
      <h6 class="mt-2">Description:</h6>
      <h6 class="text-justify">{{ $book->description }}</h6>
      <hr>
      <h6>{{ $book->category->name }}</h6>



        @foreach ($book->tags as $tag)
            <a href="{{ route('tags.edit', $tag->id) }}"><div class="chip">
{{ $tag->name }}
            </div></a>
        @endforeach
        <hr>
    </div>

    <div class="col-md-3 mt-1">
      <div class="card">
        <div class="card-header danger-color-dark white-text">
        Timestamps
        </div>
      <div class="card-block mt">
        <p class="card-text">
        This book was added to the Knowledge Base on: {{ $book->created_at->formatLocalized('%A %d %B %Y %T') }} and last updated {{ $book->updated_at->diffForHumans() }}.
        </p>
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-danger">Update</a>
      </div>
    </div>



    </div>
    <div class="col-md-11 mt-1 mb-1 pl-0 pr-0 z-depth-1 white">
      <div class="teal accent-4 white-text pl-3 py-3">
        Book details
      </div>
      <div class="col-md-12 white pt-1">
        <div class="row">
          <div class="col-md-6">
                    <hr>
            <p>Publisher: {{ $book->publisher }}</p>
            <p>Publication date: {{ $book->publication_date }}</p>
                    <hr>
          </div>
          <div class="col-md-6">
                      <hr>
            <p>Copies: {{ $book->copies }}</p>
            <p>Serial no: {{ $book->serial }}</p>
                      <hr>
          </div>
        </div>
      </div>


    </div>
  </div>

</div>
@include('_footer')
@endsection
