<?php

namespace Database\Seeders;

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

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan semper ex, a rhoncus quam faucibus a. Ut porttitor tristique neque, sed maximus libero feugiat maximus. Cras euismod auctor nisl eget ultrices. Mauris euismod sed dui id lacinia. Ut non vestibulum nunc. Sed in eros sed ligula eleifend pellentesque ac vitae neque. Suspendisse euismod metus ac elit consequat vehicula. Morbi suscipit pharetra turpis et blandit. Aenean faucibus in lorem at facilisis. Pellentesque suscipit eros quis velit dapibus efficitur. Nulla facilisi. Sed malesuada eget augue ut venenatis.</p> '
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan semper ex, a rhoncus quam faucibus a. Ut porttitor tristique neque, sed maximus libero feugiat maximus. Cras euismod auctor nisl eget ultrices. Mauris euismod sed dui id lacinia. Ut non vestibulum nunc. Sed in eros sed ligula eleifend pellentesque ac vitae neque. Suspendisse euismod metus ac elit consequat vehicula. Morbi suscipit pharetra turpis et blandit. Aenean faucibus in lorem at facilisis. Pellentesque suscipit eros quis velit dapibus efficitur. Nulla facilisi. Sed malesuada eget augue ut venenatis.</p> '
        ]);
    }
}
