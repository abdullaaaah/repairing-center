<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {

      User::create([
        'name' => "Admin",
        'email' => "changeme@admin.com",
        'password' => bcrypt("admin123")
      ]);

    }
}
