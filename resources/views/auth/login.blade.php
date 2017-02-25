@extends('layouts.app')
@section('title', 'Login')
@section('content')
  @include('_nav')
  @include('_flash')
<div class="container mt-6 mb-6">
    <div class="row">
        <div class="col-md-4 offset-md-4 px-0">

                    <form class="form-group px-3" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}


                            <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="control-label">Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                        <div class=" md-form{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label for="password" class="control-label">Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="checkbox11"  class="filled-in"  name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="checkbox11">Remember me</label>
                        </div>


                          <div class="mt-1">
                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>
                          </div>

                          <div class="text-center mb-2 mt-1">
                            <a class="" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                          </div>

                            </div>
                        </div>
                    </form>
            </div>
        </div>
</div>

@include('_footer')
@endsection
