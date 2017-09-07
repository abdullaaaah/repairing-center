<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Repair;

use \App\Country;


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



}
