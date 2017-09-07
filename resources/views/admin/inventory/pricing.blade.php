@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Prices for {{strtoupper($phone->phonemake->phone_model)}} {{strtoupper($phone->model)}}</h1>
<p>Add/Modify pricing for your services here.</p>

<h4>Current pricing</h4>
<table class="table table-responsive table-custom">

  <thead>
    <tr>
      <th>Location</th>
      <th>Service</th>
      <th>Quote</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>UK</td>
      <td>LCD Replacement</td>
      <td>{{ $uk_quote ? $uk_quote : "Not set." }}</td>
    </tr>

    <tr>
      <td>UAE</td>
      <td>LCD Replacement</td>
      <td>{{ $uae_quote ? $uae_quote : "Not set." }}</td>
    </tr>
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
      <input type="text" class="form-control" name="price" placeholder="900" required />
    </div>

    <div class="form-group">
      <label for="country_code">Country</label>

      <select name="country_code" class="form-control">

        <option selected value="UAE">
          UAE
        </option>

        <option value="UK">
          UK
        </option>

      </select>
    </div>

    <div class="form-group">
      <label for="country_code">Service</label>

      <select name="" class="form-control">
        <option selected>
          LCD Replacement
        </option>
      </select>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-custom">SET QUOTE</button>
    </div>

  </div>
</div>

</form>



@endsection
