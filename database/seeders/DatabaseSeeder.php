<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SkillSetSeeder;
use Database\Seeders\SkillSetCategorySeeder;

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
            RoleSeeder::class,
            // SkillSetSeeder::class,
            SkillSetCategorySeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
        \App\Models\SkillSet::factory(30)->create();
    }
}
