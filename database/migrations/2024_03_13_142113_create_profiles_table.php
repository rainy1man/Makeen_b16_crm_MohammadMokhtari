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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->integer('national_number');
            $table->enum('gender', ['مرد', 'زن']);
            $table->date('birth_date');
            $table->foreignId('province_id')->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->foreignId('city_id')->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->text('address');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
