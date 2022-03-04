<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryImageProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_product', function (Blueprint $table) {
            $table->unsignedInteger('gallery_id');
            $table->unsignedInteger('product_id');
            $table->unique(['gallery_id','product_id']);
            $table->foreign('gallery_id')->references('id')->on('gallery')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_product');
    }
}
