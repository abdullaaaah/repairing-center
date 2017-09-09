@extends('admin.layouts.app')

@section('content')

<div id='manage-index'>

  <h1 class="h1">BOOKINGS</h1>
  <p>Please select your desired option.</p>
  <hr />


  @if(Auth::user()->access_uae)
  <h4>UAE</h4>

  <div class="row">
    <div class="col-md-3">
      <a href="{{route('new-repairs', 'uae')}}"><div class="inventory-box">Repairs awaiting technician</div></a>
    </div>

    <div class="col-md-3">
      <a href="{{route('ongoing-repairs', 'uae')}}"><div class="inventory-box">Repairs under progress</div></a>
    </div>

    <div class="col-md-3">
      <a href="{{route('completed-repairs', 'uae')}}"><div class="inventory-box">Repairs completed</div></a>
    </div>

    <div class="col-md-3">
      <a href="{{route('rejected-repairs', 'uae')}}"><div class="inventory-box">Repairs Rejected</div></a>
    </div>
  </div>
  @endif


  @if(Auth::user()->access_uae)
  <h4 style="margin-top:20px;">UK</h4>

  <div class="row">
    <div class="col-md-3">
      <a href="{{route('new-repairs', 'uk')}}"><div class="inventory-box">Repairs awaiting technician</div></a>
    </div>

    <div class="col-md-3">
      <a href="{{route('ongoing-repairs', 'uk')}}"><div class="inventory-box">Repairs under progress</div></a>
    </div>

    <div class="col-md-3">
      <a href="{{route('completed-repairs', 'uk')}}"><div class="inventory-box">Repairs completed</div></a>
    </div>

    <div class="col-md-3">
      <a href="{{route('rejected-repairs', 'uk')}}"><div class="inventory-box">Repairs Rejected</div></a>
    </div>
  </div>
  @endif


@endsection
