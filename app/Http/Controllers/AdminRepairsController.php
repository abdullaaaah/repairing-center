<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Repair;

use \App\Country;

use \App\Variation;

use \App\Tracking;

use \App\Phone;


class AdminRepairsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showPendingRepairs($country)
    {

      $repairs = Repair::getPendingRepairs( Country::findByName($country)->repairs );

      $type = "Pending Repairs";

      $page_title = 'Pending Repairs';

      $is_page_active = PagesController::isPageActive('manage');

      $data = compact('repairs', 'type', 'country', 'page_title', 'is_page_active');

      return view('admin.manage.all', $data);

    }

    public function showAcceptedRepairs($country)
    {

      $repairs = Repair::getAcceptedRepairs( \App\Country::findByName($country)->repairs );

      $type = "Accepted Repairs";

      $page_title = 'Accepted Repairs';

      $is_page_active = PagesController::isPageActive('manage');

      $data = compact('repairs', 'type', 'country', 'page_title', 'is_page_active');

      return view('admin.manage.all', $data);

    }

    public function showCompletedRepairs($country)
    {

      $repairs = Repair::getCompletedRepairs( \App\Country::findByName($country)->repairs );

      $type = "Completed Repairs";

      $page_title = 'Completed Repairs';

      $is_page_active = PagesController::isPageActive('manage');

      $data = compact('repairs', 'type', 'country', 'page_title', 'is_page_active');

      return view('admin.manage.all', $data);

    }

    public function show(Repair $repair)
    {

      $currentStat = Repair::getRepairStatus($repair);

      $variation = Variation::getFormattedVariation($repair->variation);

      $trackingStatuses = Tracking::getStatuses();

      $phone = Phone::getFormattedPhone( Phone::find($repair->phone_id) );

      //page information

      $is_page_active = PagesController::isPageActive('manage');

      $page_title = 'Booking Details';

      $data = compact('repair', 'currentStat', 'variation', 'trackingStatuses', 'is_page_active', 'page_title', 'phone');

      return view('admin.manage.repair', $data);

    }

    public function accept(Repair $repair)
    {
      $repair->is_accepted = 1;
      $repair->save();

      return redirect(route('home-admin'));
    }

    public function reject(Repair $repair)
    {
      $repair->is_accepted = 2;
      $repair->save();

      return redirect(route('home-admin'));
    }




}
