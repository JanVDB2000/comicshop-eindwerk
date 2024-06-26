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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //$table->unsignedInteger('photo_id')->index()
            //$table->foreign('photo_id')->unsigned()->index();
            $table->integer('photo_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
           // $table->integer('category_id')->unsigned()->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('body');
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
        Schema::dropIfExists('posts');
    }
};
