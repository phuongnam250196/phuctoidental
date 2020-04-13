<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prod_name', 255)->nullable();
            $table->string('prod_slug', 255)->nullable();
            $table->string('prod_img', 255)->nullable();
            $table->string('prod_gallery', 255)->nullable();
            $table->string('prod_price', 255)->nullable();
            $table->string('prod_price_sale', 255)->nullable();
            $table->string('prod_guarantee', 255)->nullable();
            $table->string('prod_sale', 255)->nullable();
            $table->longtext('prod_short_description')->nullable();
            $table->longtext('prod_content')->nullable();
            $table->string('prod_amount', 255)->nullable();
            $table->string('prod_view', 255)->nullable();
            $table->integer('cate_id')->unsigned()->nullable();
            $table->integer('rate_id')->unsigned()->nullable();
            $table->integer('tag_id')->unsigned()->nullable();
            $table->integer('hot')->unsigned()->nullable();
            $table->integer('installment')->unsigned()->nullable();
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
        Schema::dropIfExists('products');
    }
}
