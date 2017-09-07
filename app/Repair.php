<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = [
      'variation_id',
      'model_number',
      'description',
      'contact_full_name',
      'contact_email',
      'contact_phone_number',
      'contact_address',
      'quote_id',
      'country_id',
      'phone_id',
      'city_id',
      'payment_method',
      'contact_postal_code'
    ];

    public function trackings()
    {

      return $this->hasMany('\App\Tracking', 'repair_id');

    }

    public function variation()
    {
      return $this->belongsTo('\App\Variation', 'variation_id');
    }

    public function quote()
    {
      return $this->belongsTo('\App\Quote', 'quote_id');
    }

    public function country()
    {
      return $this->belongsTo("\App\Country", 'country_id');
    }

    public function readableTime($arrays)
    {

      foreach($arrays as $array)
      {

        $array->formatted_created_at = $array->created_at->diffForHumans();
        $array->formatted_updated_at =  $array->updated_at->diffForHumans();

      }

      return $arrays;

    }

}
