@extends('layouts.app')
@section('title', Auth::user()->first_name.' '.Auth::user()->last_name)
@section('content')
@include('_nav')
@include('_flash')


<div class="container">
  <ul class="nav justify-content-center breadcrumb rounded white z-depth-1">
    <li class="nav-item">
      <a class="nav-link {{ Request::is('profile') ? "disabled" : "" }}" href="{{ route('profile.index') }}">Profile Settings</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('settings/account') ? "disabled" : "" }}" href="{{ route('settings.account') }}">Account Settings</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('settings/password') ? "disabled" : "" }}" href="{{ route('settings.password') }}">Password Settings</a>
    </li>
  </ul>
</div>


  {!!Form::model(Auth::user(), [
    'route' => ['settings.account.update', Auth::user()->id],
    'method' => 'put',

    ])!!}
    <div class="container mt-3 ">
      <div class="row">
        <div class="col-md-3 mt-1 py-2 px-2 white z-depth-1 mr-1">
            <img src="/images/avatar/{{ Auth::user()->image }}" alt="Profile Picture" class="w-100 img-fluid">
        </div>



<div class="col-md-5 mt-1 white z-depth-1 pt-2 pb-2">

  <div class="form-group md-form mt-3">

    {{ Form::email('email', null, ['class' => 'form-control']) }}
        {{ Form::label('email', 'Email-address') }}
  </div>
  <div class="form-group md-form">

    {{ Form::text('phone', null, ['class' => 'form-control']) }}
        {{ Form::label('phone', 'Phone number') }}
  </div>
  <div class="form-group md-form">

  <input type="password" name="password" class="form-control" required>
        {{ Form::label('password', 'Enter password to confirm changes') }}
  </div>



  </div>
  <div class="col-md-3 mt-1">
    <div class="card">
      <div class="card-header danger-color-dark white-text ">
      Timestamps
      </div>
    <div class="card-block mt">
      <p class="card-text">
      This account was created on {{ Auth::user()->created_at->formatLocalized('%A %d %B %Y %T') }} and last updated around {{ Auth::user()->updated_at->diffForHumans()}}.
      </p>
      <button type="submit" class="btn btn-danger" name="button">Update</button>
    </div>
  </div>
    </div>
    </div>
      </div>
{!!Form::close()!!}

@include('_footer')
@endsection
