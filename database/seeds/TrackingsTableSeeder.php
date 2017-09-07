<?php

use Illuminate\Database\Seeder;

use App\Tracking;

class TrackingsTableSeeder extends Seeder
{

    public function run()
    {

      Tracking::create([
        'repair_id' => 2,
        'status' => 4
      ]);

    }
}
