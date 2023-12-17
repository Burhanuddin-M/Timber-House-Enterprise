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
        Schema::create('platerecords', function (Blueprint $table) {
            $table->id(); // This creates an 'id' column as an auto-incrementing primary key

            //Numberplate
            $table->string('numberplate');

            //RCBOOK
            $table->string('rcbook_first')->nullable();          
            $table->string('rcbook_second')->nullable();
            $table->string('rcbook_third')->nullable();
            $table->string('rcbook_fourth')->nullable();
            $table->string('rcbook_fifth')->nullable();

            //INSURANCE
            $table->string('insurance_first')->nullable();          
            $table->string('insurance_second')->nullable();
            $table->string('insurance_third')->nullable();
            $table->string('insurance_fourth')->nullable();
            $table->string('insurance_fifth')->nullable();

            //PUC
            $table->string('puc_first')->nullable();          
            $table->string('puc_second')->nullable();
            $table->string('puc_third')->nullable();
            $table->string('puc_fourth')->nullable();
            $table->string('puc_fifth')->nullable();

            //NATIONAL PERMIT
            $table->string('national_first')->nullable();          
            $table->string('national_second')->nullable();
            $table->string('national_third')->nullable();
            $table->string('national_fourth')->nullable();
            $table->string('national_fifth')->nullable();

            //FITNESS
            $table->string('fitness_first')->nullable();          
            $table->string('fitness_second')->nullable();
            $table->string('fitness_third')->nullable();
            $table->string('fitness_fourth')->nullable();
            $table->string('fitness_fifth')->nullable();

            //ROADTAX
            $table->string('roadtax_first')->nullable();          
            $table->string('roadtax_second')->nullable();
            $table->string('roadtax_third')->nullable();
            $table->string('roadtax_fourth')->nullable();
            $table->string('roadtax_fifth')->nullable();

            //LICENSE
            $table->string('license_first')->nullable();          
            $table->string('license_second')->nullable();
            $table->string('license_third')->nullable();
            $table->string('license_fourth')->nullable();
            $table->string('license_fifth')->nullable();
   

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platerecords');
    }
};
