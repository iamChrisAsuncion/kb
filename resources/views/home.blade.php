@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('_nav')
@component('_search')
Looking for something?
@endcomponent
<div class="container">
  <div class="col-md-12">
    <div class="row">
    @include('layouts.cards')
    @include('layouts.cards')
    @include('layouts.cards')
    @include('layouts.cards')
  </div>
  </div>
</div>

@include('_footer')
@endsection
