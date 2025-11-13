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
        Schema::create('resztvevo', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tulajdonos_id")->constrained("tulajdonos");
            $table->foreignId("kozgyules_id")->constrained("kozgyules");
            $table->boolean("meghatalmazott");
            $table->foreignId("meghatalmazott_tulajdonos_id")->constrained("tulajdonos");
            $table->dateTime("erkezes_idopont");
            $table->dateTime("kilepes_idopont");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resztvevo');
    }
};
