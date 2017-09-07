<?php

use Illuminate\Database\Seeder;

use App\Repair;

class RepairsTableSeeder extends Seeder
{

    public function run()
    {

      Repair::create([

      	'variation_id' => 1,

        'phone_id' => 1,

        'model_number' => 12345,

        'description' => 'fell down the stairs.',

        "contact_full_name" => "Abdullah Shahid",

        "contact_address" => "510 43 thorncliffe pk dr, toronto",

        "contact_email" => "abdullaaaah_@outlook.com",

        "contact_phone_number" => "647-000-0000",

        'quote_id' => 1,

        'city_id' => 1,

        'country_id' => 2

        ]);

        Repair::create([

          'variation_id' => 2,

          'phone_id' => 1,

          'model_number' => 69,

          'description' => 'fell down the roof.',

          "contact_full_name" => "John",

          "contact_address" => "somewhere in uk",

          "contact_email" => "johndoe@live.com",

          "contact_phone_number" => "905-000-0000",

          'quote_id' => 1,

          'city_id' => 2,

          'country_id' => 2

          ]);

    }
}
