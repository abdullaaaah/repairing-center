<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTechnicianDetailsToRepairs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repairs', function (Blueprint $table) {
            $table->string('phone_imei')->default("none");
            $table->text('comments')->nullable();
            $table->string('tracking_num')->nullable();
            $table->string('tracking_carrier')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repairs', function (Blueprint $table) {
            $table->dropColumn('phone_imei');
            $table->dropColumn('comments');
            $table->dropColumn('tracking_num');
            $table->dropColumn('tracking_carrier');
        });
    }
}
