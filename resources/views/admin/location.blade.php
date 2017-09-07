@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Location management</h1>
<p>You can use this page to manage services by location.</p>
<hr  />

<h4>Currently supported countries</h4>
<table class="table table-responsive table-custom">
  <thead>
    <tr>

      <th>
        COUNTRY
      </th>

      <th>
        SHORT NAME
      </th>

      <th>
        # OF CITIES
      </th>

    </tr>
  </thead>

  <tbody>
    @foreach($countries as $country)

    <tr data-href="{{ route('manage-country', $country->id) }}" class="clickable">
      <td>
        {{ $country->name }}
      </td>

      <td>
        {{ $country->code }}
      </td>

      <td>
        {{ count($country->cities) }}
      </td>
    </tr>

    @endforeach
  </tbody>
</table>


@endsection
