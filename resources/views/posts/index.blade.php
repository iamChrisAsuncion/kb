@extends('layouts.app')
@section('title', 'Posts')
@section('content')
  @include('_nav')
  @component('_search')
Looking for something?
  @endcomponent
<div class="container">
  <div class=" mt-4 mb-2 row">
    <div class="col-md-2 ">
      <h3>Posts</h3>
    </div>
    <div class="col-md-1 offset-md-6 ">
      <a href="{{ route('tags.index') }}">Create Tags</a>
    </div>
    <div class="col-md-1 mb-2">
      <a href="{{ route('categories.index') }}">Create Categories</a>
    </div>
    <div class="col-md-2 ">
    <a href="{{ route('posts.create') }}" class=""><button type="button" class="btn adding teal accent-4 btn-lg btn-block"><i class="fa fa-plus"></i></button></a>
    </div>
  </div>
</div>

<div class="container">


  <table class="table table-hover table-striped">
    <thead >
      <tr class="breadcrumb white rounded z-depth-1">
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Description</th>
        <th class="hidden-md-down">Action</th>
      </tr>
    </thead>
<tbody>
  @foreach ($posts as $post)
<tr onclick="document.location = '{{ route('posts.show', $post->id ) }}';">
    <td>{{ $post->id }}</th>
    <td>{{ $post->title }}</th>
      <td>{{ $post->author }}</th>
    <td>{{ $post->description }}</th>
    <td class="hidden-md-down"><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-success btn-small"><i class="fa fa-pencil" aria-hidden="true"></i></a></th>
  </tr>
@endforeach
  </tbody>
</table>
</div>
<div class="container-fluid text-center">
  {{-- {!!$posts->links();!!} --}}
</div>
@include('_footer')
@endsection
