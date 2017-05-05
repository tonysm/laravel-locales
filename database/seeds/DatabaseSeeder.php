<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = factory(App\Article::class)->times(10)->create();

        foreach ($articles as $article) {
            factory(App\Comment::class)->times(rand(1, 3))->create(['article_id' => $article->id]);
        }
    }
}
