@extends('admin.layouts.app')

@section('content')

<div id="phone-inventory">

  <h1 class="h1">Phone Inventory</h1>
  <p>Here you can manage all your phones.</p>

  <table class="table table-responsive table-custom">
    <thead>
      <tr><th>Model</th><th># of Variations</th><th>Remove</th><th>Price</th></tr>
    </thead>

  @foreach($phones as $phone)

    <tr>

      <td>

      <a href="/admin/inventory/phone/{{$phone->id}}">{{$phone->model}}</a>

      </td>


      <td>

      {{count( $phone->variations )}}

      </td>

      <td>

      <form method="post" action="/admin/inventory/phone/{{$phone->id}}" id="form-{{$phone->id}}">

        {{ method_field("DELETE") }}

        {{csrf_field()}}

        <button type="submit" class="btn btn-danger confirmable" data-form-id="{{$phone->id}}">Delete</button>

      </form>

      </td>

      <td>

        <a href="/admin/inventory/quotes/phone/{{$phone->id}}"><button type="button" class="btn btn-primary">Manage Pricing</button></a>

      </td>

    </tr>

  @endforeach

  </table>
</div>



@endsection
