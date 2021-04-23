<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $f = DB::table('users')->insert([
            'name' => "sasuke uchia",
            'email' => "sasuke@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $s = User::factory(User::class)->count(10)->create();

        $users = User::all();

        $posts = BlogPost::factory(BlogPost::class)
            ->count(20)->make()
            ->each(function($post) use ($users) {
                $post->user_id = $users->random()->id;
                $post->save();
            });

        $comments = Comment::factory(Comment::class)
            ->count(50)->make()
            ->each(function($comment) use ($posts) {
                $comment->blog_post_id = $posts->random()->id;
                $comment->save();
            });
    }
}
