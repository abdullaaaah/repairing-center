<?php

use Illuminate\Database\Seeder;

use App\Variation;

class VariationsTableSeeder extends Seeder
{

    public function run()
    {

      Variation::create([
        'phone_id' => 1,
        'color' => 'Gold',
        'capacity' => 16
      ]);


      Variation::create([
        'phone_id' => 1,
        'color' => 'Gold',
        'capacity' => '32'
      ]);

      Variation::create([
        'phone_id' => 1,
        'color' => 'Black',
        'capacity' => '16'
      ]);

      Variation::create([
        'phone_id' => 2,
        'color' => 'Gold',
        'capacity' => 16
      ]);


      Variation::create([
        'phone_id' => 2,
        'color' => 'Gold',
        'capacity' => '32'
      ]);

      Variation::create([
        'phone_id' => 2,
        'color' => 'Black',
        'capacity' => '16'
      ]);

    }
}
