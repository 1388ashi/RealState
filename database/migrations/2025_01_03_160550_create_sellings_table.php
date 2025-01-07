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
        Schema::create('sellings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('types')->cascadeOnDelete();
            $table->foreignId('location_id')->constrained('locations')->cascadeOnDelete();
            $table->string('area');
            $table->string('document');
            $table->string('floor');
            $table->string('infrastructure');
            $table->string('customer');
            $table->string('customer_mobile');
            $table->string('amount');
            $table->string('year_making');
            $table->integer('num_rooms');
            $table->boolean('warehouse');
            $table->boolean('parking');
            $table->boolean('status');
            $table->text('address');
            $table->text('description')->nullable();
            $table->enum('location_text',['north','south','east','west']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellings');
    }
};
