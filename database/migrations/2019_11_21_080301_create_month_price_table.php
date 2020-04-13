<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('month_name', 255)->nullable();
            $table->integer('electricity')->nullable();
            $table->integer('water')->nullable();
            $table->integer('network')->nullable();
            $table->string('image_dien', 255)->nullable();
            $table->string('image_nuoc', 255)->nullable();
            $table->string('image_mang', 255)->nullable();
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
        Schema::dropIfExists('month_prices');
    }
}
