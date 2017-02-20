<div class="container logo">
  <div class="col-md-4 offset-md-4">
    <a href="{{ route('home') }}"><img src="/images/logo.png" alt="Logo" class="img-fluid"></a>
  </div>
</div>

@if (Auth::check())
    <form class="" action="{{ route('logout') }}" method="post">
    {{ csrf_field() }}
      <div class="sidenav">
          <div class="cog"><a href="{{ route('settings.account') }}" class="text-white" title="Account Settings"><i class="fa fa-cog" aria-hidden="true"></i></a></div>
          <div class="home"><a href="{{ route('home') }}" class="text-white" title="Home"><i class="fa fa-home" aria-hidden="true"></i></a></div>
          <div class="profile"><a href="{{ route('profile.index') }}" class="text-white " title="Profile Settings"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a></div>
              @if (Auth::user()->role_id == 'Admin')
                <div class="book"><a href="{{ route('clients.index') }}" class="text-white" title="Manage Clients"><i class="fa fa-book" aria-hidden="true"></i></a></div>
              @endif
              @if (Auth::user()->role_id == 'Librarian')
                <div class="book"><a href="{{ route('books.index') }}" class="text-white" title="Manage Books"><i class="fa fa-book" aria-hidden="true"></i></a></div>
              @endif
              @if (Auth::user()->role_id == 'Client')
                <div class="book"><a href="" class="text-white" title="Books"><i class="fa fa-book" aria-hidden="true"></i></a></div>
              @endif
                <div class="sign-out"><button type="submit" class="out" title="Logout"><i class="fa fa-sign-out text-white" aria-hidden="true"></i></button></div>
        </div>
      </form> 

@endif
