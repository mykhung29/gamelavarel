<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_caterogy');
            $table->string('product_name');
            $table->string('product_type');
            $table->decimal('product_price', 10, 2);
            $table->string('product_img');
            $table->string('product_video')->nullable();
            $table->text('product_desc');
            $table->tinyInteger('product_status')->default(1);
            $table->integer('quantity_product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
