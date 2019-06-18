<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, 5)->create([
            'priority' => 1,
        ]);

        factory(Project::class, 5)->create([
            'priority' => 2
        ]);

        factory(Project::class, 5)->create([
            'priority' => 3
        ]);

    }
}
