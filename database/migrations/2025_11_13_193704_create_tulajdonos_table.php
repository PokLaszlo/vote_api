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
        Schema::create('tulajdonos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alberlet_id')->constrained('alberlet');
            $table->string('nev');
            $table->string('email');
            $table->string('jelszo');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tulajdonos');
    }
};
