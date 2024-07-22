<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $categories = [
            "Smartphone e Cellulari",
            "Tecnologia da Indossare",
            "Accessori per Smartphone",
            "PC Desktop e Monitor",
            "PC Portatili e Notebook",
            "Ebook e Tablet"
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
