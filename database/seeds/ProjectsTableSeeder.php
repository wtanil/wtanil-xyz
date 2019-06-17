<?php

use Illuminate\Database\Seeder;

use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Project::class, 17)->create();

		factory(Project::class, 13)->state('nothidden')->create();

    }
}
