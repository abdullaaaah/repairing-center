<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  protected $fillable = ['country_code'];
  public $timestamps = false;

  public function cities()
  {
    return $this->hasMany('\App\City', 'country_id');
  }

  public function repairs()
  {
    return $this->hasMany('\App\Repair', 'country_id');
  }

  public static function findByName($country_code)
  {

    $country = static::where('code', '=', $country_code)->get();

    return $country[0];

  }
}
