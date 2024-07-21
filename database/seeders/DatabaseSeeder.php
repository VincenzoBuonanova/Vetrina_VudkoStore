<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        "Smartphone e Cellulari", "Tecnologia da Indossare", "Accessori per Smartphone", "PC Desktop e Monitor", "PC Portatili e Notebook", "Tablet ed Ebook"
    ];

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        foreach ($this->categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
