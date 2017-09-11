<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairTiming extends Model
{
  protected $guarded = [];

  public function repair()
  {
    $this->belongsTo('\App\Repair');
  }

  public static function finalize($id)
  {

    return self::create([
      'repair_id' => $id,
      'status' => 'finish'
    ]);

  }

  public static function getCompletionTime($id)
  {
    $repair_start = self::where([
      ['repair_id', '=', $id],
      ['status', '=', 'start']
    ])->get()->last();

    $repair_finish = self::where([
      ['repair_id', '=', $id],
      ['status', '=', 'finish']
    ])->get()->last();

    if($repair_start && $repair_finish)
    {
      return $repair_finish->created_at->diffInMinutes($repair_start->created_at) / 60;
    }
  }

  public static function makeAverageTime($arr)
  {

    $arr = array_filter($arr); //remove 0s and empty spots

    $average = array_sum($arr)/count($arr); // gets the average

    return round($average, 1); //rounds it up to 1 decimal palce
  }


  public static function getAverageTime()
  {

    $completed_repairs = Repair::where('is_completed', '=', 1)->get();
    $timings = array();

    if(count($completed_repairs))
    {
      foreach($completed_repairs as $repair)
      {
        $timings[] = self::getCompletionTime($repair->id); // An array of times in decimal hours
      }
      return self::makeAverageTime($timings);
    }

  }


}
