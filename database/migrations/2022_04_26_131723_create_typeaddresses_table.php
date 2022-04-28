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
        Schema::create('typeaddresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('address_typeaddress', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('typeaddress_id');
            $table->unique(['address_id', 'typeaddress_id']);
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('typeaddress_id')->references('id')->on('typeaddresses')->onDelete('cascade');
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
        Schema::dropIfExists('typeaddresses');
        Schema::dropIfExists('address_typeaddress');
    }
};
