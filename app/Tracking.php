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
    8 => "Ready for dispatch",
    9 => "In dispatch to your location",
    10 => "Delivered"

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

  public function setTrackingDetails($id, $num, $carrier)
  {
    $repair = Repair::find($id);
    $repair->tracking_num = $num;
    $repair->tracking_carrier = $carrier;
    return $repair->save();
  }




}
