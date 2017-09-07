<?php

use Illuminate\Database\Seeder;

use App\Quote;

class QuotesTableSeeder extends Seeder
{

    public function run()
    {

      Quote::create([
        'phone_id' => 1,
        'price' => 399,
        'country_code' => "UAE"
      ]);


      quote::create([
        'phone_id' => 1,
        'price' => 100,
        'country_code' => "UK"
      ]);

      quote::create([
        'phone_id' => 2,
        'price' => 600,
        'country_code' => "UAE"
      ]);


      quote::create([
        'phone_id' => 2,
        'price' => 120,
        'country_code' => "UK"
      ]);

      quote::create([
        'phone_id' => 3,
        'price' => 700,
        'country_code' => "UAE"
      ]);


      quote::create([
        'phone_id' => 3,
        'price' => 150,
        'country_code' => "UK"
      ]);

    }
}
