<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Quote;

use \App\Phone;


class AdminQuotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Phone $phone)
    {

      $ukQuote = $phone->getQuote("UK");
      $uaeQuote = $phone->getQuote("UAE");

      $data = compact('phone', 'uaeQuote', 'ukQuote');

      $params = [
        'is_page_active' => PagesController::isPageActive('manage'),
        'page_title' => "Pricing"
      ];

      return view('admin.inventory.pricing', array_merge($data, $params));

    }

    public function store()
    {

      $this->validate(request(), [
        'price' => 'required|numeric',
        'country_code' => 'required'
      ]);

      Quote::create(request()->all());

      return redirect('/admin/inventory/quotes/phone/' . request()->phone_id);

    }

}
