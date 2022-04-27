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
        Schema::create('type_adres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('addresses_type_adres', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('addresses_id');
            $table->unsignedBigInteger('type_adres_id');
            $table->timestamps();
            $table->unique(['addresses_id', 'type_adres_id']);
            $table->foreign('addresses_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('type_adres_id')->references('id')->on('type_adres')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_adres',);
        Schema::dropIfExists('type_adres',);
    }
};
