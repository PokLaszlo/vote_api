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
        Schema::create('napirendi_pont', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kozgyules_id')->constrained('kozgyules');
            $table->int("sorszam");
            $table->string("megnevezes",200);
            $table->boolean("aktiv");
            $table->boolean("lezart");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('napirendi_pont');
    }
};
