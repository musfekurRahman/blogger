<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Category\Models\Category;
use App\Modules\Category\Repositories\CategoryRepository;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoriesTableSeeder::class,
            ContentTableSeeder::class,
            ]);
    }
}
