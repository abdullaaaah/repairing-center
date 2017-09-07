@extends('admin.layouts.app')

@section('content')

<h1 class="h1">Phone Inventory</h1>
<p>Here you can manage all your phones.</p>
<hr />

<a href="/admin/inventory/brand"><div class="inventory-box">View Phones</div></a>
<a href="/admin/inventory/phones/create"><div class="inventory-box">Add Phones</div></a>

@endsection
