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
            $table->string('name');
            $table->string('cover');
            $table->integer('quantity');
            $table->float('price');
            $table->string('description');
            $table->string('details');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('type_id');
            $table->foreign('size_id')
            ->references('id')
            ->on('sizes')
            ->onDelete('cascade');
            $table->foreign('type_id')
            ->references('id')
            ->on('types')
            ->onDelete('cascade');
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
