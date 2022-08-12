<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        User::truncate();
        Category::truncate();
        Post::truncate();
        $user = User::factory(1)->create()[0];
        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        $hobby = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);
        Post::create(['slug' => 'my-family-post','title' => 'My Family post', 'excerpt' => 'Excerpt For My Post', 'body' => 'Personal Personal Personal', 'category_id' => $personal->id, 'user_id' => $user->id]);
        Post::create(['slug' => 'my-work-post','title' => 'My Work post', 'excerpt' => 'Excerpt For My Work Post', 'body' => 'Work Work Work', 'category_id' => $work->id, 'user_id' => $user->id]);
        Post::create(['slug' => 'my-hobbies-post','title' => 'My Hobbies post', 'excerpt' => 'Excerpt For My hobbies Post', 'body' => 'hobbies hobbies hobbies', 'category_id' => $hobby->id, 'user_id' => $user->id]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
