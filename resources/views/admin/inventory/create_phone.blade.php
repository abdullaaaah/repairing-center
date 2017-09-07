@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Add Phone</h1>
<p>Here you can manage all your phones.</p>

<form method="post" action="/admin/inventory/phones">

{{csrf_field()}}

<div class="row">

  <div class="col-sm-12">
    <div class="alert alert-danger" style="{{count($errors) ? '' : 'display:none' }}" id="add-phone-errors">

      @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
      @endforeach

    </div>
  </div>

</div>

<div class="row">

  <div class="col-sm-12">

    <div class="form-group">
      <label for="phone_model_id">Phone brand</label>

      <select class="custom-select" name="phone_model_id" style="width:100%;" required>
        <!--<option selected>Brand</option>-->

        @foreach ($brands as $brand)

        <option value="{{ $brand->id }}"> {{ $brand->phone_model }} </option>

        @endforeach

      </select>

    </div>

  </div>
</div>

<div class="row">

  <div class="col-sm-12">

    <div class="form-group">
      <label for="model">Phone Name</label>
      <input type="text" class="form-control" name="model" placeholder="Galaxy s3">
    </div>

  </div>
</div>


<div class="row" id="step-three-btn-row">

  <div class="col-sm-12">

    <button type="submit" class="btn btn-primary" style="width:100%; margin-top:20px;">ADD</button>

  </div>

</div>

</form>



@endsection
