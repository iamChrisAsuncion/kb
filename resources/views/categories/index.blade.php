@extends('layouts.app')
@section('title', 'Categories')
@section('content')
@include('_nav')
@include('_flash')


<div class="container">
  <div class="row">
  <div class="col-md-6 offset-md-1">
    <table class="table table-striped table-hover">
      <thead>
        <tr class="white rounded">
          <th><a href="
            @if (Request::is('categoriesIDdesc'))
              {{ route('sortcategories.id') }}
            @else
              {{ route('sortcategories.iddesc') }}
            @endif">ID</a></th>

          <th><a href="
            @if (Request::is('categoriesNamedesc'))
              {{ route('sortcategories.name') }}
            @else
              {{ route('sortcategories.namedesc') }}
            @endif">Name</a></th>

        </tr>
      </thead>
  <tbody>
        @foreach ($categories as $cat)
        <tr>
          <td>{{ $cat->id }}</td>
          <td><a href="{{ route('categories.edit', $cat->id) }}">{{ $cat->name }}</a></td>


        </tr>
  @endforeach
    </tbody>
  </table>
  </div>
  <div class="col-md-4">
    <div class="form-group">
{!!Form::open(['route' => 'categories.store'])!!}
{{ Form::text('name', null, ['class' => 'form-control', 'autofocus']) }}
<button type="submit" class="btn btn-block teal accent-4" >Add Category</button>
{!!Form::close()!!}
    </div>

  </div>
  </div>
</div>

{{$categories->links()}}

@include('_footer')
@endsection
