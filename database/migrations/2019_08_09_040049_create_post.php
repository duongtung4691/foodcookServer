<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('idFavorite');
            $table->unsignedBigInteger('idUser')->index();
            $table->string('title')->unique();
            $table->string("linking");
            $table->string('image_thumb');
            $table->binary('description');
            $table->date('createAt');
            $table->date('updateAt');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idFavorite')->references('id')->on('favorite')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
