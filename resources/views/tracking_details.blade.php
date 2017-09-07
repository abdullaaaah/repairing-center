@extends('layouts.master')

  @section('content')


  <section class="header-section text-center">
    <div class="container">
      <h2 class="smaller-480">Tracking information for <strong>{{strtoupper($phone->model)}}</strong></h2>
    </div>

  </section>


  <section class="contact-2" style="padding-bottom:0px;">
    <div class="container">
      <div class="row contact-details">
        <div class="col-sm-12 text-center">
          <p class="lead constrain-width mt-4">Hi, {{$repair->contact_full_name}}, these are the most up to date tracking updates for your phone.</p>
          <div class="divider"></div>
        </div>

      </div>
    </div>
  </section>

    <div class="container" id="track-container" data-id="{{$repair->id}}">

      @for($i = 1; $i < count($stats); $i++)

      <div class="track-item" id="track-item-{{$i}}">

        <p style="color:white;">{{$stats[$i]}}</p>
        <small></small>

      </div>

      @endfor

      <hr style="margin-top:40px" />

      <h4>Payment</h4>

      @if( $last_stat > 7 )

        @if($repair->payment_method == "paypal")
          @if( !$is_paid )

          {!! Form::open(array('route' => 'getCheckout')) !!}
            {!! Form::hidden('type','advance') !!}
            {!! Form::hidden('pay', $repair->quote->price ) !!}
            {!! Form::hidden('currency', $repair->quote->country_code == "UAE" ? 'AED' : 'EUR') !!}
            <input type="hidden" name="custom" value="{{$repair->id}}" />

            <p>
              <strong>Amount due:</strong> {{$amount}}
            </p>

            <button type="submit" class="btn btn-primary ">PAY WITH PAYPAL</button>

            {!! Form::close() !!}

          @else

            <p>
              Your payment has been completed.
            </p>

          @endif



        @else


        <p style="margin-bottom:80px;">
          You will have to pay on delivery.
        </p>

        @endif


      @else
        <p style="margin-bottom:80px;">
          You don't have to worry about payment until we have completed your repair.
        </p>
      @endif


    </div>


  @endsection


  @section('js')
  <script src="/js/tracking_details.js"></script>
  @endsection
