<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_code', 25)->nullable();
            $table->string('room_name', 100)->nullable();
            $table->integer('amount_last_month')->nullable();
            $table->integer('amount_this_month')->nullable();
            $table->integer('amount_people')->nullable();
            $table->integer('room_electricity')->nullable();
            $table->integer('room_water')->nullable();
            $table->integer('room_network')->nullable();
            $table->integer('room_total')->nullable();
            $table->string('image_last_month', 255)->nullable();
            $table->string('image_this_month', 255)->nullable();

            $table->integer('month_id')->unsigned()->nullable();
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
        Schema::dropIfExists('room_prices');
    }
}
