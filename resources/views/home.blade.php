@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('_nav')
@include('_flash')
@component('_search')
Looking for something?
@endcomponent





@include('_footer')
@endsection
