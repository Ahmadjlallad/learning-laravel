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
     * @throws \Exception
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();
        $categories = Category::factory(3)->create();
        $users = User::factory(3)->create();
        $iMax = count($users);
        for ($i = 0; $i < ($iMax * $iMax * 3); $i++) {
            Post::factory()->create([
                'user_id' => $users[random_int(0, 2)]->id,
                'category_id' => $categories[random_int(0, 2)]->id
            ]);
        }
//        $personal = Category::create([
//            'name' => 'Personal',
//            'slug' => 'personal'
//        ]);
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//        $hobby = Category::create([
//            'name' => 'Hobbies',
//            'slug' => 'hobbies'
//        ]);
//        Post::create(['slug' => 'my-family-post','title' => 'My Family post', 'excerpt' => 'Excerpt For My Post', 'body' => 'Personal Personal Personal', 'category_id' => $personal->id, 'user_id' => $user->id]);
//        Post::create(['slug' => 'my-work-post','title' => 'My Work post', 'excerpt' => 'Excerpt For My Work Post', 'body' => 'Work Work Work', 'category_id' => $work->id, 'user_id' => $user->id]);
//        Post::create(['slug' => 'my-hobbies-post','title' => 'My Hobbies post', 'excerpt' => 'Excerpt For My hobbies Post', 'body' => 'hobbies hobbies hobbies', 'category_id' => $hobby->id, 'user_id' => $user->id]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
