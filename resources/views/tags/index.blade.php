@extends('layouts.app')
@section('title', 'Tags')
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
            @if (Request::is('tagsIDdesc'))
              {{ route('sorttags.id') }}
            @else
              {{ route('sorttags.iddesc') }}
            @endif">ID</a></th>

          <th><a href="
            @if (Request::is('tagsNamedesc'))
              {{ route('sorttags.name') }}
            @else
              {{ route('sorttags.namedesc') }}
            @endif">Name</a></th>

        </tr>
      </thead>
  <tbody>
        @foreach ($tags as $tag)
        <tr>
          <td>{{ $tag->id }}</td>
          <td><a href="{{ route('tags.edit', $tag->id) }}">{{ $tag->name }}</a></td>


        </tr>
  @endforeach
</tbody>
</table>
</div>
<div class="col-md-4">
<div class="form-group">
{!!Form::open(['route' => 'tags.store'])!!}
{{ Form::text('name', null, ['class' => 'form-control', 'autofocus']) }}
<button type="submit" class="btn btn-block teal accent-4">Add Tag</button>
{!!Form::close()!!}
</div>

</div>
</div>
</div>

{{$tags->links()}}

@include('_footer')
@endsection
