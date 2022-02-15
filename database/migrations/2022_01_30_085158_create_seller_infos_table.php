<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('sellers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('district');
            $table->string('Company_name');
            $table->string('company_address');
            $table->string('landline')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('terms_condition');
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
        Schema::dropIfExists('seller_infos');
    }
}
