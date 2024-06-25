<?php

namespace Database\Seeders;



use App\Modules\Content\Models\Contents;
use Illuminate\Database\Seeder;


class ContentTableSeeder extends Seeder
{

    public function run(): void
    {
        Contents::factory()->count(50)->create();
    }
}
