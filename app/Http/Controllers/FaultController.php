<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Fault;

class FaultController extends Controller
{
    public function create()
    {

      $faults = Fault::all();

      $data = compact('faults');

      return view('admin.fault', $data);
    }

    public function store()
    {

      $this->validate(request(), [
        'name' => 'required'
      ]);

      Fault::create(request()->all());

      return redirect(route('create-fault'));
    }

    public function delete(Fault $fault)
    {
      $fault->delete();
      return redirect(route('create-fault'));
    }
}
