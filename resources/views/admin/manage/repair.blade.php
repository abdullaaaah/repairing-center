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


            {{ strtoupper(\App\Phone::find($repair->phone_id) ? \App\Phone::find($repair->variation->phone->id)->phoneMake->phone_model : "Deleted") }}
            {{ strtoupper($repair->variation->phone ? $repair->variation->phone->model : "deleted") }},
            {{ strtoupper($repair->variation->color) }}, {{ $repair->variation->capacity }} GB

          </td>
        </tr>

        <tr>
          <th>MODEL NUMBER</th>

          <td>{{ isset($repair->model_number) ? $repair->model_number : "Not provided." }}</td>
        </tr>

        <tr>
          <th>DESCRIPTION</th>

          <td>{{ isset($repair->description) ? $repair->description : "Not provided." }}</td>
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

          <td>{{ \App\Quote::formatQuote($repair->quote->country_code, $repair->quote->price) }}</td>
        </tr>

        <tr>
          <th>STATUS</th>

          <td>{{ $repair->payment_id ? "PAID" : "DUE"}}</td>
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

          <td><strong>{{ $currentStat }}</strong></td>

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
        @for($i = 2; $i < count($statuses) + 1; $i++ )
        <option value="{{$i}}">{{$statuses[$i]}}</option>
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
