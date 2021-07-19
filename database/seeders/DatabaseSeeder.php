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
        ### If DB is not refreshed at the start, following applies
        User::truncate();
        Category::truncate();
        Post::truncate();
        ### END

        ### To define a user and keep multiple posts to one user
        $user = User::factory()->create([
            'name' => 'Joe Doe'
            ]);

        Post::factory(5)->create([
            'user_id' => $user
        ]);
        ### END

        ### Multiple posts to one category
        $category = Category::factory()->create([
            'name' => 'Lorem'
            ]);

        Post::factory(5)->create([
            'category_id' => $category
        ]);
        ### END

        ### Random posts
        Post::factory(5)->create();
        ### END
    }
}
