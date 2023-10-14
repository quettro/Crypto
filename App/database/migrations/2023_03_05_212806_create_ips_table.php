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
        Schema::create('ips', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('region_code')->nullable();
            $table->string('region_name')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country_name')->nullable();
            $table->string('continent_code')->nullable();
            $table->string('continent_name')->nullable();
            $table->string('timezone')->nullable();
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
        Schema::dropIfExists('ips');
    }
};
