@extends('layouts.app')
@section('title', $user->first_name.' '$user->last_name)
@section('content')
  @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


  {!!Form::model($user, [
    'route' => ['profile.update', $user->id],
    'method' => 'put',
    ])!!}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <img src="#" alt="">

    </div>
    <div class="col-md-6">

      <p>First Name: {{ Form::text('first_name', null, ['class' => 'form-control']) }}<span>Last Name:{{ Form::text('last_name', null, ['class' => 'form-control']) }}  </span> </p>
      <p>{{ Form::text('id_number', null, ['class' => 'form-control']) }}</p>
      <p>{{Form::select('role_id', ['Client' => 'Client', 'Librarian' => 'Librarian', 'Admin' => 'Administrator'], null, ['class' => 'form-control'])}}</p>
    </div>
    <div class="col-md-3">
      <button type="submit" class="btn btn-danger btn-block btn-lg">Save</button>

      <a href="{{ route('clients.show', $user->id) }}" class="btn grey btn-block btn-lg">Cancel</a>
    </div>
    <div class="col-md-10 offset-md-1">
      <h6>{{ $user->phone }}</h6>
      <h6>{{ $user->email }}</h6>
    </div>
  </div>

</div>
{!!Form::close()!!}
@endsection
