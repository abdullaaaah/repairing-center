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


  @for($i = 0; $i < count($brands); $i++)

    @if( !($i % 2) )

    <div class="row phone-makes">

      <div class="col-sm-6">

        <a href="{{route('select-phone', [ $fault->id, $brands[$i]->id ] )}}">

        <div class="phone-makes-box">

        {{strtoupper($brands[$i]->phone_model)}}

        <img class="img-responsive img-custom" src="{{$brands[$i]->image_url}}" />


        </div>

        </a>

      </div>

    @else

    <div class="col-sm-6">

      <a href="{{route('select-phone', [ $fault->id, $brands[$i]->id ] )}}">

          <div class="phone-makes-box">

            {{strtoupper($brands[$i]->phone_model)}}

          <img class="img-responsive img-custom" src="{{$brands[$i]->image_url}}" />

        </div>

      </a>

      </div>

    </div><!-- end row-->

    @endif

  @endfor

  @if( (count($brands) % 2 ) )
    </div>
  @endif


  <div style="margin-top:40px;"></div>

<!--

  <div class="row phone-makes">

    <div class="col-sm-6">

      <a href="{{route('select-phone', [$fault->id, \App\PhoneMake::findByName('sony')] )}}"><div class="phone-makes-box">SONY
        <img class="img-responsive img-custom" src="\img\sony.png" />
      </div></a>

    </div>

    <div class="col-sm-6">

      <a href="/contact"><div class="phone-makes-box">OTHERS
        <img class="img-responsive img-custom" src="\img\more.png" />
      </div></a>

    </div>

  </div>-->

</div>

@endsection
