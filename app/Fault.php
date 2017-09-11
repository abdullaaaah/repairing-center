<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    public function repairs {
      $this->hasMany('\App\Repair');
    }
}
