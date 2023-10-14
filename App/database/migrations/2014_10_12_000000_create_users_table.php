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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->text('referer')->nullable();
            $table->unsignedDecimal('balance', 16, 8)->default(0);
            $table->timestamp('last_activity_at')->nullable();
            $table->unsignedTinyInteger('superuser')->default(\App\Enums\User\SuperuserEnum::N);
            $table->unsignedTinyInteger('status');
            $table->unsignedBigInteger('ip_id')->nullable();
            $table->unsignedBigInteger('user_agent_id')->nullable();
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
        Schema::dropIfExists('users');
    }
};
