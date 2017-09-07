@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Welcome, Admin.</h1>
<p>You can use this panel to manage bookings, payments and inventory.</p>
<hr/>

<h4>Brief summary of events</h4>

<div class="row">
  <table class="table table-responsive table-custom table-two-col">
    <tbody>
      <tr>

        <th>TOTAL BOOKINGS</th>

        <td>{{$total_bookings}}</td>

      </tr>

      <tr>
        <th>TOTAL PHONES</th>

        <td>{{$total_phones}}</td>
      </tr>

      <tr>
        <th>TOTAL ONLINE PAYMENTS</th>

        <td>{{$payment_count}}</td>
      </tr>

    </tbody>
  </table>
</div>

<h4>Things needing your attention</h4>


@if( count($attention) )

  @if(isset($attention['phones_with_no_quotes']))

  <p>
    These phone(s) are missing pricing information. This can create client side problems, please fix this asap.
  </p>

  @foreach($attention['phones_with_no_quotes'] as $phone)
  <a href="{{route('manage-pricing', $phone->id)}}">{{$phone->model}}</a>
  @endforeach

  @endif

  @if( isset($attention['cities_without_payment']) )

    <p>
      These cities have no payment method available. Please fix this as it can create problems for client side website.
    </p>

    @foreach($attention['cities_without_payment'] as $city)
    <a href="{{route('manage-country', $city->country->id)}}">{{$city->name}}</a>
    @endforeach
  @endif

@else
<p>
  <strong>Nothing currently needs your attention! Good job.</strong>
</p>
@endif

@endsection
