<?php

namespace Database\Seeders;

use App\Modules\Category\Repositories\CategoryRepository;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryRepository::create([
            'name' => 'Technology',
        ]);
        CategoryRepository::create([
            'name' => 'Travel',
        ]);
        CategoryRepository::create([
            'name' => 'Food',
        ]);
        CategoryRepository::create([
            'name' => 'Health',
        ]);
        CategoryRepository::create([
            'name' => 'Marketing',
        ]);
        CategoryRepository::create([
            'name' => 'Sales',
        ]);
        CategoryRepository::create([
            'name' => 'Lifestyle',
        ]);
        CategoryRepository::create([
            'name' => 'Business',
        ]);
        CategoryRepository::create([
            'name' => 'Education',
        ]);
        CategoryRepository::create([
            'name' => 'Entertainment',
        ]);
        CategoryRepository::create([
            'name' => 'Sports',
        ]);
        CategoryRepository::create([
            'name' => 'Science',
        ]);
        CategoryRepository::create([
            'name' => 'Politics',
        ]);


    }
}
