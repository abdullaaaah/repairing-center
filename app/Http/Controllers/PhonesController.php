<?php

namespace App\Http\Controllers;

use App\Phone;

class PhonesController extends Controller
{

  public function index()

  {

    echo Phone::all();

  }

  public function show(Phone $phone )
  {

    return $phone;

  }

  public function showByBrand($brand)
  {

    //price set

    $phones = Phone::all()->where('phone_model_id', '=', $brand);


    /*$phones = array_filter(iterator_to_array($phones), function($phone) {
      if( count($phone->quotes) >= 2 ){
        return true;
      }
    });*/

    return $phones;

  }

  public function showByModel($model)
  {

    return Phone::all()->where('model', '=', $model);

  }

}
