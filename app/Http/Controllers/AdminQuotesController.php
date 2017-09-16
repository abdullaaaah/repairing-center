<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Quote;

use \App\Phone;

use \App\Fault;

use \App\Country;


class AdminQuotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Phone $phone)
    {

      /*$ukQuote = $phone->getQuote("UK");
      $uaeQuote = $phone->getQuote("UAE");*/

      $countries = Country::all();

      $faults = Fault::all();

      $quotes = Quote::where('phone_id', '=', $phone->id)->get();

      $data = compact('phone', 'quotes', 'faults', 'countries');

      return view('admin.inventory.pricing', array_merge($data, $data));

    }

    public function store()
    {

      $this->validate(request(), [
        'price' => 'required|numeric',
        'country_id' => 'required|not_in:0',
        'fault_id'=> 'required|not_in:0'
      ]);


      //delete existing quote..
      $test = Quote::deleteExisting(request()->country_id, request()->fault_id, request()->phone_id);

      Quote::create(request()->all());

      return redirect('/admin/inventory/quotes/phone/' . request()->phone_id);

    }

}
