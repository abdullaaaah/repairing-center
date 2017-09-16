@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Prices for {{strtoupper($phone->phonemake->phone_model)}} {{strtoupper($phone->model)}}</h1>
<p>Add/Modify pricing for your services here.</p>

<h4>Current pricing</h4>
<table class="table table-responsive table-custom">

  <thead>
    <tr>
      <th>Country</th>
      <th>Service</th>
      <th>Quote</th>
    </tr>
  </thead>

  <tbody>

    @foreach($quotes as $quote)

      <tr>
        <td>
          {{ $quote->getCountry() }}
        </td>

        <td>
          {{ $quote->getService() }}
        </td>

        <td>
          {{ $quote->getQuote() }}
        </td>
      </tr>

    @endforeach

  </tbody>

</table>


<h4>Add/Modify Pricing</h4>

<form method="post" action="/admin/inventory/quotes">
{{ csrf_field() }}

<div class="alert alert-danger" style="{{$errors->all() ? '' : 'display:none'}}">
  @foreach($errors->all() as $error)
  <strong>{{$error}}</strong>
  @endforeach
</div>

<input type="hidden" name="phone_id" value="{{$phone->id}}" />

<div class="row">
  <div class="col-md-12">

    <div class="form-group">
      <label for="name">Amount</label>
      <input type="text" class="form-control" name="price" placeholder="45" required />
    </div>

    <div class="form-group">
      <label for="country_code">Country</label>

      <select name="country_id" class="form-control">

        <option value="0" selected>
          Select
        </option>

        @foreach($countries as $country)

          <option value="{{$country->id}}">
            {{$country->name}}
          </option>

        @endforeach

      </select>
    </div>

    <div class="form-group">
      <label for="country_code">Service</label>

      <select name="fault_id" class="form-control" required>
        <option value="0">
          Select
        </option>

        @foreach($faults as $fault)
          <option value="{{$fault->id}}">
            {{$fault->name}}
          </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-custom">SET QUOTE</button>
    </div>

  </div>
</div>

</form>



@endsection
