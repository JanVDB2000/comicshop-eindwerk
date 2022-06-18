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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('photo_id')->index();
            $table->unsignedBigInteger('brand_id')->index();
            $table->unsignedBigInteger('product_category_id')->index();
            $table->string('name');
            $table->string('published_date');
            $table->string('writer');
            $table->string('penciled');
            $table->string('slug');
            $table->string('item_number');
            $table->text('body');
            $table->decimal('price',10,2);
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
};
