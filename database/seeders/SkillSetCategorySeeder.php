<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SkillSetCategory;

class SkillSetCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = ['IT and Technology', 'Engineering', 'Accounting', 'Economy', 'Law', 'Agriculture'];
        foreach($cat as $c){
            SkillSetCategory::create([
                'name' => $c
            ]);
        }
    }
}
