@extends('layouts.app')
@section('title', $post->title)
@section('content')

@include('_nav')
@include('_flash')



<div class="container">
  <div class="col-md-10 offset-md-1">
    <img src="/images/featured/{{ $post->cover }}" alt="Book Cover" class="w-100">
  </div>
  <div class="row col-md-10 offset-md-1">


  <div class="col-md-3">

    @if ($post->user->id != $users->id )
      <small><em>{{ $users->first_name.' '.$users->middle_name.' '.$users->last_name }}</em></small>

    @endif

  </div>
  <div class="col-md-9 text-right">
      Last updated about {{ $post->updated_at->diffForHumans() }}
  </div>
</div>

    <div class="col-md-10 offset-md-1 mt-1 text-center">
      <h3 class=""><strong>{{ $post->title }}</strong></h3>
    <small><em>{{ $post->user->first_name.' '.$post->user->middle_name.' '.$post->user->last_name }}</em></small>
    </div>
    <div class="col-md-8 offset-md-2">
      <hr>
    </div>

<div class="col-md-10 offset-md-1">

  {!! $post->content !!}
</div>
    <div class="col-md-8 offset-md-2">
        <hr>
      </div>
      <h6></h6>


    <div class="col-md-10 offset-md-1">
      <div class="col-md-12">
        Category:
        {{ $post->category->name }}
      </div>
      <div class="col-md-12 mt-1">
        Tags:
            @foreach ($post->tags as $tag)
                <a href="{{ route('tags.edit', $tag->id) }}">
                    <label class="badge badge-default">
                        {{ $tag->name }}
                    </label>
                </a>
            @endforeach
        </div>
        <hr>
    </div>
    <div class="col-md-10 offset-md-2">
      <p>Description</p>
      <small><em class="text-justify" style="text-indent:50px">{{ $post->description }}</em></small>
</div>
@if (Auth::user()->role_id == 'Librarian')
  <div class="col-md-12 text-center mt-2">
          <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-danger">Update</a>
  </div>
@endif


</div>

@include('_footer')
@endsection
