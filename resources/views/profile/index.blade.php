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
    'route' => ['profile.update', Auth::user()->id],
    'method' => 'put',
    'files' => 'true'
    ])!!}

<div class="container mt-1 ">
<div class="row">
    <div class="col-md-3 mt-1 py-2 px-2 white z-depth-1 mr-1">
        <img src="/images/avatar/{{ Auth::user()->image }}" alt="Profile Picture" class="w-100 img-fluid">
        {{ Form::label('image', 'Change Profile Picture') }}
        <input type="file" name="image">
    </div>
    <div class="col-md-5  pt-2 pb-2 mt-1 z-depth-1 white">
      <div class="form-group md-form">
        {{ Form::text('id_number', null, ['class' => 'form-control disabled', 'disabled' => 'disabled']) }}
        {{ Form::label('id_number', 'ID') }}
      </div>
      <div class="form-group md-form">
        {{ Form::text('first_name', null, ['class' => 'form-control disabled', 'disabled' => 'disabled']) }}
        {{ Form::label('first_name', 'First name') }}
      </div>
      <div class="form-group md-form">
        {{ Form::text('middle_name', null, ['class' => 'form-control']) }}
        {{ Form::label('middle_name', 'Middle name') }}
      </div>
      <div class="form-group md-form">
        {{ Form::text('last_name', null, ['class' => 'form-control disabled', 'disabled' => 'disabled']) }}
        {{ Form::label('last_name', 'Last name') }}
      </div>
      <div class="form-group ">
        {{ Form::label('course', 'Course') }}
        {{ Form::select('course', $courses, Auth::user()->course, ['class' => 'form-control mb-2'] ) }}
      </div>
      <div class="form-group md-form">
        {{ Form::text('address', null, ['class' => 'form-control']) }}
        <label for="address">Address</label>
      </div>
      <div class="form-group md-form">
        {{ Form::text('city', null, ['class' => 'form-control']) }}
        <label for="city">City</label>
      </div>
    </div>



  <div class="col-md-3 mt-1">
    <div class="card">
      <div class="card-header danger-color-dark white-text ">
      Timestamps
      </div>
    <div class="card-block mt">
      <p class="card-text">
      This book was created on {{ Auth::user()->created_at->formatLocalized('%A %d %B %Y %T') }} and last updated around {{ Auth::user()->updated_at->diffForHumans()}}.
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
