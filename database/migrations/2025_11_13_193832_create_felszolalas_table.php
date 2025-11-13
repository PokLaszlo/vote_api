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
        Schema::create('felszolalas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('napirendi_pont_id')->constrained('napirendi_pont');
            $table->foreignId('resztvevo_id')->constrained('resztvevo');
            $table->string("szoveg");
            $table->dateTime("idopont");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('felszolalas');
    }
};
