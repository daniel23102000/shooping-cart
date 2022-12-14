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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('buyer_user');
            $table->integer('product_owner');
            $table->string('product_ownerusername');
            $table->string('name_product');
            $table->integer('product_price');
            $table->string('image');
            $table->integer('qty');
            $table->integer('total_price');
            $table->string('product_code');
            $table->integer('id_product');
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
        Schema::dropIfExists('carts');
    }
};
