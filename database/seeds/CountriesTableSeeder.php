<?php

use Illuminate\Database\Seeder;

use App\Country;

class CountriesTableSeeder extends Seeder
{

    public function run()
    {

      Country::create([
        'name' => 'United Kingdom',
        'code' => 'UK',
        'currency' => "POUNDS"
      ]);

      Country::create([
        'name' => 'United Arab Emirates',
        'code' => 'UAE',
        'currency' => "AED"
      ]);


    }
}
