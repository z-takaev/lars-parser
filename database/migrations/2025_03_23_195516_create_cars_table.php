<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedInteger('position');
            $table->string('lang');
            $table->string('number')->unique();
            $table->string('model');
            $table->dateTime('registered_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
