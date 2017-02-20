@if (Auth::check())
<form action="{{ $route or '' }}" method="post">
<div class="container  offset-md-3 mt-4 mb-1">
  <div class="row">
    <div class="md-form col-md-6  mt-1 ml-3 mr-0 mb-1 pl-0">
      <input type="search" name="search" >
      <label for="search">{{ $slot }}</label>
    </div>
    <div class="col-md-1 mt-1 ">
      <button type="submit" name="button" class="btn btn-small btn-primary search"><i class="fa fa-search " aria-hidden="true"></i></button>
    </div>
  </div>
</div>
</form>
@endif
