@extends('layouts.app')

@section('content')
    @include('_nav')
<div class="container mt-6 mb-6">
        <div class="col-md-4 offset-md-4 text-center">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="text-left md-form form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                                <label for="email" >Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="text-left md-form form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" required>
                            <label for="password" >Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="text-left md-form form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            <label for="password-confirm">Confirm Password</label>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Reset Password
                                </button>
                        </div>

                    </form>
                </div>
            </div>


@include('_footer')
@endsection
