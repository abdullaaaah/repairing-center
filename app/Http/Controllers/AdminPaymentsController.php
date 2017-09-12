<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Payment;

class AdminPaymentsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function show()
  {
    $payments = Payment::all();
    return view('admin.payments', compact('payments'));
  }


}
