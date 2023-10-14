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
        Schema::create('user_agents', function (Blueprint $table) {
            $table->id();
            $table->string('user_agent')->nullable();
            $table->string('ua')->nullable();
            $table->string('ua_major')->nullable();
            $table->string('ua_minor')->nullable();
            $table->string('ua_patch')->nullable();
            $table->string('os')->nullable();
            $table->string('os_major')->nullable();
            $table->string('os_minor')->nullable();
            $table->string('os_patch')->nullable();
            $table->string('device')->nullable();
            $table->string('device_brand')->nullable();
            $table->string('device_model')->nullable();
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
        Schema::dropIfExists('user_agents');
    }
};
