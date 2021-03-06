<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('wallet_points');
            $table->boolean('status');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_code')->nullable();
            $table->foreignId('refer_id')->nullable()->constrained('sellers');
            $table->string('refer_code');
            $table->timestamp('expiry_date')->nullable();
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
        Schema::dropIfExists('sellers');
    }
}
