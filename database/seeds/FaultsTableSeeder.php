<?php

use Illuminate\Database\Seeder;

use App\Fault;

class FaultsTableSeeder extends Seeder
{

    public function run()
    {

      Fault::create([
        'name'=>'LCD Repair'
      ]);

    }
}
