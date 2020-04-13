<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('star', 255)->nullable();
            $table->longtext('content')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();

            $table->integer('cate_id')->unsigned()->nullable();
            $table->integer('prod_id')->unsigned()->nullable();
            $table->integer('news_id')->unsigned()->nullable();
            $table->integer('videos_id')->unsigned()->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
