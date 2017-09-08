@extends('admin.layouts.app')

@section('content')

<div id="manage-repairs-page">
  <h1 class="h1">{{strtoupper($type)}} BOOKINGS FOR {{ strtoupper($country) }}</h1>
  <p style="margin-bottom:30px;">
    {{$page_desc}}
  </p>

  <table class="table table-hover table-responsive table-bordered table-custom">
    <thead>
      <tr>
        <th>Booking Ref</th>
        <th>Time</th>
        <th>Phone Model</th>
        <th>Category</th>
        <th>Contact Name</th>
        <th>Email</th>
      </tr>
    </thead>

    @foreach($repairs as $booking)


    <a href="/admin/manage/repair/{{ $booking->id }}">
      <tr onclick="window.location = '/admin/manage/repair/{{ $booking->id }}';  ">
        <td>{{$booking->booking_reference}}</td>
        <td>{{ $booking->created_at->diffForHumans() }} </td>
        <td>
          {{ \App\Phone::find($booking->phone_id) ? \App\Phone::find($booking->phone_id)->model : "Deleted Phone" }}
        </td>
        <td> LCD Repair </td>
        <td>{{ $booking->contact_full_name }}</td>
        <td>{{ $booking->contact_email }}</td>


      </tr>
    </a>


    @endforeach

  </table>
</div>

@endsection
