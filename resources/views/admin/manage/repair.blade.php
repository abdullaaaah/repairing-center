@extends('admin.layouts.app')

@section('content')

<div id="manage-repairs-page-page">
  <h1 class="h1">Booking details for Repair #{{$repair->id}}</h1>

  <h4>Repair details</h4>

  <div class="row">
    <table class="table table-responsive table-custom">
      <tbody>
        <tr>

          <th>TYPE OF REPAIR</th>

          <td>LCD REPLACEMENT</td>

        </tr>

        <tr>
          <th>PHONE</th>

          <td>
            {{ $phone }}, {{$variation}}
          </td>
        </tr>

        <tr>
          <th>MODEL NUMBER</th>

          <td>{{ $repair->getModelNo() }}</td>
        </tr>

        <tr>
          <th>DESCRIPTION</th>

          <td>{{ $repair->getDescription() }}</td>
        </tr>
      </tbody>
    </table>
  </div>


  <h4>Contact Information</h4>
  <div class="row">
    <table class="table table-responsive table-custom">
      <tbody>
        <tr>

          <th>NAME</th>

          <td>{{ $repair->contact_full_name }}</td>

        </tr>

        <tr>
          <th>ADDRESS</th>

          <td>{{$repair->contact_address}}</td>
        </tr>

        @if($repair->country_id == 1)
          <tr>
            <th>
              POSTAL CODE
            </th>

            <td>
              {{$repair->postal_code}}
            </td>
          </tr>
        @endif

        <tr>
          <th>PHONE NUMBER</th>

          <td>{{$repair->contact_phone_number}}</td>
        </tr>

        <tr>
          <th>EMAIL ADDRESS</th>

          <td>{{$repair->contact_email}}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <h4>Payment status</h4>

  <div class="row">
    <table class="table table-responsive table-custom">
      <tbody>
        <tr>

          <th>PAYMENT METHOD</th>

          <td>{{strtoupper($repair->payment_method)}}</td>

        </tr>

        <tr>
          <th>QUOTE</th>

          <td>{{ $repair->getPaymentAmount() }}</td>
        </tr>

        <tr>
          <th>STATUS</th>

          <td>{{ $repair->isPaid() }}</td>
        </tr>

      </tbody>
    </table>
  </div>

  <h4>Tracking details</h4>

  <div class="row">
    <table class="table table-responsive table-custom">
      <tbody>
        <tr>

          <th>CURRENT STATUS</th>

          <td><strong>{{ $repair->getTrackingStatus() }}</strong></td>

        </tr>

      </tbody>
    </table>
  </div>

  <h4>Update tracking status</h4>

  <div class="row">

    <div class="col-md-12">

      <form method="POST" action="/admin/trackings">

      {{csrf_field()}}

      <input type="hidden" name="repair_id" value="{{$repair->id}}"/>

      <div class='form-group'>

        <label for="status">Select a tracking status.</label>

        <select name="status" class="form-control" required>
        @for($i = 2; $i < count($trackingStatuses) + 1; $i++ )
        <option value="{{$i}}">{{$trackingStatuses[$i]}}</option>
        @endfor
        </select>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary" style="margin-top:20px; width:100%">Update Status</button>
      </div>

      </form>

    </div>

  </div>

</div>

@endsection
