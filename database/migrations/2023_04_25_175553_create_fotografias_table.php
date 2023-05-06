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
        Schema::create('fotografias', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('foto_c')->nullable();
            $table->integer('autor_id')->nullable();
            $table->float('precio')->nullable();
            $table->string('tipo')->nullable();
            $table->unsignedBigInteger('evento_id'); 
            $table->foreign('evento_id')->on('eventos')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotografias');
    }
};
