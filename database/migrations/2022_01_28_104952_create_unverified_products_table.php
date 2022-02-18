<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnverifiedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unverified_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('quantity');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('product_image')->nullable();
            $table->string('budget');
            $table->text('description');
            $table->text('terms_condition');
            $table->string('buyer_name');
            $table->string('buyer_email');
            $table->string('buyer_contact');
            $table->string('buyer_district');
            $table->string('buyer_address');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_code')->nullable();
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
        Schema::dropIfExists('unverified_products');
    }
}
