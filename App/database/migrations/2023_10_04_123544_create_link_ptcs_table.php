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
        Schema::create('link_ptcs', function (Blueprint $table) {
            $table->id();
            $table->string('uniqid')->unique();
            $table->unsignedTinyInteger('status');
            $table->unsignedBigInteger('link_id')->nullable();
            $table->unsignedBigInteger('ip_id')->nullable();
            $table->unsignedBigInteger('user_agent_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('link_ptcs');
    }
};
