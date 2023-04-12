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
            $table->string('order_number');
            $table->decimal('total', 8,2)->default(0);
            $table->dateTime('date')->useCurrent();
            $table->integer('status');
            $table->timestamps();

            $table->foreign('customerId')->on('customers')->references('id')->cascadeOnDelete();

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
