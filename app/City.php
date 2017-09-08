<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $timestamps = false;

    protected $guarded = [];

    //methods

    public function country()
    {
      return $this->belongsTo('\App\Country', 'country_id');
    }

    public function repairs()
    {
      return $this->hasMany('App\Repair', 'city_id');
    }

    public static function withoutPaymentMethods()
    {
      $cities = \App\City::where([
        ['supports_cod', '=', false],
        ['supports_paypal', '=', false]
        ])->get();

      if( count($cities) )
      {
        return $cities;
      } else {
        return false;
      }
    }

    public static function getCitiesAlpha($country_id)
    {
      return City::where('country_id', '=', $country_id)->orderBy('name', 'ASC')->get();
    }

}
