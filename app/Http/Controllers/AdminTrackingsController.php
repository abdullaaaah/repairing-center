<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Tracking;


class AdminTrackingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {

      Tracking::create(request()->all());
      return redirect('/admin/manage/repair/' . request()->repair_id);

    }

}
