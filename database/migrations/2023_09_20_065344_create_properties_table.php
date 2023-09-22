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
    Schema::create('properties', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('landlord_id');
        $table->foreign('product_id')->references('id')->on('landlord');
        $table->string('name');
        $table->string('reference_number')->unique(); 
        $table->string('owner');
        $table->timestamps();
    });


    /**
     * Reverse the migrations.
     */
    {
        Schema::dropIfExists('properties');
    }
}

};
