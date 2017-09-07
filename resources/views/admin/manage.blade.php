@extends('admin.layouts.app')

@section('content')

<div id='manage-index'>

  <h1 class="h1">BOOKINGS</h1>
  <p>Please select your desired option.</p>
  <hr />


  <h4>UAE</h4>

  <div class="row">
    <div class="col-md-4">
      <a href="{{route('new-repairs', 'uae')}}"><div class="inventory-box">View Newly Booked Repairs</div></a>
    </div>

    <div class="col-md-4">
      <a href="{{route('ongoing-repairs', 'uae')}}"><div class="inventory-box">View on-going repairs</div></a>
    </div>

    <div class="col-md-4">
      <a href="{{route('completed-repairs', 'uae')}}"><div class="inventory-box">View completed repairs</div></a>
    </div>
  </div>

  <h4 style="margin-top:20px;">UK</h4>

  <div class="row">
    <div class="col-md-4">
      <a href="{{route('new-repairs', 'uk')}}"><div class="inventory-box">View Newly Booked Repairs</div></a>
    </div>

    <div class="col-md-4">
      <a href="{{route('ongoing-repairs', 'uk')}}"><div class="inventory-box">View on-going repairs</div></a>
    </div>

    <div class="col-md-4">
      <a href="{{route('completed-repairs', 'uk')}}"><div class="inventory-box">View completed repairs</div></a>
    </div>
  </div>


</div>

@endsection
