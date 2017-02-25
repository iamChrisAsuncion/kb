<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Knowledge Base | @yield('title')</title>

    <!-- Styles -->

{{-- {{  Html::style('css/font-awesome.css') }} --}}
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
{{-- {{  Html::style('css/bootstrap.css') }} --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
{{-- {{  Html::style('css/mdb.min.css') }} --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.css" integrity="sha256-4/9iq/+iow89Nx/bDcz2A4Rrzxowc9SWOk1hpWAjoZw=" crossorigin="anonymous" />
{{  Html::style('css/app.css') }}
@yield('styles')

    <!-- Scripts -->
{{-- <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script> --}}
</head>
<body>
  @yield('content')





    <!-- Scripts -->


      {{-- {!!Html::script('js/jquery-3.1.1.js')!!} --}}
      {{-- {!!Html::script('js/bootstrap.js')!!} --}}

      {{-- {!!Html::script('js/mdb.min.js')!!} --}}

      <script
        src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
      {{-- <script src="https://code.jquery.com/jquery-3.1.1.js"  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script> --}}
      {!!Html::script('js/tether.min.js')!!}
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/js/mdb.min.js" type="text/javascript"></script>

@yield('script')
      {!!Html::script('js/app.js')!!}


</body>
</html>
