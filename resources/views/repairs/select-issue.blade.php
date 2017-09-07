@extends('layouts.master')

@section('content')

<section class="header-section text-center">
  <div class="container">
    <h2>Select a service</h2>
  </div>

</section>


<section class="contact-2" style="padding-bottom:0px;">
  <div class="container">
    <div class="row contact-details">
      <div class="col-sm-12 text-center">
        <p class="lead constrain-width mt-4">Which category best describes the service you require?</p>
        <div class="divider"></div>
      </div>

    </div>
  </div>
</section>

<div class="container">

  <div class="row phone-makes">

    <div class="col-sm-12">

      <a href="{{route('select-brand')}}"><div class="identify-box" id="replace">REPLACE MY LCD
        <!--<img class="img-responsive img-custom" src="" />-->
      </div></a>

    </div>

  </div>

  <div class="row phone-makes">

    <div class="col-sm-12">

      <div class="identify-box" id="option-2">BATTERY REPLACEMENT</div>

    </div>

  </div>

  <div class="row phone-makes">

    <div class="col-sm-12">

      <div class="identify-box" style="margin-bottom:40px;" id="option-3">HOUSING REPLACEMENT</div>

    </div>

  </div>

</div>

@endsection
