<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Country;
use \App\City;
use \App\User;

class AdminLocationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

      $countries = User::getAllowedCountries();

      $data = compact('countries');

      $params = [
        'is_page_active' => PagesController::isPageActive('location'),
        'page_title' => "Manage Locations"
      ];

      return view('admin.location', array_merge($data, $params));

    }

    public function showCountry(Country $country)
    {

      $country_id = $country->id;

      $cities = City::getCitiesAlpha($country_id);

      $data = compact('country', 'cities', 'country_id');

      $params = [
        'is_page_active' => PagesController::isPageActive('location'),
        'page_title' => "Manage Country"
      ];

      return view('admin.location.country', array_merge($data, $params));

    }

    public function storeCity()
    {

      $this->validate(request(), [

        'name' => 'required',
        'supports_paypal' => 'required',
        'supports_cod' => 'required'

      ]);

      City::create(request()->all());

      return redirect(route('manage-country', request()->country_id));

    }

    public function deleteCity(City $city)
    {

      $city->delete();

      return redirect(route('manage-country', $city->country->id));

    }

    public function editCity(City $city)
    {
      $this->validate(request(), [
        'name' => 'required'
      ]);

      $city->update(request()->all());
      return redirect(route('manage-country', $city->country->id));

    }

    public function getJsonCities(Country $country)
    {
      return City::getCitiesAlpha($country->id);
    }

}
