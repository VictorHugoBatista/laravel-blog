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
        factory(\App\Tag::class, 10)->create()->each(function(\App\Tag $tag) {
            $tag->posts()->attach(\App\Post::find(rand(1, 50)));
        });
    }
}
