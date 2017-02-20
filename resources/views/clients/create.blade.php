@extends('layouts.app')
@section('title', 'Create Profile')
@section('content')
  @include('_nav')


                    <form class="form-horizontal" role="form" method="POST" action="{{ route('clients.store') }}">
                        {{ csrf_field() }}
<div class="container mt-4 mb-4">
  <div class="col-md-6 offset-md-3">


                        <div class="md-form form-group{{ $errors->has('id_number') ? ' has-error' : '' }}">
                                <input id="id_number" type="text" class="form-control" name="id_number" value="{{ old('id_number') }}" required>
                                <label for="id_number" class="col-md-4 control-label">ID</label>
                                @if ($errors->has('id_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_number') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="md-form form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                                <label for="first_name" class="col-md-4 control-label">Fist name</label>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="md-form form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                <label for="last_name" class="col-md-4 control-label">Last name</label>
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="md-form form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="col-md-4 control-label">Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                        <select class="form-control" name="role_id" required="" value="{{ old('role_id') }}">
                          <option value="">Select Role</option>
                          <option value="Client">Client</option>
                          <option value="Librarian">Librarian</option>
                          <option value="Admin">Administrator</option>
                        </select>
                        @if ($errors->has('role_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('role_id') }}</strong>
                            </span>
                        @endif
                      </div>



                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Create
                                </button>
                            </div>
                        </div>
                                </div>  </div>
                    </form>




@include('_footer')
@endsection
