<?php

use Illuminate\Database\Seeder;
use App\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Article::factory(1000)->create();
        $this->call(ArticleSeeder::class);
    }
}
