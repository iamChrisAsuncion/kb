@extends('layouts.app')

@section('content')
  @include('_nav')
<div class="container">
    <div class="col-md-4 offset-md-4 text-center mb-6 mt-6">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group md-form{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="col-md-4 control-label">Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong >{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Send Password Reset Link
                                </button>
                            </div>

                    </form>




                  </div>
</div>
@include('_footer')
@endsection
