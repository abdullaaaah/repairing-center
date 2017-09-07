@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Phone by brand</h1>
<p>Select a brand to continue.</p>

@foreach($brands as $brand)

<a href="/admin/inventory/brand/{{$brand->id}}" style="font-weight:700; margin-bottom:8px; display:block;"> {{ ucfirst($brand->phone_model) }}</a>

@endforeach



@endsection
