@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Faults</h1>
<p>A fault is a category under which a repair booking is listed, here you can manage them.</p>
<hr />

<h4>Current Faults</h4>

<div class="table-responsive">
  <table class="table table-custom">
    <thead>
      <tr>
        <th>
          Fault Name
        </th>

        <th>
          Bookings under this fault
        </th>

        <th>
          Action
        </th>


      </tr>
    </thead>

    <tbody>

      @if(!count($faults))

      <tr><td>None found</td></tr>

      @else

        @foreach($faults as $fault)

          <tr>
            <td>
              {{$fault->name}}
            </td>

            <td>
              {{$fault->getBookingCount()}}
            </td>

            <td>
              <form method="post" action="{{route('delete-fault', $fault->id)}}">
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>

          </tr>

        @endforeach

      @endif


      <tr>
        <form method="post" action="{{route('store-fault')}}">

          {{csrf_field()}}

          <td>
            <input type="text" class="form-control" name="name" placeholder="LCD repair..." />
          </td>

          <td>...</td>

          <td><button type="submit" class="btn btn-primary">Create</button></td>

        </form>
      </tr>
    </tbody>
  </table>
</div>

@endsection
