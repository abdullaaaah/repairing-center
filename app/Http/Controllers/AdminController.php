<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function home()
    {

      $total_bookings = count(\App\Repair::all());
      $total_phones = count(\App\Phone::all());
      $payment_count = count(\App\Payment::all());

      $attention = [];

      //cities without any payment methods

      $cities_without_payment = \App\City::where([
        ['supports_cod', '=', false],
        ['supports_paypal', '=', false]
        ])->get();

      if(count($cities_without_payment))
      {
        $attention['cities_without_payment'] = $cities_without_payment;
      }

      //bookings with due payments

      $bookings_due_payments = \App\Repair::all();

      array_filter(iterator_to_array($bookings_due_payments), function($booking) {

        $stat = $booking->trackings->last();

        if($stat)
        {
          if($stat->status > 7)
          {
            return true;
          }
        }

      });

      if(count($bookings_due_payments))
      {
        $attention['bookings_due_payments'] = $bookings_due_payments;
      }

      //Phones with no quotes

      $phones_with_no_quotes = \App\Phone::all();

      $phones_with_no_quotes = array_filter(iterator_to_array($phones_with_no_quotes), function($phone) {

        $quotes = $phone->quotes;

        if(isset($quotes))
        {

          if(count($quotes) < 2)
          {

            return true;

          } else {

            return false;

          }

        } else {
          return false;
        }

      });

      if(count($phones_with_no_quotes))
      {
        $attention['phones_with_no_quotes'] = $phones_with_no_quotes;
      }

      //delegate

      $data = compact('total_bookings', 'total_phones', 'payment_count', 'attention');

      $params = [
        'is_page_active' => PagesController::isPageActive('admin_home'),
        'page_title' => 'Home'
      ];

      return view('admin.home', array_merge($data, $params));
    }

    public function inventory()
    {

      $is_page_active = PagesController::isPageActive('inventory');
      $page_title = 'Inventory';

      $data = compact('is_page_active', 'page_title');

      return view('admin.inventory', $data);

    }

    //manage

    public function manage()
    {
      return view('admin.manage', [

        'is_page_active' => PagesController::isPageActive('manage'),
        'page_title' => 'Manage'

      ]);
    }

    public function storeTrackings()
    {

      \App\Tracking::create(request()->all());

      return redirect('/admin/manage/repair/' . request()->repair_id);

    }


    //pricing

    public function quotes(\App\Phone $phone)
    {

      $uk_quote = $phone->quotes->where('country_code','=', 'UK')->last();

      if(isset($uk_quote))
      {
        $uk_quote = \App\Quote::formatQuote( $uk_quote->country_code, $uk_quote->price  );
      }


      $uae_quote = $phone->quotes->where('country_code', '=', 'UAE')->last();

      if(isset($uae_quote))
      {
        $uae_quote = \App\Quote::formatQuote( $uae_quote->country_code, $uae_quote->price );
      }


      $data = compact('phone','quote_exists', 'uae_quote', 'uk_quote');

      $params = [
        'is_page_active' => PagesController::isPageActive('manage'),
        'page_title' => "Pricing"
      ];

      return view('admin.inventory.pricing', array_merge($data, $params));

    }

    public function storeQuote()
    {

      $this->validate(request(), [
        'price' => 'required|numeric',
        'country_code' => 'required'
      ]);

      \App\Quote::create(request()->all());

      return redirect('/admin/inventory/quotes/phone/' . request()->phone_id);

    }

    //location

    public function indexLocation()
    {

      $countries = \App\Country::all();

      $data = [];

      $data = compact('countries');

      $params = [
        'is_page_active' => PagesController::isPageActive('location'),
        'page_title' => "Manage Locations"
      ];

      return view('admin.location', array_merge($data, $params));

    }

    public function viewCountry(\App\Country $country)
    {
      $data = [];

      $country_id = $country->id;

      $cities = $country->cities;

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

      \App\City::create(request()->all());

      return redirect(route('manage-country', request()->country_id));

    }

    public function deleteCity(\App\City $city)
    {

      $city->delete();

      return redirect(route('manage-country', $city->country->id));

    }

    public function editCity(\App\City $city)
    {
      $this->validate(request(), [
        'name' => 'required'
      ]);

      $city->update(request()->all());
      return redirect(route('manage-country', $city->country->id));

    }

    public function getJsonCities(\App\Country $country)
    {
      return $country->cities;
    }

    public function settings(\App\User $user, $success = false)
    {

      $success = request()->success;

      $email = \Auth::user()->email;

      $data = compact('email', 'success');

      $params = [
        'is_page_active' => PagesController::isPageActive('settings'),
        'page_title' => "Settings"
      ];

      return view('admin.settings', array_merge($data, $params));

    }

    public function editPassword()
    {

      $this->validate(request(), [
        'password' => 'required|min:6'
      ]);

      \Auth::user()->password = bcrypt(request()->password);

      \Auth::user()->save();

      return redirect()->action(
        'AdminController@settings', ['user' => null, 'success' => true]
      );

    }

    public function editEmail()
    {

      $this->validate(request(), [
        'email' => 'email|min:2|required|unique:users'
      ]);

      \Auth::user()->email = request()->email;

      \Auth::user()->save();

      return redirect()->action(
        'AdminController@settings', ['user' => null, 'success' => true]
      );


    }


}
