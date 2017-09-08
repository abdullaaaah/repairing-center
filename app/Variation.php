<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Variation extends Model
{

  use SoftDeletes;


  public $timestamps = false;
  protected $fillable = ['phone_id', 'color', 'capacity'];


  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];


  public function Phone()
  {

    return $this->belongsTo('\App\Phone', 'phone_id');

  }

  public static function getFormattedVariation($variation)
  {

    if($variation->color == "DO NOT DELETE THIS")
    {
      return "None";
    } else {
      return $variation->color;
    }

  }

}
