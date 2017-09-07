<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneMake extends Model
{

  protected $fillable = ['phone_model'];
  public $timestamps = false;

  public function phones() {

    return $this->hasMany('\App\Phone', 'phone_model_id');

  }

  public static function findByName($name)
  {

    return static::where('phone_model', '=', $name)->first()->id;

  }

}
