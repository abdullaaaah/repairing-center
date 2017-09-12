<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
      'type', 'status', 'transaction_id', 'amount_paid', 'currency', 'repair_id'
    ];

    public function repair()
    {
      return $this->belongsTo('\App\Repair');
    }

    public function getTransactionId()
    {
      return $this->transaction_id;
    }

    public function getAmount()
    {
      return $this->amount_paid;
    }

    public function getCurrency()
    {
      return $this->currency;
    }

    public function getRef()
    {
      return $this->repair->booking_reference;
    }

}
