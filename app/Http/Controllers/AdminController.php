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

    //manage bookings

    public function manage()
    {
      return view('admin.manage', [

        'is_page_active' => PagesController::isPageActive('manage'),
        'page_title' => 'Manage'

      ]);
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
