<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)
                ->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        ### To protect for single user (admin) only
//        if (auth()->user()?->username !== 'lemoncube1') {
//            abort(403);
//        }
        ### question mark above makes it optional and saves following lines
//        if (auth()->guest()) {
//            abort(403);
//        }
        ### proper way is to send it through middleware
        ### END

        return view('posts.create', [

        ]);
    }
}
