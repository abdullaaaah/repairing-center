<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Repair;

use \App\Country;

use \App\Variation;

use \App\PhoneMake;

use \App\Phone;


class AdminVariationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete(Variation $variation)
    {
      $variation->delete();
      return redirect("/admin/inventory/phone/" . $variation->phone->id);
    }

    public function store()
    {
      $this->validate(request(), [
        'color' => 'required'
      ]);

      Variation::create( request()->all() );

      return redirect("/admin/inventory/phone/" . request()->phone_id);
    }

}
