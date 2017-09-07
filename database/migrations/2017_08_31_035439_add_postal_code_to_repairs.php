<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostalCodeToRepairs extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('repairs', function($table) {
      $table->string('contact_postal_code')->after('contact_phone_number');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('repairs', function($table) {
      $table->dropColumn('contact_postal_code');
    });
  }
}
