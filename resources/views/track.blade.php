@extends('layouts.master')

  @section('content')

  <section class="header-section text-center">
    <div class="container">
      <h2 class="">Track your device</h2>
    </div>
  </section>


  <section class="contact-2" style="padding-bottom:0px;">
    <div class="container">
      <div class="row contact-details">
        <div class="col-sm-12 text-center">
          <p class="lead constrain-width mt-4">Our online tracker allows you to track realtime updates of your booking. You can also use this tracker to pay online once the repair is completed.</p>
          <div class="divider"></div>
        </div>

      </div>
    </div>
  </section>

  <div class="container" id="track">

      <div class="alert alert-danger" style="display:none" id="track-errors"></div>


      <div class="row">


        <div class="col-sm-12">

          <div class="form-group">
            <label for="phone-model-number">EMAIL</label>
            <input type="email" class="form-control" id="track-email-field" name="contact_full_name" placeholder="johndoe@hotmail.com" required>
          </div>

          <div class="form-group">
            <button class="btn btn-primary" id="track-email-btn">Track By Email</button>
          </div>

        </div>
      </div>

        <div class="row">
          <div class="col-lg-12"><h1 class="text-center" style="font-weight:700; margin-top:40px; margin-bottom:40px;">OR</h1></div>
        </div>

        <div class="row">
          <div class="col-sm-12">

            <div class="form-group">
              <label for="phone-model-number">Phone #</label>
              <input type="text" class="form-control" id="track-phone-number-field" name="contact_phone_number" placeholder="000 000 0000" required>
            </div>

            <div class="form-group">
              <button class="btn btn-primary" id="track-phone-btn" style="margin-bottom:80px;">Track By Phone #</button>
            </div>

          </div>
        </div>

    </div>

  @endsection

  @section('js')
    <script src="/js/track.js"></script>
  @endsection
