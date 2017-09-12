@extends('admin.layouts.app')

@section('content')


  <h1 class="h1">Paypal payments</h1>
  <p>Succesful paypal payments are listed here</p>
  <hr />

  <div class="table-responsive">
    <table class="table table-custom">
      <thead>
        <tr>
          <th>
            Transaction #
          </th>

          <th>
            Amount Paid
          </th>

          <th>
            Currency
          </th>

          <th>
            Booking Reference
          </th>
        </tr>
      </thead>

      <tbody>
        @foreach($payments as $payment)

          <tr>
            <td>
              {{$payment->getTransactionId()}}
            </td>

            <td>
              {{$payment->getAmount()}}
            </td>

            <td>
              {{$payment->getCurrency()}}
            </td>

            <td>
              {{$payment->getRef()}}
            </td>
          </tr>

        @endforeach
      </tbody>
    </table>
  </div>


@endsection
