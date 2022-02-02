<?php

namespace Database\Seeders;
use App\Models\ArticleCategory;
use App\Models\Article;
use App\Models\ArticleImage;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ArticleCategorySeeder::class,
            ArticleSeeder::class
        ]);
    }
}
