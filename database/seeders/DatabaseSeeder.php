<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\ArticleTag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Article::factory(20)->create();
        Comment::factory(35)->create();
        Tag::factory(10)->create();
        ArticleTag::factory(20)->create();
        
    }
}
