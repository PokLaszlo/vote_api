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
        Schema::create('alberlet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarsashaz_id')->constrained('tarsashaz');
            $table->string('cim');
            $table->string('helyrajzszam');
            $table->integer("tulajdoni_hanyad_szamlalo");
            $table->integer("tulajdoni_hanyad_nevezo");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alberlet');
    }
};
