<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('modello');
            $table->decimal('price', 8, 2);
            $table->text('body');
            // relazione con Category
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            // relazione con User
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Rimuovere le chiavi esterne se esistono
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('articles');
    }

};
