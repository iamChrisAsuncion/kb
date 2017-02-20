@extends('layouts.app')
@section('title', $book->title)
@section('content')

  @include('_nav')
  @include('_flash')
  {!!Form::model($book, [
    'route' => ['books.update', $book->id],
    'method' => 'put',
    'files' => 'true'
    ])!!}
  <div class="container">
    <div class="row">
      <div class="col-md-3 mt-1 py-2 px-2 white z-depth-1">
        <img src="/images/cover/{{ $book->cover }}" alt="Book Cover" class="w-100 img-fluid">
        <div class="file-field">
            <div class="btn btn-primary btn-sm">
                <input type="file" name="cover">
            </div>
        </div>
      </div>
    <div class="col-md-5 px-3 pt-2 pb-2 mx-1 mt-1 z-depth-1 white">
      <div class="md-form">
        {{ Form::text('title', null, ['class' => 'form-control']) }}
        <label for="title">Title</label>
      </div>

      <div class="md-form">
        {{ Form::text('author', null, ['class' => 'form-control']) }}
        <label for="author">Author</label>
      </div>
          <div class="md-form">
        {{ Form::textarea('description', null, ['class' => 'form-control md-textarea']) }}
        <label for="description">Description</label>
        </div>
          <label for="category_id">Category</label>
          <div class="md-form">
            {{ Form::select('category_id', $categories, $book->category_id, ['class' => "form-control md-select"]) }}
          </div>

          <label for="tags">Tags</label>
        @foreach ($book->tags as $tag)
          <a href="{{ route('tags.edit', $tag->id) }}"><label class="badge badge-default">{{ $tag->name }}</label></a>
        @endforeach
          <div class="md-form">


            {{ Form::select('tags[]', $tags, null, ['class' => "form-control md-select select-multi", 'multiple' => 'multiple']) }}
          </div>

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
          <button type="submit" class="btn btn-danger btn-block btn-lg">Save</button>
          <a href="{{ route('books.show', $book->id) }}" class="btn grey btn-block btn-lg">Cancel</a>
        </div>
      </div>



      </div>
      <div class="col-md-11 mt-1 mb-1 pl-0 pr-0 z-depth-1 white mr-1 ml-1">
        <div class="teal accent-4 white-text pl-3 py-3">
          Book details
        </div>
        <div class="col-md-12 white pt-1">
          <div class="row">
            <div class="col-md-6">
              <p>Publisher:{{ Form::text('publisher', null, ['class' => 'form-control']) }}</p>
              <p>Publication date:{{ Form::text('publication_date', null, ['class' => 'form-control']) }}</p>
            </div>
            <div class="col-md-6">
              <p>Copies: {{ Form::text('copies', null, ['class' => 'form-control']) }}</p>
              <p>Serial no:{{ Form::text('serial', null, ['class' => 'form-control']) }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

{!!Form::close()!!}

@include('_footer')
@endsection
