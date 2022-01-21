<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ProjectWithTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = factory(App\Project::class, 10)->create([
            'hidden' => false
        ]);

        $tags = factory(App\Tag::class, 10)->create();
        $tagIds = $tags->pluck('id')->toArray();

        $projects->each(function ($project) use ($tagIds) {
            $project->tags()->sync
            (
                Arr::random($tagIds, mt_rand(1, count($tagIds)))
            );
        });
    }
}
