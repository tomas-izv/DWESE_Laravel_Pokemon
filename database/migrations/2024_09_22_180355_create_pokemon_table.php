<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreatepokemonTable extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('pokemon')) {
            Schema::create('pokemon', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100)->unique();
                $table->decimal('lvl', 9, 2);
                $table->string('type', 100);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
