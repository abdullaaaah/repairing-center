<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

  protected $fillable = ['phone_id', 'price', 'fault_id', 'country_id'];

  public function Phone()
  {

    return $this->belongsTo('\App\Phone', 'phone_id');

  }

  public function country()
  {
    return $this->belongsTo('\App\Country', 'country_id');
  }

  public function fault()
  {
    return $this->belongsTo('\App\Fault');
  }

  public function getCountry()
  {
    return $this->country->name;
  }

  public function getService()
  {
    return $this->fault->name;
  }

  public function getQuote()
  {
    return self::formatQuoteNew($this->country_id, $this->price);
  }

  public function formatQuoteNew($country_id, $amount)
  {
    return Country::find($country_id)->currency . "$amount";
  }

  public static function deleteExisting($country_id, $fault_id, $phone_id)
  {
    return Quote::where([
      ['country_id', '=', $country_id],
      ['fault_id', '=', $fault_id],
      ['phone_id', '=', $phone_id]
    ])->delete();
  }

}
