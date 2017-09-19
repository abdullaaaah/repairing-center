<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\PhoneMake;

class PhoneMakesController extends Controller
{
    public function create()
    {

      $brands = PhoneMake::all();

      $data = compact('brands');

      return view('admin.brand', $data);
    }

    public function store()
    {

      $this->validate(request(), [
        'phone_model' => 'required'
      ]);

      PhoneMake::create(request()->all());

      return redirect(route('create-brand'));
    }

    public function delete(PhoneMake $brand)
    {
      $brand->delete();
      return redirect(route('create-brand'));
    }

    public function edit(PhoneMake $brand)
    {

      $this->validate(request(), [
        'phone_model' => 'required', 'image_url' => 'required'
      ]);

      $brand->phone_model = request()->phone_model;
      $brand->image_url = request()->image_url;
      $brand->save();

      return redirect(route('create-brand'));
    }

    public function disable(\App\PhoneMake $brand)
    {

      $brand->is_disabled = true;
      $brand->save();

      return redirect(route('create-brand'));

    }

    public function enable(\App\PhoneMake $brand)
    {
      $brand->is_disabled = false;
      $brand->save();

      return redirect(route('create-brand'));
    }

}
