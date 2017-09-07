<?php

use Illuminate\Database\Seeder;

use App\Phone;

class PhonesTableSeeder extends Seeder
{

    public function run()
    {

      Phone::create([
        'phone_model_id' => 1,
        'model' => 'Iphone 5'
      ]);


      Phone::create([
        'phone_model_id' => 1,
        'model' => 'Iphone 5s'
      ]);

      Phone::create([
        'phone_model_id' => 1,
        'model' => 'Iphone 6'
      ]);

    }
}
