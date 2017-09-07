@extends('layouts.master')

@section('content')

<div class="container">

  <div class="alert alert-danger" style="{{$errors->all()? '' : 'display:none'}}">
    @foreach($errors->all() as $error)
    <p>
      {{$error}}
    </p>
    @endforeach
  </div>

  <form method="post" action="/repairs" id="repair-form">

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <input type="hidden" name="quote_id" id="quote_id" value="">

    <div id="identify-issue" style="display:">

      @include('repairs.identify_issue')

    </div>

    <div id="step-one" style="display:none">

      @include('repairs.select_make')

    </div>

    <div id="step-two" style="display:none">

      @include('repairs.select_model')

    </div>

    <div id="step-three" style="display:none">

      @include('repairs.client_info')

    </div>

  </form>

</div>

@endsection
