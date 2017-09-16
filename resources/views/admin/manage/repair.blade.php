@extends('admin.layouts.app')

@section('content')

<div id="manage-repairs-page-page">
  <h1 class="h1">Repair Management</h1>

  <h4>Actions</h4>

  @if( $repair->is_completed )

  <div class="alert alert-success">
    This booking has been completed, thus the actions are disabled.<br />
    Client has been notified to complete payment if they chose paypal.
  </div>

    @if($repair->isPaymentDue())

    <div class="alert alert-danger">
      Payment has not yet been made.
    </div>

    @else

      <h4>Transaction details</h4>

      <div class="row">
        <table class="table table-responsive table-custom">
          <tbody>

            <tr>
              <th>
                Transaction #
              </th>

              <td>
                {{ $repair->getTransactionId() }}
              </td>
            </tr>

            <tr>
              <th>
                Amount Paid
              </th>

              <td>
                {{ $repair->getAmountPaid() }}
              </td>
            </tr>

          </tbody>
        </table>
      </div>

    @endif

  @elseif( !\App\Repair::isRepairAccepted($repair) )

  <div class="row">

    <div class="col-md-4">

      <form method="post" action="{{route('accept-repair', $repair->id)}}">

        {{method_field("PATCH")}}

        {{csrf_field()}}

        <input type="hidden" name="tracking_status" value="" />

        <div class="form-group">
          <button class="btn btn-success" type="submit" style="width:100%;"><i class="fa fa-check" aria-hidden="true"></i> Accept</button>
        </div>

      </form>

    </div>

    <div class="col-md-4">
      <form method="post" action="{{route('reject-repair', $repair->id)}}">
        {{ method_field("PATCH") }}
        {{ csrf_field() }}
        <button class="btn btn-danger" type="submit" style="width:100%"><i class="fa fa-times" aria-hidden="true"></i> Reject</button>
      </form>
    </div>


  </div>

  @else


  <div class="row">

    <div class="col-md-4">

      <form method="POST" action="{{route('complete-repair', $repair->id)}}" id="form-1">

        {{method_field("PATCH")}}

        {{csrf_field()}}

        <input type="hidden" name="tracking_status" value="" />

        <div class="form-group">
          <button type="submit" class="btn btn-success confirmable" style="width:100%;" data-form-id="1"><i class="fa fa-reply" aria-hidden="true"></i> Mark as complete</button>
        </div>

      </form>

    </div>


    <div class="col-md-4">

      <div class="form-group">
        <button type="button" class="btn btn-info" style="width:100%" data-toggle="modal" data-target="#technicianModal"><i class="fa fa-key" aria-hidden="true"></i> Technical Details</button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="technicianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Technician Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form method="POST" action="{{route('edit-technician-details', $repair->id)}}">

                {{method_field("PATCH")}}
                {{csrf_field()}}

                <div class="form-group">
                  <label for="phone_imei">IMEI #</label>
                  <input type="text" class="form-control" name="phone_imei" value="{{ $repair->getIMEI() }}"/>
                </div>

                <div class="form-group">
                  <label for="comments">Comments</label>
                  <input type="text" class="form-control" name="comments" value="{{ $repair->getComments() }}"/>
                </div>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>

              </form>


            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="col-md-4">

      <div class="form-group">
        <button type="button" class="btn btn-danger" style="width:100%" data-toggle="modal" data-target="#trackingStatusModal"><i class="fa fa-truck" aria-hidden="true"></i> Tracking Info</button>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="trackingStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update tracking information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <p>
                Current status: <br /> <strong>{{ $repair->getTrackingStatus() }}</strong>
              </p>

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

              <p>
                Tracking details will only save if "In dispatch" is selected.
              </p>

              <div class='form-group'>

                <label for="tracking_num">Tracking # (if-any)</label>
                <input type="text" name="track_num" value="{{$repair->getTrackingNum()}}" class="form-control" />

              </div>

              <div class='form-group'>

                <label for="tracking_num">Tracking Carrier (if-any)</label>
                <input type="text" name="track_carrier" value="{{$repair->getTrackingCarrier()}}" class="form-control" />

              </div>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>

              </form>


            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  @endif

  <h4>Repair details</h4>


  <div class="row">
    <table class="table table-responsive table-custom">
      <tbody>

        <tr>
          <th>
            Booking Reference
          </th>

          <td>
            {{$repair->booking_reference}}
          </td>
        </tr>

        <tr>
          <th>
            Status
          </th>

          <td>
            {{ \App\Repair::getRepairStatus($repair) }}
          </td>
        </tr>

        <tr>

          <th>TYPE OF REPAIR</th>

          <td> {{ $repair->getFault() }} </td>

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
              {{$repair->getPostalCode()}}
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


</div>

@endsection
