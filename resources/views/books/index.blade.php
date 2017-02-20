@extends('layouts.app')
@section('title', 'Books')
@section('content')
  @include('_nav')
  @component('_search')
Looking for something?
  @endcomponent
<div class="container">
  <div class=" mt-4 mb-2 row">
    <div class="col-md-2 ">
      <h3>Books</h3>
    </div>
    <div class="col-md-1 offset-md-6 ">
      <a href="{{ route('tags.index') }}">Create Tags</a>
    </div>
    <div class="col-md-1 mb-2">
      <a href="{{ route('categories.index') }}">Create Categories</a>
    </div>
    <div class="col-md-2 ">
    <a href="{{ route('books.create') }}" class=""><button type="button" class="btn adding teal accent-4 btn-lg btn-block"><i class="fa fa-plus"></i></button></a>
    </div>
  </div>
</div>

<div class="container">


  <table class="table table-hover table-striped">
    <thead >
      <tr class="breadcrumb white rounded z-depth-1">
        <th><a href="
          @if (Request::is('books') || Request::is('booksSerialdesc'))
            {{ route('sortbooks.serial') }}
          @else
            {{ route('sortbooks.serialdesc') }}
          @endif">Serial</a></th>
        <th><a href="
          @if (Request::is('books') || Request::is('booksTitledesc'))
            {{ route('sortbooks.title') }}
          @else
            {{ route('sortbooks.titledesc') }}
          @endif">Title</a></th>
        <th><a href="
          @if (Request::is('books') || Request::is('booksAuthordesc'))
            {{ route('sortbooks.author') }}
          @else
            {{ route('sortbooks.authordesc') }}
          @endif">Author</a></th>
        <th class="hidden-md-down">Description</th>
        <th class="hidden-md-down">Copies</th>
        <th class="hidden-md-down">Action</th>
      </tr>
    </thead>
<tbody>
  @foreach ($books as $book)
  <tr>
    <td><a href="{{ route('books.show', $book->id) }}">{{ $book->serial }}</a></th>
    <td>{{ $book->title }}</th>
    <td>{{ $book->author }}</th>
    <td class="hidden-md-down">{{ substr($book->description, 0, 100)}} @if (strlen($book->description) > 100) ... @endif</th>
    <td class="hidden-md-down">{{ $book->copies }}</th>
    <td class="hidden-md-down"><a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-success btn-small"><i class="fa fa-pencil" aria-hidden="true"></i></a></th>
  </tr>
@endforeach
  </tbody>
</table>
</div>
<div class="container-fluid text-center">
  {!!$books->links();!!}
</div>
@include('_footer')
@endsection
