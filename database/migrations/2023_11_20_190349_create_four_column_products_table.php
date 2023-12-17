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
        Schema::create('four_column_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('column_4_id');

            $table->string('desc');
            $table->string('one_price');
            $table->string('one_price_cost');
            $table->string('two_price');
            $table->string('two_price_cost');
            $table->string('three_price');
            $table->string('three_price_cost');
            
            $table->foreign('column_4_id')->references('id')->on('four_column_items')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('four_column_products');
    }
};
