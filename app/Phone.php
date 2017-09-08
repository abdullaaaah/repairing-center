<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Phone extends Model
{

  use SoftDeletes;


  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  public $timestamps = false;
  protected $fillable = ['phone_model_id', 'model', 'color', 'capacity'];


  public function phoneMake()
  {

    return $this->belongsTo('\App\PhoneMake', 'phone_model_id');

  }

  public function variations()
  {

    return $this->hasMany('\App\Variation', 'phone_id');

  }

  public function quotes()
  {

    return $this->hasMany('\App\Quote', 'phone_id');

  }

  public static function getFormattedPhone($phone)
  {
    if($phone)
    {
      return strtoupper($phone->model);
    } else {
      return "Error, Phone not found";
    }
  }

  public function getQuote($country_code)
  {

    $quote = $this->quotes->where('country_code','=', $country_code)->last();

    if(isset($quote))
    {
      return Quote::formatQuote( $quote->country_code, $quote->price  );
    } else {
      return "Not found.";
    }

  }

  public static function withoutQuotes()
  {

    $phones = static::all();
    $phones = array_filter(iterator_to_array($phones), function($phone) {

      $quotes = $phone->quotes;

      if(isset($quotes))
      {

        if(count($quotes) < 2)
        {
          return true;
        } else {
          return false;
        }

      } else {
        return false;
      }

    });

    if ( count($phones) )
    {
      return $phones;
    } else {
      return false;
    }

  }

}
