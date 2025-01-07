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
        Schema::create('mortgage_rents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('types')->cascadeOnDelete();
            $table->foreignId('location_id')->constrained('locations')->cascadeOnDelete();
            $table->string('area');
            $table->string('floor');
            $table->string('customer');
            $table->string('customer_mobile');
            $table->string('mortgage_amount');
            $table->string('rent_amount');
            $table->text('address');
            $table->text('description')->nullable();
            $table->integer('num_rooms');
            $table->integer('tenant');
            $table->enum('location_text',['north','south','east','west']);
            $table->enum('door',['independent','common']);
            $table->boolean('warehouse');
            $table->boolean('parking');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgage_rents');
    }
};
