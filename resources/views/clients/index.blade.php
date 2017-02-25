@extends('layouts.app')
@section('title', 'Clients')
@section('content')
  @include('_nav')
  @component('_search')
Looking for someone?
  @endcomponent
  <div class="container">
    <div class=" mt-4 mb-2 row">
      <div class="col-md-2 ">
        <h3>Books</h3>
      </div>
      <div class="col-md-2 offset-md-5 mt-1 mb-1">
        <a href="{{ route('courses.index') }}">Add Courses</a>
      </div>
      <div class="col-md-3 ">
      <a href="{{ route('clients.create') }}" class=""><button type="button" class="btn adding teal accent-4 btn-lg btn-block"><i class="fa fa-plus"></i> Add Clients</button></a>
      </div>
    </div>
  </div>

  <div class="container">

  <table class="table table-striped table-hover">
    <thead>
      <tr class="breadcrumb white rounded z-depth-1">
        <th class=""><a href="
          @if (Request::is('clientIDdesc'))
            {{ route('sortclient.id') }}
          @else
            {{ route('sortclient.iddesc') }}
          @endif
          ">ID</a></th>
        <th class=""><a href="
          @if (Request::is('clientFirstdesc'))
            {{ route('sortclient.first') }}
          @else
            {{ route('sortclient.firstdesc') }}
          @endif
          ">First Name</a></th>
        <th class=""><a href="
          @if (Request::is('clientLasttdesc'))
          {{ route('sortclient.last') }}
        @else
          {{ route('sortclient.lastdesc') }}
        @endif
        ">Last Name</a></th>
        <th class="hidden-md-down"><a href="
          @if (Request::is('clientPhonedesc'))
          {{ route('sortclient.phone') }}
        @else
          {{ route('sortclient.phonedesc') }}
        @endif
        ">Phone</a></th>
        <th class="hidden-md-down"><a href="
          @if (Request::is('clientEmaildesc'))
          {{ route('sortclient.email') }}
        @else
          {{ route('sortclient.emaildesc') }}
        @endif
        ">Email</a></th>
        <th class="hidden-md-down"><a href="
          @if (Request::is('clientRoledesc'))
          {{ route('sortclient.role') }}
        @else
          {{ route('sortclient.roledesc') }}
        @endif
        ">Role</a></th>

      </tr>
    </thead>
<tbody>
      @foreach ($users as $user)

      <tr onclick="document.location = '{{ route('clients.show', $user->id) }}' " @if($user->role_id == 'Disabled')class="text-danger"@endif>
        <td  scope="row">{{ $user->id_number }}</th>
        <td>{{ $user->first_name }}</th>
        <td >{{ $user->last_name }}</th>
        <td class="hidden-md-down">{{ $user->phone }}</th>
        <td class="hidden-md-down">{{ $user->email }}</th>
        <td class="hidden-md-down">{{ $user->role_id }}</th>

      </tr>
@endforeach
  </tbody>
</table>


</div>
  </div>

<div class="container-fluid text-center">
  {!!$users->links();!!}
</div>
@include('_footer')
@endsection
@section('script')



@endsection
