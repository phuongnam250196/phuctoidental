<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_title', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->longtext('description')->nullable();
            $table->string('author', 255)->nullable();
            $table->string('keyword', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('site_name', 255)->nullable();

            $table->string('type', 255)->nullable();
            $table->integer('p_id')->unsigned()->nullable();
            $table->integer('status')->unsigned()->nullable();
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
        Schema::dropIfExists('seos');
    }
}
