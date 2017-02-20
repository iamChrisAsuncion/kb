@extends('layouts.app')
@section('title', 'Login')
@section('content')
  @include('_nav')
<div class="container mt-6 mb-6">
    <div class="row">
        <div class="col-md-12 text-center alert alert-danger">

        <h1>This account has been disabled please contact support</h1>
            </div>
        </div>
</div>

@include('_footer')
@endsection
