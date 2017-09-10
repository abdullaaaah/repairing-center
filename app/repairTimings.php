<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repairTimings extends Model
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
}
