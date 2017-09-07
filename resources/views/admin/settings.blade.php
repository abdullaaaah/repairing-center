@extends('admin.layouts.app')

@section('content')

<div id='settings-page'>

  <h1 class="h1">SETTINGS</h1>
  <p>Manage your admin account here</p>
  <hr />

<div class="alert alert-danger" style="{{ $errors->all() ? '' : 'display:none;'}}">
  @foreach($errors->all() as $error)
  <p>
    <strong>{{$error}}</strong>
  </p>
  @endforeach
</div>

<div class="alert alert-success" style="{{$success ? '' : 'display:none'}}">
  Your changes were succesfully made.
</div>

  <h4>EMAIL</h4>

  <form method="post" action="{{route('change-email')}}">

    {{method_field('PATCH')}}

    {{csrf_field()}}

    <div class="row">
      <div class="form-group">
        <input type="email" name="email" value="{{$email}}" class="form-control"  />
      </div>
    </div>

    <div class="row">
      <div class="form-group">
        <button type="submit" class="btn btn-primary">CHANGE</button>
      </div>
    </div>

  </form>


<h4>PASSWORD</h4>

<form method="post" action="{{route('change-password')}}">

  {{method_field('PATCH')}}

  {{csrf_field()}}

  <div class="row">
    <div class="form-group">
      <input type="password" name="password" value="" class="form-control"  />
    </div>

  </div>

  <div class="row">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">CHANGE</button>
    </div>
  </div>

</form>

</div>

@endsection
