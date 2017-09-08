<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{

  protected $fillable = ['status', 'repair_id'];

  protected static $statuses = [

    1 => "Booking reserved",
    2 => "Collection arranged",
    3 => "Arrived at our center",
    4 => "Diagnosing faults",
    5 => "Waiting for parts",
    6 => "Parts recieved",
    7 => "Testing QC",
    8 => "In dispatch to your location",
    9 => "Delivered"

  ];

  public function repair()
  {
    return $this->belongsTo('\App\Repair', 'repair_id');
  }

  public static function getStatuses()
  {
    return static::$statuses;
  }

  public static function status(Tracking $tracking)
  {
    return static::$statuses[$tracking->status];
  }

  public static function isComplete($status)
  {
    if($status<9)
    {
      return false;
    } else {
      return true;
    }
  }

  public static function isRepairAwaiting($repair)
  {
    //awaiting repairs are repairs which are accepted but don't have any tracking details

    if ( count($repair->trackings) && $repair->trackings->last()->status == 1 )
    {
      return true;
    } else {
      return false;
    }

  }

}
