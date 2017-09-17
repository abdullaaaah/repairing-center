@extends('layouts.master')


@section('content')

<style>
body {padding-top:0px;}
#navbar-brand
{
  color:#179eed !important;
}

#navbar {
  border-bottom:4px solid #17AFF2;
}

#navbar
{
  background-color:#179eed;
  background-color:white;
}

#navbar .nav-item a {
  color:#179eed;
}

#nav-booking {
  margin-left:0px;
}

.banner-top div {
  color:#179eed !important;
  border-bottom:1px solid #eee;
}

</style>

<section class="cover-1 text-center" id="home-section-1">
  <div class="cover-container pb-5">
    <div class="cover-inner container">
        <h1 class="jumbotron-heading">Say <em>hello</em> to <strong>Online Repairing</strong></h1>
        <p class="lead"><strong>Broken phone?</strong> We collect, fix & deliver directly to you!</p>
        <p>
          <a href="{{route('repair')}}" class="btn btn-primary btn-lg mb-2 mr-2 ml-2" style="background-color:#99d954; border-color:#99d954; width:209px; left:-15px";>GET QUOTE</a>
          <a href="{{route('about')}}" class="btn btn-outline-white btn-lg mb-2 ml-2 ml-2" style="width:209px; margin-left:0px !important;">LEARN MORE</a>
        </p>
    </div>
  </div>
</section>

<section class="features-1 text-center">
  <div class="container">
    <h2>How does this work?</h2>
    <div class="divider"></div>
    <div class="row">
      <div class="col-md-4 col-feature">
        <div class="rounded-circle justify-center">
          <em class="fa fa-2x fa-paint-brush"></em>
        </div>
        <h4>Reserve your repair</h4>
        <p>You can reserve your repair at our website at a 100% free cost. You don't have to pay a dime until the repair is complete. </p>
        <p><a class="btn btn-outline-primary mt-2" href="{{route('repair')}}" role="button">Reserve now</a></p>
      </div>
      <div class="col-md-4 col-feature">
        <div class="rounded-circle justify-center">
          <em class="fa fa-2x fa-desktop"></em>
        </div>
        <h4>Phone collection</h4>
        <p>We provide hassle free phone collection, you don't have to worry about bringing your phone to us. We will call you and arrange a collection.</p>
        <p><a class="btn btn-outline-primary mt-2" href="{{ route('faq') }}" role="button">Learn more</a></p>
      </div>
      <div class="col-md-4 col-feature">
        <div class="rounded-circle justify-center">
          <em class="fa fa-2x fa-code"></em>
        </div>
        <h4>Tracking system</h4>
        <p>You can track your repair's live progress with the help of our builtin tracking system. You can track with just your email or phone #.</p>
        <p><a class="btn btn-outline-primary mt-2" href="{{route('track')}}" role="button">Track now</a></p>
      </div>
    </div>
  </div>
</section>

<section class="cta-5 text-center">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 text-center text-lg-left">
        <h2 class="mt-4 mb-2">So, what are you waiting for?</h2>
        <p class="lead mb-3">Reserve your repair with us now for free.</p>
      </div>
      <div class="col-lg-4">
        <a href="{{route('repair')}}"><button type="submit" class="btn btn-lg btn-white pill-btn mt-3">Get Started</button></a>
      </div>
    </div>
  </div>
</section>

      <!--<style>
        footer {
          display:none;
        }

        hr {
          display:none;
        }
      </style>-->

@endsection
