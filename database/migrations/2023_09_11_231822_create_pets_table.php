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
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('breeds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('species_id')->unsigned();
        });

        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->default(0);
            $table->string('name')->index();
            $table->string('age')->nullable();
            $table->date('last_visit')->nullable();
            $table->integer('species_id')->unsigned()->nullable();
            $table->integer('breed_id')->unsigned()->nullable();
        });

        Schema::create('veterinaries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('phone')->index();
        });

        Schema::create('pet_veterinary', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id');
            $table->foreignId('veterinary_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('species');
        Schema::dropIfExists('breeds');
        Schema::dropIfExists('pets');
        Schema::dropIfExists('veterinaries');
        Schema::dropIfExists('pet_veterinary');
    }
};
