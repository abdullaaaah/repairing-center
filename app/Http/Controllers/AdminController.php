<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;
use \App\Repair;
use \App\Phone;
use \App\Payment;
use \App\City;
use \App\repairTimings;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function home()
    {

      $total_bookings = count( Repair::all() );
      $payment_count = count( Payment::all() );
      $rejection_count = count( Repair::where('is_accepted', '=', 2)->get() );
      $completion_count = count( Repair::where('is_completed', '=', 1)->get() );

      $average_times = Repair::where('is_completed', '=', 1)->get();
      //$average_repair_time = ;

      $timings = array();

      foreach($average_times as $repair)
      {
        $timings[] = repairTimings::getCompletionTime($repair->id);
      }

      $timings = array_filter($timings);
      $average_time = array_sum($timings)/count($timings);
      $average_time = round($average_time,1);

      $attention = [];

      //cities without any payment methods
      $cities_without_payment = City::withoutPaymentMethods();

      if($cities_without_payment)
      {
        $attention['cities_without_payment'] = $cities_without_payment;
      }

      //Phones with no quotes
      $phones_with_no_quotes = Phone::withoutQuotes();

      if($phones_with_no_quotes)
      {
        $attention['phones_with_no_quotes'] = $phones_with_no_quotes;
      }

      //pending bookings
      $pendingBookings = Repair::getPendingRepairs( User::getRepairs() );

      //delegate

      $data = compact('total_bookings', 'total_phones', 'payment_count', 'attention', 'pendingBookings', 'rejection_count', 'completion_count', 'average_time');

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


    public function createUser($success = false)
    {

      $users = User::all();

      $is_page_active = PagesController::isPageActive('admin-create-user');
      $page_title = 'Create user';

      $data = compact('is_page_active', 'page_title', 'success', 'users');

      return view('admin.create-user', $data);

    }

    public function storeUser()
    {
      $this->validate(request(), [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required'
      ]);

      $user = User::create(request()->all());
      $user->access_uae = isset(request()->access_uae) ? request()->access_uae : 0;
      $user->access_uk = isset(request()->access_uk) ? request()->access_uk : 0;
      $user->password = bcrypt($user->password);
      $user->save();

      return redirect(route('create-admin-account', 'success'));

    }

    public function deleteUser(User $user)
    {
      $user->delete();
      return redirect(route('create-admin-account'));
    }




}
