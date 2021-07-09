<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function find($slug)
    {
        if (file_exists($pathToPost = resource_path("posts/{$slug}.html"))) {

            return cache()->remember("posts.{slug}", 5, fn() => file_get_contents($pathToPost));

        } else {

            throw new ModelNotFoundException();

        }
    }

    public static function all(): array
    {
        $files =  File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }
}
