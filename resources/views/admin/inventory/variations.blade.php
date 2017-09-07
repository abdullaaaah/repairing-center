@extends('admin.layouts.app')

@section('content')

<h1 class="h1">{{$phone->model}}</h1>
<p>Add or remove phone variations here.</p>
<hr/>

<table class="table table-responsive table-custom">
  <thead>
    <tr><th>Color</th><th>Capacity</th><th>Action</th>
  </thead>

@foreach($phone->variations as $variation)

  <tr>

    <td>

      {{ $variation->color }}

    </td>


    <td>

    {{ $variation->capacity }} GB

    </td>

    <td>

    <form method="post" action="/admin/inventory/variation/{{ $variation->id }}">

      {{ method_field("DELETE") }}

      {{csrf_field()}}

      <button type="submit" class="btn btn-danger">Delete</button>

    </form>

    </td>

  </tr>

@endforeach

  <tr>

    <form method="post" action="/admin/inventory/variation">

      {{ csrf_field() }}

      <input type="hidden" name="phone_id" value="{{ $phone->id }}"/>

      <td><input type="text" class="form-control" placeholder="Gold" name="color" required/></td>

      <td><input type="text" class="form-control" placeholder="32" name="capacity" required/></td>

      <td><button class="btn btn-primary" name="submit" type="submit">Create</button></td>


    </form>

  </tr>

</table>


<div class="row">
  <div class="col-md-12">
    <div class='alert alert-danger' style="{{ $errors->all() ? '' : 'display:none'}}">
      @foreach($errors->all() as $error)
        <strong>{{$error}}</strong>
      @endforeach
    </div>
  </div>
</div>


@endsection
