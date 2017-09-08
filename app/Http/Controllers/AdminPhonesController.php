<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Repair;

use \App\Country;

use \App\Variation;

use \App\PhoneMake;

use \App\Phone;


class AdminPhonesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showBrands()
    {
      $brands = PhoneMake::all();
      $is_page_active = PagesController::isPageActive('inventory');
      $page_title = "Select Brand";

      $data = compact('brands', 'is_page_active', 'page_title');

      return view('admin.inventory.brands', $data);
    }

    public function index(PhoneMake $phoneMake)
    {
      $phones = $phoneMake->phones;
      $brand = $phoneMake->id;

      $is_page_active = PagesController::isPageActive('inventory');
      $page_title = "Select Brand";

      $data = compact('phones', 'brands', 'is_page_active', 'page_title');

      return view('admin.inventory.phones', $data);
    }

    public function delete(Phone $phone)
    {
      $phone->delete();
      return redirect("/admin/inventory/brand/" . $phone->phoneMake->id);
    }

    public function show(Phone $phone)
    {

      $is_page_active = PagesController::isPageActive('inventory');
      $page_title = 'Variations';

      $data = compact('phone', 'page_title', 'is_page_active');

      return view('admin.inventory.variations', $data);

    }


    public function create()
    {
      $brands = PhoneMake::all();
      $is_page_active = PagesController::isPageActive('inventory');
      $page_title = 'Create Phone';

      $data = compact('brands', 'is_page_active', 'page_title');

      return view('admin.inventory.create_phone', $data);
    }

    public function store()
    {
      $this->validate(request(), [
        'phone_model_id' => 'required',
        'model' => 'required'
      ]);

      Phone::create(request(['phone_model_id', 'model']));

      return redirect('/admin/inventory/brand/'. request()->phone_model_id);
    }

}
