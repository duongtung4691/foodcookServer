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
        Schema::create('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('idTypes');
            $table->unsignedBigInteger('idUser');
            $table->string('title');
            $table->string("linking");
            $table->string('image_thumb');
            $table->binary('contents');
            $table->date('createAt')->nullable();
            $table->date('updateAt')->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idTypes')->references('id')->on('types')->onDelete('cascade');
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
