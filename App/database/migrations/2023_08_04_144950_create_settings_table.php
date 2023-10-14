<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('contact');
            $table->string('hcaptcha_public');
            $table->string('hcaptcha_secret');
            $table->string('referral_program_parameter');
            $table->unsignedTinyInteger('referral_program_commission_percentage');
            $table->unsignedDecimal('freebie_tether', 16, 8);
            $table->unsignedInteger('freebie_timeout');
            $table->unsignedInteger('freebie_limit_per_day');
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
        Schema::dropIfExists('settings');
    }
};
