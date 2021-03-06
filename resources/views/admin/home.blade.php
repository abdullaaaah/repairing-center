@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Welcome, Admin.</h1>
<p>You can use this panel to manage bookings, payments and inventory.</p>
<hr/>

@if(count($pendingBookings))

<h4>Pending bookings</h4>
<p>
  Please accept or reject the following bookings.
</p>

<div class="table-responsive">
  <table class="table table-custom">
    <thead>
      <tr>
        <th>
          Booking #
        </th>

        <th>
          Booking details
        </th>
        <th>
          Accept
        </th>
        <th>
          Reject
        </th>
      </tr>
    </thead>

  @foreach($pendingBookings as $booking)

    <tr>

      <td>
        {{$booking->booking_reference}}
      </td>

      <td>
        <a href="{{route('admin-show-repair', $booking->id)}}">Details</a>
      </td>

      <td>

        <form method="post" action="{{route('accept-repair', $booking->id)}}">
          {{ method_field("PATCH") }}
          {{ csrf_field() }}
          <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Accept</button>
        </form>

      </td>

      <td>

        <form method="post" action="{{route('reject-repair', $booking->id)}}">
          {{ method_field("PATCH") }}
          {{ csrf_field() }}
          <button class="btn btn-danger" type="submit"><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
        </form>

      </td>
    </tr>

  @endforeach

  </table>

</div>

@endif



<h4>Brief summary of events</h4>

<div class="row">
  <div class="table-responsive">
    <table class="table table-custom table-two-col">
      <tbody>
        <tr>

          <th>Total Repairs Completed</th>

          <td>{{$completion_count}}</td>

        </tr>

        <tr>
          <th>Total Repairs Rejected</th>

          <td>{{$rejection_count}}</td>
        </tr>

        <tr>
          <th>Total Quotes</th>

          <td>{{$total_bookings}}</td>
        </tr>

        <tr>
          <th>Average Repairing Time</th>

          <td>{{$average_time}} Hour(s)</td>
        </tr>

        <tr>
          <th>Total Online Payments</th>

          <td>{{$payment_count}}</td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

<h4>Things needing your attention</h4>


@if( count($attention) )

  @if(isset($attention['phones_with_no_quotes']))

  <p>
    These phone(s) are missing pricing information. This can create client side problems, please fix this asap.
  </p>

  @foreach($attention['phones_with_no_quotes'] as $phone)
  <a href="{{route('manage-pricing', $phone->id)}}">{{$phone->model}}</a><br />
  @endforeach


  @endif

  @if( isset($attention['cities_without_payment']) )

    <p style="margin-top:20px;">
      These cities have no payment method available. Please fix this as it can create problems for client side website.
    </p>

    @foreach($attention['cities_without_payment'] as $city)
    <a href="{{route('manage-country', $city->country->id)}}">{{$city->name}}</a><br />
    @endforeach
  @endif

@else
<p>
  <strong>Nothing currently needs your attention! Good job.</strong>
</p>
@endif

@endsection
