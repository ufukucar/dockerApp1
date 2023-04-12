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
        Schema::create('ordered_items', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('orderId');
            $table->unsignedBigInteger('productId');

            $table->integer('quantity');
            $table->decimal('unitPrice', 8, 2);
            $table->decimal('total', 8,2);


            $table->timestamps();
            $table->foreign('productId')->on('products')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('orderId')->on('orders')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordered_items');
    }
};
