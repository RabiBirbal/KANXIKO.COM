<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('quantity');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('category');
            $table->string('subcategory');
            $table->string('product_image')->nullable();
            $table->string('budget');
            $table->string('leads_category');
            $table->string('points');
            $table->string('availability');
            $table->text('description');
            $table->text('terms_condition');
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
        Schema::dropIfExists('products');
    }
}
