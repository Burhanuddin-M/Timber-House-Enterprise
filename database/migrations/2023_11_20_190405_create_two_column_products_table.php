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
        Schema::create('two_column_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('column_2_id');

            $table->string('desc');
            $table->string('price');

            $table->string('cost_price');
            
            $table->foreign('column_2_id')->references('id')->on('two_column_items')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('two_column_products');
    }
};
