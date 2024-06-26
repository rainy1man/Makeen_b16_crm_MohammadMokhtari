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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('brand');
            $table->enum('scent', ['خنک', 'گرم', 'ملایم', 'تلخ', 'شیرین', 'ترش']);
            $table->enum('gender', ['آقایان', 'بانوان', 'آقایان/بانوان']);
            $table->bigInteger('price');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
