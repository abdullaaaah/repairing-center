<nav class="navbar navbar-toggleable-md navbar-expand-md navbar-dark fixed-top" id="navbar">

  <div class="banner-top">
    <div class="container">

      <i class="fa fa-phone" aria-hidden="true"></i> 0800 074 3554

    </div>
  </div>


  <div class="container">

    <a class="navbar-brand" href="#" id="navbar-brand" style="color:#179eed">Repairing.Center</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item {{ $is_page_active['home'] ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('welcome') }}">HOME</a>
        </li>

        <li class="nav-item {{ $is_page_active['about'] ? 'active' : '' }}">
          <a class="nav-link" href="{{route('about')}}">ABOUT</a>
        </li>

        <li class="nav-item {{ $is_page_active['contact'] ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
        </li>

        <li class="nav-item {{ $is_page_active['track'] ? 'active' : '' }}">
          <a class="nav-link" href="{{route('track')}}">TRACKER</a>
        </li>

        <li class="nav-item {{ $is_page_active['repair'] ? 'active' : '' }}" id="nav-booking">
          <a class="nav-link" href="{{route('repair')}}">BOOK NOW</a>
        </li>


      </ul>
    </div>

  </div>
</nav>
