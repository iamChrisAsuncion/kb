@extends('layouts.app')
@section('title', 'Categories'.' - '.$categories->name)
@section('content')
@include('_nav')
@include('_flash')

{!!Form::model('Category', [
  'route' => ['categories.update', $categories->id],
  'method' => 'put',
  ])!!}
  <div class="container mt-5">
    <div class="row">
    <div class="md-form col-md-6">
      {{ Form::text('name', $categories->name) }}
      <label for="name" class="ml-3">Category</label>
      <div class="row mt-1">
        <div class="col-md-5 offset-md-1 mr-1 ">
        <button type="submit" name="button" class="btn btn-danger btn-block">Update</button>
      </div>
      <div class="col-md-5 mr-1  ">
      <a href="{{ route('categories.index') }}" name="button" class="btn grey darken-1 btn-block">Cancel</a>
      </div>
      </div>

    </div>
    <div class="col-md-6">
    <div class="row">
      <div class="col-md-6">
        <p>Related Books</p>

@foreach ($categories->books as $cats)
      <p><a href={{ route('books.show', $cats->id) }}><small>{{ $cats->title }}</small></a></p>

      @endforeach
      </div>
      <div class="col-md-6">
        <p>Related Posts</p>
        @foreach ($categories->posts as $cats)

        <p><a href={{ route('books.show', $cats->id) }}><small>{{ $cats->title }}</small></a></p>

        @endforeach
      </div>

    </div>
    </div>

    </div>
  </div>
<div class="container">
  <div class="col-md-2 offset-md-4">

  </div>

</div>

{!!Form::close()!!}



@include('_footer')
@endsection
