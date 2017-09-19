<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Tracking;
use \App\Repair;


class AdminTrackingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {

      $tracking = Tracking::create(request()->all());

      if($tracking->status == 9) // if it is sent for dispatch
      {
        $tracking->setTrackingDetails($tracking->repair_id, request()->track_num, request()->track_carrier);
      } else {
        $tracking->setTrackingDetails($tracking->repair_id, null, null);
      }

      if($tracking->status == 8)
      {
        //mail..
      }

      return redirect('/admin/manage/repair/' . request()->repair_id);

    }

}
