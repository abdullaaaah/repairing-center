<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\City;
use \App\Country;

class LocationsController extends Controller
{

  public function getJsonCities(Country $country)
  {
    return City::getCitiesAlpha($country->id);
  }
  
}
