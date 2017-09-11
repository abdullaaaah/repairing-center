<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageUrlToPhoneMakes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phone_makes', function (Blueprint $table) {
            $table->string('image_url')->default('/img/iphone.png')->after('phone_model');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phone_makes', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
}
