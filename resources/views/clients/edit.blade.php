@extends('layouts.app')
@section('title', $user->id_number)
@section('content')
@include('_nav')
@include('_flash')

{!!Form::model($user, [
  'route' => ['clients.update', $user->id],
  'method' => 'put',
])!!}

<div class="container">
  <div class="row">
    <div class="col-md-3 ml-1 mr-1 mt-1 py-2 px-2 white z-depth-1">
      <img src="/images/avatar/{{ $user->image }}" alt="Book Cover" class="w-100 img-fluid">
    </div>
  <div class="col-md-5 px-3 pt-2 pb-2 ml-1 mr-1 mt-1 z-depth-1 white">

    <div class="form-group md-form">
    {{ Form::text('id_number', null, ['class' => 'form-control']) }}
    <label for="id_number">ID</label>
    </div>
<div class="form-group md-form">
  {{ Form::text('first_name', null, ['class' => 'form-control']) }}
<label for="first_name">First name</label>
</div><div class="form-group md-form">
{{ Form::text('last_name', null, ['class' => 'form-control']) }}
<label for="last_name">Last name</label>
</div><div class="form-group">
</div><div class="form-group md-form">
{{ Form::email('email', null, ['class' => 'form-control']) }}
<label for="email">Last name</label>
</div><div class="form-group">
  <label for="role_id">Role</label>
{{Form::select('role_id', ['Client' => 'Client', 'Librarian' => 'Librarian', 'Admin' => 'Administrator', 'Disabled' => 'Disabled'], null, ['class' => 'form-control'])}}

</div>

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
<button type="submit" class="btn btn-danger btn-block">Save</button>
<a href="{{ route('clients.show', $user->id) }}" class="btn grey btn-block">Cancel</a>
</div>
</div>

</div>
</div>
</div>


{!!Form::close()!!}
@include('_footer')
@endsection
