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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('customerId')->nullable();


            $table->unsignedBigInteger('productId');
            $table->integer('quantity');
            $table->decimal('unitPrice', 8, 2);
            $table->decimal('total', 8,2);
            $table->dateTime('date');


            $table->timestamps();


            $table->foreign('customerId')->on('customers')->references('id')->cascadeOnDelete();
            $table->foreign('productId')->on('products')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
