<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => '風景']);

        Category::create(['name' => '動物']);

        Category::create(['name' => '水中']);

        Category::create(['name' => '夜景']);

        Category::create(['name' => '旅行']);

        Category::create(['name' => '人物']);

        Category::create(['name' => 'ストリートスナップ']);

        Category::create(['name' => 'ファッション']);

        Category::create(['name' => 'テクノロジー']);

        Category::create(['name' => '建築']);
    }
}
