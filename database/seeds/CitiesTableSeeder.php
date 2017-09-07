<?php

use Illuminate\Database\Seeder;

use App\City;

class CitiesTableSeeder extends Seeder
{

    public function run()
    {

      City::create([
        'country_id' => 1,
        'name' => 'London',
        'supports_cod' => true
      ]);

      City::create([
        'country_id' => 2,
        'name' => 'Dubai',
        'supports_cod' => true
      ]);

    }
}
