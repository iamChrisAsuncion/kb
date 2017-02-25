<div class="container mt-1 mb-1">
@if(Session::has('Success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
        <p>{{ Session::get('Success') }}</p>
    </div>
@endif
@if(Session::has('Failed'))
    <div class="alert alert-warning mt-1 mr-1 ml-1 mb-1">
        <p>{{ Session::get('Failed') }}</p>
    </div>
@endif
@if(Session::has('password'))

  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
        <p>{{ Session::get('password') }} <a href="{{ route('settings.password') }}">Click here</a></p>
      </div>

@endif
@if($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
      @foreach($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
  </div>
@endif
  </div>
