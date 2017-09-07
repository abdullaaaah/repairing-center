<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
      'type', 'status', 'transaction_id', 'amount_paid', 'currency', 'repair_id'
    ];


}
