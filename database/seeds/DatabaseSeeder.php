<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
      $this->call(PhoneMakesTableSeeder::class);
      $this->call(PhonesTableSeeder::class);
      $this->call(VariationsTableSeeder::class);
      $this->call(QuotesTableSeeder::class);
      $this->call(RepairsTableSeeder::class);
      $this->call(TrackingsTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(CountriesTableSeeder::class);
      $this->call(CitiesTableSeeder::class);*/

      $this->call(FaultsTableSeeder::class);

    }
}
