@extends('layouts.master')

@section('content')


<section class="header-section text-center">
  <div class="container">
    <h2>Thank you for repairing with us.</h2>
  </div>

</section>


<section class="contact-2" style="padding-bottom:0px;">
  <div class="container">
    <div class="row contact-details">
      <div class="col-sm-12 text-center">
        <p class="lead constrain-width mt-4">Your booking has been reserved. You will soon receive a call from us and we can arrange your phone collection.</p>
        <div class="divider"></div>
      </div>

    </div>
  </div>
</section>

  <div class="container" id="thankyou">

    <section id="confirmation" style="margin-bottom:30px;">
      <p style="margin-bottom:; font-weight:400;">Please save the following details, this is how we will identify your booking.<br />
        You can use our tracker to track your repair at anytime using your email address or phone number.
      </p>

      <dl class="dl-horizontal">

        <dt>Booking Reference No.</dt>
        <dd>{{ $ref }}</dd>

        <dt>Contact Name</dt>
        <dd>{{ $contact['contact_full_name'] }}</dd>

        <dt>Email Address</dt>
        <dd>{{ $contact['contact_email'] }}</dd>

        <dt>Phone #</dt>
        <dd>{{ $contact['contact_phone_number'] }}</dd>

        <dt>Contact Address</dt>
        <dd>{{ $contact['contact_address'] }}</dd>
      </dl>


    </section>

    <p style="margin-bottom:60px;"></p>

    </div>

  </div>

@endsection
