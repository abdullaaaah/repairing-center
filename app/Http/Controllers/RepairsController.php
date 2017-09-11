<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\PagesController;

use \App\PhoneMake;

use \App\Repair;

use \App\Quote;

use Illuminate\Support\Facades\Input;

use \App\RepairTiming;

use \App\Fault;

use \App\Phone;


class RepairsController extends Controller
{

  public function issue()
  {

    $faults = Fault::all();

    $data = compact('faults');

    $params = [

      'is_page_active' => PagesController::isPageActive('repair'),
      'page_title' => 'Repair'

    ];

    return view('repairs.select-issue', array_merge($data, $params));

  }

  public function selectBrand(Fault $fault)
  {

    $brands = PhoneMake::all();

    $data = compact('fault', 'brands');

    $params = [

      'is_page_active' => PagesController::isPageActive('repair'),
      'page_title' => 'Repair'

    ];

    return view('repairs.select-brand', array_merge($data, $params));

  }

  public function selectPhone($fault, PhoneMake $brand)
  {

    $countries = \App\Country::all();

    $phones = $brand->phones;

    $phones = array_filter(iterator_to_array($phones), function($phone) {
      if( count($phone->quotes) >= 2 ){
        return true;
      }
    });

    $data = compact('phones', 'countries', 'fault');

    $params = [

      'is_page_active' => PagesController::isPageActive('repair'),
      'page_title' => 'Repair'

    ];

    return view('repairs.select-phone', array_merge($data, $params));

  }

  public function storePhone(Request $request)
  {

    $request->session()->put('phone_id', request()->phone_id);
    $request->session()->put('variation_id', request()->variation_id);
    $request->session()->put('model_number', request()->model_number);
    $request->session()->put('description', request()->description);
    $request->session()->put('city_id', request()->city_id);
    $request->session()->put('country_id', request()->country_id);

    $this->validate(request(), [
      'phone_id' => 'required|not_in:0',
      //'variation_id' => 'required|not_in:0',
      'model_number' => 'nullable|numeric',
      'description' => 'required',
      'country_id' => 'required|not_in:0',
      'city_id' => 'required|not_in:0'
    ]);


    return redirect(route('create-repair', [ request()->fault_id, request()->phone_id ]));
  }

  public function create($fault_id, Phone $phone)
  {

    $country_code = session('country_id') == 1 ? 'UK' : 'UAE';

    $amount = Quote::where([

    ['phone_id', '=', session('phone_id')],
    ['country_code', '=', $country_code]

    ])->get()->first();

    if(isset($amount->id))
    {
      $amount_id = $amount->id;
    } else {
      dd("No price set for this phone");
    }

    $amount = \App\Quote::formatQuote($amount->country_code, $amount->price);

    $city = \App\City::find(session('city_id'));

    $payment_methods = [];

    if($city->supports_cod)
    {
      $payment_methods['cod']['value'] = "cod";
      $payment_methods['cod']['name'] = "Cash on delivery";
    }

    if($city->supports_paypal)
    {
      $payment_methods['paypal']['name'] = "Paypal";
      $payment_methods['paypal']['value'] = "paypal";
    }

    $phone_country_code = session('country_id') == 1 ? '+44' : '+971';


    $data = compact('amount','payment_methods', 'amount_id', 'phone_country_code', 'country_code', 'fault_id');

    $params = [

      'is_page_active' => PagesController::isPageActive('repair'),
      'page_title' => 'Repair'

    ];

    return view('repairs.submit-repair', array_merge($data, $params));

  }

  public function store(Request $request)
  {


    $this->validate(request(), [

    "contact_full_name" => "required|min:2",

    "contact_address" => "required",

    "contact_email" => "required|email",

    "contact_phone_number" => "required|min:6",

    'payment_method' => 'required|not_in:0',

    'quote_id' => 'required|not_in:0'

	 ]);

   $contact = request()->all();

   $contact['contact_phone_number'] = Repair::processPhoneNumber($contact['contact_phone_number']);

   if( !isset($contact['contact_postal_code'] )) {
     $contact['contact_postal_code'] = 0;
   }


   $repair_data = $request->session()->all();

   $everything = array_merge($contact, $repair_data);

   $repair = Repair::create($everything);

   $ref = $repair->booking_reference = Repair::generateBookingReference($repair);
   $repair->save();

   $repair->fault_id = request()->fault_id;
   $repair->save();

    \App\Tracking::create([
      'status' => 1,
      'repair_id' => $repair->id
    ]);

    repairTiming::create([
      'repair_id'=>$repair->id
    ]);

    $params = [
      'page_title' => "Thank you!",
      'is_page_active' => false
    ];

    $data = compact('contact', 'ref');

    return view('thankyou', array_merge($params, $data));

  }

  public function thankyou()
  {

    return view('thankyou', [

      'page_title' => "Thank you!",
      'is_page_active' => false

    ]);

  }

  public function show(\App\Repair $repair)
  {

    //logic

    $variation = \App\Variation::find($repair->variation_id);

    if($variation->color = "DO NOT DELETE THIS")
    {
      $variation->color = "No variation selected";
    }

    $phone = \App\Phone::find($variation->phone_id);

    $trackings = \App\Tracking::all()->where('repair_id', '=', $repair->id);

    $stats = \App\Tracking::getStatuses();

    $last_stat = $trackings->last()->status;

    $amount = \App\Quote::formatQuote($repair->quote->country_code, $repair->quote->price);

    $is_paid = $repair->payment_id ? true : false;

    // submit

    $data = compact('variation', 'phone', 'trackings', 'stats', 'repair', 'last_stat', 'is_paid', 'amount');

    $params = [
      'page_title'=>"Tracking Details",

      'is_page_active' => PagesController::isPageActive('track')
    ];

    return view('tracking_details', array_merge($params, $data));

  }

  public function showByPhone($phone)
  {

    $phone = Repair::processPhoneNumber($phone);

    return \App\Repair::latest()->where('contact_phone_number', '=', $phone)->first();

  }

  public function showByEmail($email)
  {

    return \App\Repair::latest()->where('contact_email', '=', $email)->first();

  }

  public function trackings(\App\Repair $repair)
  {

    echo $repair->readableTime($repair->trackings);

  }

  public function getJsonCities(\App\Country $country)
  {
    return $country->cities;
  }

}
