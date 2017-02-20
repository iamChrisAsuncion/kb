@if(Session::has('Success'))
    <div class="alert alert-success mt-1 mr-1 ml-1 mb-1">
        <p>{{ Session::get('Success') }}</p>
    </div>
@endif
@if(Session::has('Failed'))
    <div class="alert alert-warning mt-1 mr-1 ml-1 mb-1">
        <p>{{ Session::get('Failed') }}</p>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-dismissible alert-danger mt-1 mr-1 ml-1 mb-1">
      @foreach($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
  </div>
@endif
