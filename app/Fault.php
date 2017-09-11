<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Fault extends Model
{
  use SoftDeletes;

  protected $guarded = [];

  protected $dates = ['deleted_at'];

  public function repairs() {
    return $this->hasMany('\App\Repair');
  }

  public function getBookingCount()
  {
    return count($this->repairs);
  }

}
