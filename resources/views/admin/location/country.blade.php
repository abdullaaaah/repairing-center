@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Supported cities of {{$country->name}}</h1>
<p>The repair service is supported for the countries listed here.</p>

<table class="table table-responsive table-custom">
  <thead>

    <tr>
      <th>
        CITY NAME
      </th>

      <th>
        PAYPAL
      </th>

      <th>
        CASH ON DELIVERY
      </th>

      <th>
        DELETE
      </th>

      <th>
        EDIT
      </th>
    </tr>

  </thead>

  <tbody>

    @foreach($cities as $city)

    <tr>
      <td>
        {{$city->name}}
      </td>

      <td>
        {{$city->supports_paypal ? 'Supported' : 'Not supported'}}
      </td>

      <td>
        {{$city->supports_cod ? 'Supported' : 'Not supported'}}
      </td>

      <td>
        <form method="POST" action="{{route('delete-city', $city->id)}}" id="form-{{$city->id}}">

          {{method_field("DELETE")}}

          {{csrf_field()}}

          <button class="btn btn-danger confirmable" data-form-id="{{$city->id}}" type="submit">Delete</button>

        </form>
      </td>

      <td>
        <button class="btn btn-default" data-toggle="modal" data-target="#edit-city-modal-{{$city->id}}">Edit</button>

        @include('admin.location.city-modal')

      </td>
    </tr>

    @endforeach

  </tbody>
</table>

<h4>Add city</h4>
<div class="row">
  <div class="col-lg-12">

    <form method="POST" action="{{route('store-city')}}">

      <div class='alert alert-danger' style="{{$errors->all() ? '' : 'display:none'}}">
        @foreach($errors->all() as $error)
        <p><strong>{{$error}}</strong></p>
        @endforeach
      </div>

      {{csrf_field()}}

      <input type="hidden" name="country_id" value="{{$country_id}}" />

      <div class="form-group">
        <label for="name" class="label">NAME</label>
        <input type="text" class="form-control" placeholder="Dubai" name="name" required />
      </div>

      <input type="hidden" name="supports_paypal" value="0" />

      <label class="custom-control custom-checkbox">

      @if($country_id == 1)
      <input type="checkbox" class="custom-control-input" value='1' name="supports_paypal" checked>
      @else
      <input type="checkbox" class="custom-control-input" value='1' name="supports_paypal" checked>
      @endif

      <span class="custom-control-indicator"></span>
      <span class="custom-control-description">Support for Paypal Payments</span>`
      </label>

      <input type="hidden" name="supports_cod" value="0" />

      <label class="custom-control custom-checkbox">

      @if($country_id == 2)
      <input type="checkbox" class="custom-control-input" value='1' name="supports_cod" checked>
      @else
      <input type="checkbox" class="custom-control-input" value='1' name="supports_cod">
      @endif


      <span class="custom-control-indicator"></span>
      <span class="custom-control-description">Support for Cash on delivery</span>`
      </label>

      <button type="submit" class="btn btn-primary btn-custom">ADD CITY</button>
    </form>

  </div>
</div>


@endsection
