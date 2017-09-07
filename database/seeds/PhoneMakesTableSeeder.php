<?php

use Illuminate\Database\Seeder;

use App\PhoneMake;

class PhoneMakesTableSeeder extends Seeder
{

    public function run()
    {

      PhoneMake::create([
        'phone_model' => 'apple'
      ]);

      PhoneMake::create([
        'phone_model' => 'samsung'
      ]);

      PhoneMake::create([
        'phone_model' => 'htc'
      ]);

      PhoneMake::create([
        'phone_model' => 'sony'
      ]);

      PhoneMake::create([
        'phone_model' => 'blackberry'
      ]);

    }
}
