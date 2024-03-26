<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('inventory_id'); // Mã số duy nhất cho mỗi bản ghi trong bảng
            $table->unsignedBigInteger('product_id'); // Tham chiếu đến mã số duy nhất của sản phẩm trong bảng sản phẩm (products)
            $table->integer('quantity'); // Số lượng sản phẩm trong kho
            $table->timestamps(); // Các trường thời gian tạo và cập nhật bản ghi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
