<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 3; $i++) {
           $faker = Faker\Factory::create();

           Project::create([
             'project_name'  => $faker->word
           ]);
        }
    }
}
