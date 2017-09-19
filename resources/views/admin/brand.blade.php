@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Brands</h1>
<p>Manage your phone brands here.</p>
<hr />


<div class="table-responsive">
  <table class="table table-custom">
    <thead>
      <tr>
        <th>
          Name
        </th>

        <th>
          Image URL
        </th>

        <th>
          Save
        </th>

        <th>
          Disable
        </th>

        <th>
          Delete
        </th>

      </tr>
    </thead>

    <tbody>
      @foreach($brands as $brand)

      <tr>

        <form method="post" action="{{route('edit-brand', $brand->id)}}">
          {{csrf_field()}}
          {{method_field("PATCH")}}
          <td>
            <input type="text" value="{{$brand->phone_model}}" class="form-control" name="phone_model" />
          </td>

          <td>
            <input type="text" value="{{$brand->image_url}}" class="form-control" name="image_url" />
          </td>

          <td>
            <button class="btn btn-info" type="submit">Save</button>
          </td>
        </form>

        <td>

          @if(!$brand->is_disabled)

          <form method="post" action="{{route('disable-brand', $brand->id)}}">
            {{csrf_field()}}

            {{method_field("PATCH")}}

            <button class="btn btn-warning" type="submit">Disable</button>
          </form>

          @else

          <form method="post" action="{{route('enable-brand', $brand->id)}}">
            {{csrf_field()}}

            {{method_field("PATCH")}}

            <button class="btn btn-success" type="submit">Enable</button>
          </form>


          @endif
        </td>

        <form method="post" action="{{route('delete-brand', $brand->id)}}">
          {{csrf_field()}}
          {{method_field("DELETE")}}
          <td>
            <button class="btn btn-danger">Delete</button>
          </td>
        </form>

      </tr>

      @endforeach

      <tr>
        <form method="post" action="{{route('store-brand')}}">
          {{csrf_field()}}
          <td>
            <input type="text" placeholder="Company Name" class="form-control" name="phone_model" required/>
          </td>

          <td>
            <input type="text" placeholder="Image url" class="form-control" name="image_url" required />
          </td>

          <td>
            <button class="btn btn-success" type="submit">Add</button>
          </td>
        </form>

        <td>

        </td>

        <td>
        </td>
      </tr>

    </tbody>
  </table>
</div>

@endsection
