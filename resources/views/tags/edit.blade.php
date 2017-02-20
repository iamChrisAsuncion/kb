@extends('layouts.app')
@section('title', 'Categories'.' - '.$tags->name)
@section('content')
@include('_nav')
@include('_flash')

{!!Form::model('Category', [
  'route' => ['tags.update', $tags->id],
  'method' => 'put',
  ])!!}
  <div class="container mt-5">
    <div class="row">
    <div class="md-form col-md-6">
      {{ Form::text('name', $tags->name) }}
      <label for="name">Category</label>
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
      <h6>Related Books</h6>
    <div class="row mt-1">
      @foreach ($tags->books as $tag)

      <h5><a href={{ route('books.show', $tag->id) }}><label for="" class="badge badge-default my-1 mx-1">{{ $tag->title }}</label></a></h5>
      @endforeach
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
