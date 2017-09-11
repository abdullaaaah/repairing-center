<nav class="navbar navbar-toggleable-md navbar-expand-md navbar-dark fixed-top" id="navbar">
  <div class="container">

    <a class="navbar-brand" href="#" style="color:white">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">

        @if (Auth::guest())

        @else

        <li class="nav-item">
          <a class="nav-link" href="/admin/home">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/admin/manage">Bookings</a>
        </li>


        <style>.dropdown-item{
          color:black !important;
        }</style>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="{{route('show-brands-admin')}}">Add Phones</a>
            <a class="dropdown-item" href="{{route('create-phone')}}">View Phones</a>
            <a class="dropdown-item" href="{{ route('manage-location') }}">Locations</a>
            <a class="dropdown-item" href="{{route('create-fault')}}">Faults</a>
          </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em>Hello, Admin</em></a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          @if(Auth::user()->level == 1)
          <a class="dropdown-item" href="{{ route('create-admin-account') }}">Users</a>
          @endif
          <a class="dropdown-item" href="{{ route('settings', Auth::user()->id) }}">Settings</a>

          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Log out

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>


          </a>


        </div>
    </li>


        @endif



      </ul>
    </div>

  </div>
</nav>
