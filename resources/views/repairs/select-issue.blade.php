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

  @if(count($faults))

    @foreach($faults as $fault)

    <div class="row phone-makes" style="margin-bottom:60px;">

      <div class="col-sm-12">

        <a href="{{route('select-brand', $fault->id )}}"><div class="identify-box"> {{ $fault->name }}
          <!--<img class="img-responsive img-custom" src="" />-->
        </div></a>

      </div>

    </div>


    @endforeach

  @else

  <p>
    Try again later.
  </p>

  @endif

</div>

@endsection
