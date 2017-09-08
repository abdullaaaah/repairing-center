@extends('layouts.master')

@section('content')

<section class="header-section text-center">
  <div class="container">
    <h2>Part one</h2>
  </div>

</section>


<section class="contact-2" style="padding-bottom:0px;">
  <div class="container">
    <div class="row contact-details">
      <div class="col-sm-12 text-center">
        <p class="lead constrain-width mt-4">Help us determine the price of your repair by submitting the information below.</p>
        <div class="divider"></div>
      </div>

    </div>
  </div>
</section>

<div class="container">


  <form method="POST" action="{{route('store-phone')}}">

    {{ csrf_field() }}

    <input type="hidden" name="quote_id" id="quote_id" value="" />
    <input type="hidden" name="variation_id" id="variation-field" value="" />
    <input type="hidden" name="city_id" id="city-field" value="" />

    <div class="row">

      <div class="col-sm-12">
        <div class="alert alert-danger" style="{{$errors->all() ? '' : 'display:none'}}">

          @foreach ($errors->all() as $error)
          <p>
            <strong>{{$error}}</strong>
          </p>
          @endforeach

        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">

          <label class="label" for="phone_model_id">Please select your phone</label>

          <select class="custom-select" id="step-two-phones" name="phone_id" required>
            <option value="">Select</option>

            @foreach($phones as $phone)

            <option value="{{$phone->id}}">
              {{$phone->model}}
            </option>

            @endforeach
          </select>

        </div>
      </div>
    </div>

    <div class="row" id="variation-row">
      <div class="col-sm-12">
        <div class="form-group">

          <label class="label" for="phone_model_id">Please select your variation</label>

          <select class="custom-select" id="step-two-variations" name="variation_id" required>
            <option value='0'>
              Select
            </option>

          </select>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">

          <label for="model_number">Model # - (Leave it blank if you don't know)</label>
          <input type="text" class="form-control" id="" placeholder="" name="model_number" value="{{Session::get('model_number')}}">

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">

          <label for="country_id">Select your country</label>
          <select name="country_id" class="form-control select custom-select" id="country_id" required>

            <option value="">Available countries</option>


            @foreach ($countries as $country)
            <option value="{{$country->id}}" class="country-option">{{$country->name}}</option>
            @endforeach

          </select>

        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-sm-12">

        <div class="form-group">
          <label for="city_id" id="city-label">Available cities</label>

          <select name="city_id" class="form-control select custom-select" id="city_id" required>
            <option value="">
              Cities will appear once you select a country
            </option>
          </select>

        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">

          <label for="phone-model-number">Brief summary of what happened to your phone</label>
          <textarea class="form-control" id="description-box" name="description" value="{{Session::get('description')}}" required></textarea>

        </div>
      </div>
    </div>

    <div class="row" id="step-two-btn-row" style="margin-bottom:80px; margin-top:40px">
      <div class="col-sm-12">

        <a href="{{route('select-brand')}}"><button type="button" class="btn btn-danger btn-lg" id="">GO BACK</button></a>
        <button type="submit" class="btn btn-primary btn-lg" id="">NEXT</button>



      </div>

    </div>

  </form>





</div>

@endsection
