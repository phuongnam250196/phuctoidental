<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('video_name', 255)->nullable();
            $table->string('video_slug', 255)->nullable();
            $table->string('video_img', 255)->nullable();
            $table->string('video_url', 255)->nullable();
            $table->longtext('video_content')->nullable();
            $table->integer('video_status')->nullable();

            $table->integer('cate_id')->unsigned()->nullable();

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
        Schema::dropIfExists('videos');
    }
}
