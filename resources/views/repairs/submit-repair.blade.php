@extends('layouts.master')

@section('content')

<section class="header-section text-center">
  <div class="container">
    <h2>Part two</h2>
  </div>

</section>


<section class="contact-2" style="padding-bottom:0px;">
  <div class="container">
    <div class="row contact-details" >
      <div class="col-sm-12 text-center">

        <div class="fake-progress">
          <div class="progress" style="margin-top:30px" id="progress-container">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 35%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="fakeprog">Searching for the best available pricing...</div>
          </div>
        </div>

        <p class="lead constrain-width mt-4" style="display:none;" id="price-p"><strong style="font-weight:900"><i class="fa fa-info-circle" aria-hidden="true"></i> Your total is {{$amount}}</strong>, <em>but you don't have to pay this amount until the repair is finished.</em></p>
        <div class="divider"></div>
      </div>

      <script>

          var elem = document.getElementById("fakeprog");
          var width = 35;
          var id = setInterval(frame, 10);
          var text = document.getElementById("price-p");

          function frame() {
              if (width >= 100) {
                  clearInterval(id);
              } else {
                  width++;
                  elem.style.width = width + '%';
              }
          }

          setTimeout(function(){ elem.style.display="none"; document.getElementById('progress-container').style.display="none"; text.style.display="block" }, 2500);

      </script>

    </div>
  </div>
</section>

<div class="container">

<form method="post" action="{{route('store-repair')}}">
  <input type="hidden" name="fault_id" value="{{$fault_id}}" />

  <div class="row">

    <div class="col-sm-12">
      <div class="alert alert-danger" style="{{ $errors->all() ? '' : 'display:none'}}" id="step-three-errors">

        @foreach($errors->all() as $error)
          {{ $error }}
        @endforeach

      </div>
    </div>

  </div>

  {{csrf_field()}}

  <input type="hidden" name="quote_id" value="{{$amount_id}}" id="quote-field" />


  <div class="row">

    <div class="col-sm-12">

      <div class="form-group">
        <label for="phone-model-number">Full name</label>
        <input type="text" class="form-control" id="full-name-field" name="contact_full_name" placeholder="John Doe" required>
      </div>

    </div>
  </div>

  <div class="row">

    <div class="col-sm-12">

      <div class="form-group">
        <label for="phone-model-number">Address</label>
        <input type="text" class="form-control" id="address-field" name="contact_address" placeholder="74 magical street" required>
      </div>

    </div>
  </div>

  @if($country_code == "UK")

  <div class="row">

    <div class="col-sm-12">

      <div class="form-group">
        <label for="postal-code">Postal code</label>
        <input type="text" class="form-control" id="postal-code-field" name="contact_postal_code" placeholder="A306" required>
      </div>

    </div>
  </div>

  @endif

  <div class="row">

    <div class="col-sm-12">

      <div class="form-group">
        <label for="phone-model-number">Email</label>
        <input type="email" class="form-control" id="email-field" name="contact_email" placeholder="johndoe@yahoo.com" required>
      </div>

    </div>
  </div>

  <div class="row" style="margin-bottom:20px;">

    <div class="col-sm-12">

      <label for="phone-model-number">Phone #</label>

      <div class="input-group input-group-sm">
          <div class="input-group-addon">{{ $phone_country_code }}</div>
          <input type="text" class="form-control" id="phone-number-field" name="contact_phone_number" placeholder="000 000 0000" required style="height:40px;">
      </div>


     <!--
      <div class="form-row">

        <div class="input-group col-md-2">
          <input type="text" class="form-control" name="phone_country_code" value="{{ $phone_country_code }}" readonly/>
        </div>

        <div class="col-md-10">
          <input type="text" class="form-control" id="phone-number-field" name="contact_phone_number" placeholder="000 000 0000" required>
        </div>

      </div>

    -->

    </div>

  </div>


  <div class="row">

    <div class="col-sm-12">

      <div class="form-group">
        <label for="payment_method">Payment method <small>You don't have to pay until the repair is complete</small></label>

        <select name="payment_method" class="form-control custom-select" id="payment_method">

          <option value="0">
            Payment method
          </option>

          @foreach($payment_methods as $payment)
          <option value="{{$payment['value']}}"> {{$payment['name']}} </option>
          @endforeach
        </select>

      </div>

    </div>
  </div>



  <div class="row" style="margin-bottom:80px; margin-top:40px">

    <div class="col-sm-12">

      <button type="submit" class="btn btn-primary btn-lg" style="width:100%">RESERVE NOW</button>

    </div>

  </div>

</div>

</form>






@endsection
