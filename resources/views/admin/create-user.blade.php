@extends('admin.layouts.app')

@section('content')

<div id='create-users-page'>

  <h1 class="h1">Create accounts</h1>
  <p>Create admin accounts here.</p>
  <hr />


  <div class="alert alert-danger" style="{{ $errors->all() ? '' : 'display:none;'}}">
    @foreach($errors->all() as $error)
    <p>
      <strong>{{$error}}</strong>
    </p>
    @endforeach
  </div>

  <div class="alert alert-success" style="{{$success ? '' : 'display:none'}}">
    User created succesfully.
  </div>

  <h4>Create new admin</h4>

  <form method="post" action="{{route('store-user')}}">

    {{csrf_field()}}

    <div class="row">

      <div class="col-lg-6">

        <div class="form-group">
          <input type="text" name="name" value="" placeholder="Name" class="form-control"  />
        </div>

      </div>

      <div class="col-lg-6">

        <div class="form-group">
          <input type="email" name="email" value="" placeholder="Email Address" class="form-control"  />
        </div>

      </div>


    </div>

    <div class="row">

      <div class="col-lg-12">

        <div class="form-group">
          <input type="password" name="password" value="" placeholder="Password" class="form-control"  />
        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-lg-12">

        <label class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" value="1" name="access_uk">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">Can access UK?</span>
        </label>

      </div>

    </div>

    <div class="row">
      <div class="col-lg-12">

        <label class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" value="1" name="access_uae">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">Can access UAE?</span>
        </label>

      </div>
    </div>

    <div class="row">

      <div class="col-lg-12">

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>

      </div>


    </div>

  </form>

  <hr />

  <h1>All Users</h1>

  <table class="table table-striped table-custom">
    <thead>
      <tr>
        <th>
          Name
        </th>

        <th>
          Email
        </th>

        <th>
          Delete
        </th>
      </tr>
    </thead>

    <tbody>
      @foreach($users as $user)

      <tr>
        <td>
          {{$user->name}}
        </td>

        <td>
          {{$user->email}}
        </td>

        <td>
          @if( $user->id == Auth::user()->id)
          <button class="btn btn-danger" disabled>Delete</button>
          @else

          <form method="post" action="{{route('delete-user', $user->id)}}" id="form-{{$user->id}}">
            {{method_field("DELETE")}}
            {{csrf_field()}}
            <button class="btn btn-danger confirmable" data-form-id="{{$user->id}}">Delete</button>
          </form>
          @endif
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>


</div>

@endsection
