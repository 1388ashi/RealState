<?php

use App\Models\Facilitie;
use App\Models\Selling;
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
        Schema::create('facilitie_selling', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Selling::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Facilitie::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilitie_selling');
    }
};
