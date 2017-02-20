@extends('layouts.app')
@section('content')
@section('title', $user->id_number)
@include('_nav')
@include('_flash')
<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.reset') }}">
    {{ csrf_field() }}
<div class="container">
  <div class="row">
    <div class="col-md-3 ml-1 mr-1 mt-1 py-2 px-2 white z-depth-1">
      <img src="/images/avatar/{{ $user->image }}" alt="Book Cover" class="w-100">
    </div>
  <div class="col-md-5 px-3 pt-2 pb-2 ml-1 mr-1 mt-1 z-depth-1 white">
    <div class="row px-3 ">
    <h3><strong>{{ $user->first_name . " " . $user->last_name}}</strong></h3><h6>{{$user->role_id }}</h6>
  </div>
<div class="teal accent-4 text-white pl-2">
      <hr class="mt-0 mb-0">
      <p >{{ $user->id_number }}</p>
</div>      <table class="table table-hover">
        <thead>

        <tbody>
          <tr>
            <th scope="row">Email:</th>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <th scope="row">Phone:</th>
            <td>{{ $user->phone }}</td>
          </tr>
          <tr>
            <th scope="row">Course:</th>
            <td>{{ $course->course}}</td>
          </tr>
          <tr>
            <th scope="row">Address:</th>
            <td>{{ $user->address . " " . $user->city  }}</td>
          </tr>
        </tbody>
      </table>

      <h6></h6>



        <hr>
    </div>

    <div class="col-md-3 mt-1">
      <div class="card">
        <div class="card-header danger-color-dark white-text">
        Timestamps
        </div>
      <div class="card-block mt">
        <p class="card-text">
        This book was added to the Knowledge Base on: {{ $user->created_at->formatLocalized('%A %d %B %Y %T') }} and last updated about {{ $user->updated_at->diffForHumans() }}.
        </p>
        <a href="{{ route('clients.edit', $user->id) }}" class="btn btn-danger btn-block">Update</a>
        <button type="submit" class="btn btn-primary btn-block">Send Token</button>
      </div>
    </div>
    </div>

<input id="email" type="hidden" class="form-control" name="email" value="{{ $user->email }}" required>
</div>
</div>





</form>
@include('_footer')
@endsection
