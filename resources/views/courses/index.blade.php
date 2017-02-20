@extends('layouts.app')
@section('title', 'Course')
@section('content')
@include('_nav')
@include('_flash')


<div class="container  mt-4">
  <div class="row">
  <div class="col-md-6 offset-md-2">
    <table class="table table-striped table-hover">
      <thead>
        <tr class="white rounded">
          <th><a href="
            @if (Request::is('courseIDdesc'))
              {{ route('sortcourse.id') }}
            @else
              {{ route('sortcourse.iddesc') }}
            @endif">ID</a></th>

          <th><a href="
            @if (Request::is('courseCoursedesc'))
              {{ route('sortcourse.course') }}
            @else
              {{ route('sortcourse.coursedesc') }}
            @endif">Course</a></th>
            <th><a href="
              @if (Request::is('courseCodedesc'))
                {{ route('sortcourse.code') }}
              @else
                {{ route('sortcourse.codedesc') }}
              @endif">Code</a></th>
        </tr>
      </thead>
  <tbody>
        @foreach ($courses as $course)
        <tr>
          <td>{{ $course->id }}</td>
          <td><a href="{{ route('courses.edit', $course->id) }}">{{ $course->course }}</a></td>
          <td>{{ $course->code }}</td>


        </tr>
  @endforeach
    </tbody>
  </table>
  </div>
  <div class="col-md-3 white ml-2 mr-2 z-depth-1 pt-3 pb-2">
    <div class="form-group">
{!!Form::open(['route' => 'courses.store'])!!}

<div class="form-group md-form">
  {{ Form::text('course', null, ['class' => 'form-control']) }}
  <label for="course">Course Name</label>
</div>
<div class="form-group md-form">
  {{ Form::text('code', null, ['class' => 'form-control']) }}
  <label for="code">Course Code</label>
</div>
{{ Form::submit('Submit', ['class' => 'btn teal accent-4 btn-block']) }}
{!!Form::close()!!}
    </div>

  </div>
  </div>
</div>
@include('_footer')
@endsection
