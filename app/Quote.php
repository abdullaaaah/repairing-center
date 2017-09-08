<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

  protected $fillable = ['phone_id', 'country_code', 'price'];

  public function Phone()
  {

    return $this->belongsTo('\App\Phone', 'phone_id');

  }

  public static function formatQuote($country_code = "", $amt = 0)
  {

    if($country_code == "UK")
    {
      return '£'.$amt;
    }

    if($country_code == "UAE")
    {
      return $amt . " AED";
    }

  }

}
