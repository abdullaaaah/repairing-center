<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('variation_id')->nullable();
            $table->integer('phone_id');
            $table->string('model_number')->nullable();
            $table->text('description');
            $table->string('contact_full_name');
            $table->string('contact_email');
            $table->string('contact_phone_number');
            $table->string('contact_address');
            $table->string('quote_id');
            $table->integer('payment_id')->nullable();
            $table->integer('city_id');
            $table->integer('country_id')->nullable();
            $table->string('payment_method')->default('paypal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repairs');
    }
}
