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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->nullable()->constrained('employees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date')->nullable();
            $table->string('type')->nullable();
            $table->decimal('base_amount', 10, 2)->default(00.0)->nullable();
            $table->boolean('has_extra_time')->nullable();
            $table->integer('extra_hours')->nullable();
            $table->boolean('is_half_day')->default(false)->nullable();
            $table->decimal('total_amount', 10, 2)->default(00.0)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
