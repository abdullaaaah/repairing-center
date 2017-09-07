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

    <section id="confirmation">
      <p style="margin-bottom:40px; font-weight:700;">If any of these details are incorrect, please <a href="/contact">contact us.</a></p>

      <p>
        <strong>Contact Name:</strong>
        {{ $contact['contact_full_name'] }}
      </p>

      <p>
        <strong>Contact Email:</strong>
        {{ $contact['contact_email'] }}
      </p>

      <p>
        <strong>Contact Phone #:</strong>
        {{ $contact['contact_phone_number'] }}
      </p>

      <p>
        <strong>Contact Address:</strong>
        {{ $contact['contact_address'] }}
      </p>


    </section>

    <p style="margin-bottom:80px;">You can use this website to further track the process of repair by clicking <a href="/track">here</a>.</p>

    </div>

  </div>

@endsection
