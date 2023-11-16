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
            $table->string('product_name')->unique();
            $table->string('unit');
            $table->string('exchangeable')->nullable();
            $table->string('refundable')->nullable();
            $table->string('size_1')->nullable();
            $table->string('size_2')->nullable();
            $table->string('size_3')->nullable();
            $table->string('size_4')->nullable();
            $table->string('size_5')->nullable();
            $table->text('short_desc')->nullable();
            $table->text('more_details')->nullable();
            $table->string('bulletin_1')->nullable();
            $table->string('bulletin_2')->nullable();
            $table->string('bulletin_3')->nullable();
            $table->string('bulletin_4')->nullable();
            $table->string('bulletin_5')->nullable();
            $table->string('image_1', 2048);
            $table->string('image_2', 2048)->nullable();
            $table->string('image_3', 2048)->nullable();
            $table->string('image_4', 2048)->nullable();
            $table->string('image_5', 2048)->nullable();
            $table->string('price');
            $table->string('disc_rate');
            $table->string('status');
            $table->timestamps();
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