@extends('layouts.master')

@section('content')

<section class="header-section text-center">
  <div class="container">
    <h2>Select a brand</h2>
  </div>

</section>


<section class="contact-2" style="padding-bottom:0px;">
  <div class="container">
    <div class="row contact-details">
      <div class="col-sm-12 text-center">
        <p class="lead constrain-width mt-4">Which brand is your phone from?</p>
        <div class="divider"></div>
      </div>

    </div>
  </div>
</section>

<div class="container">

  <div class="row phone-makes">

    <div class="col-sm-6">

      <a href="{{route('select-phone', \App\PhoneMake::findByName('apple') )}}">

      <div class="phone-makes-box">

      APPLE

      <img class="img-responsive img-custom" src="\img\iphone.png" />


      </div>

      </a>

    </div>

    <div class="col-sm-6">

      <a href="{{route('select-phone', \App\PhoneMake::findByName('samsung') )}}"><div class="phone-makes-box">SAMSUNG
        <img class="img-responsive img-custom" src="\img\samsung.png" />
      </div></a>

    </div>

  </div>

  <div class="row phone-makes">

    <div class="col-sm-6">

      <a href="{{route('select-phone', \App\PhoneMake::findByName('htc') )}}"><div class="phone-makes-box">HTC
        <img class="img-responsive img-custom" src="\img\htc.png" />
      </div></a>

    </div>

    <div class="col-sm-6">

      <a href="{{route('select-phone', \App\PhoneMake::findByName('blackberry') )}}"><div class="phone-makes-box">BLACKBERRY
        <img class="img-responsive img-custom" src="\img\blackberry.png" />
      </div></a>

    </div>

  </div>

  <div class="row phone-makes">

    <div class="col-sm-6">

      <a href="{{route('select-phone', \App\PhoneMake::findByName('sony') )}}"><div class="phone-makes-box">SONY
        <img class="img-responsive img-custom" src="\img\sony.png" />
      </div></a>

    </div>

    <div class="col-sm-6">

      <a href="/contact"><div class="phone-makes-box">OTHERS
        <img class="img-responsive img-custom" src="\img\more.png" />
      </div></a>

    </div>

  </div>


</div>

@endsection
