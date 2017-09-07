<nav class="navbar navbar-expand-md navbar-dark fixed-top" id="navbar">
  <div class="container">

    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">

        @if (Auth::guest())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">LOGOUT</a>
        </li>
        @else

        <li class="nav-item {{ $is_page_active['admin_home'] ? 'active' : '' }}">
          <a class="nav-link" href="/admin/home">HOME</a>
        </li>

        <li class="nav-item {{ $is_page_active['manage'] ? 'active' : '' }}">
          <a class="nav-link" href="/admin/manage">MANAGE REPAIRS</a>
        </li>

        <li class="nav-item {{ $is_page_active['inventory'] ? 'active' : '' }}">
          <a class="nav-link" href="/admin/inventory">INVENTORY</a>
        </li>

        <li class="nav-item {{ $is_page_active['location'] ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('manage-location') }}">MANAGE LOCATIONS</a>
        </li>


        <li class="nav-item {{ $is_page_active['settings'] ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('settings', Auth::user()->id) }}">SETTINGS</a>
        </li>


        <!--<li class="nav-item {{ $is_page_active['sales'] ? 'active' : '' }}">
          <a class="nav-link" href="/admin/sales">SALES</a>
        </li>-->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                LOGOUT
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </li>


        @endif



      </ul>
    </div>

  </div>
</nav>
