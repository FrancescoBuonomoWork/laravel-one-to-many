<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all();
        $ids = $types->pluck("id");

        for($i = 0; $i < 10; $i++){
            $new_project = new Project();
            $new_project->name = $faker->name();
            $new_project->type_id = $faker->optional()->randomElement($ids);
            $new_project->save();
        }
    }
}
