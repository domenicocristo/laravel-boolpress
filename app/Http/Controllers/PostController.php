<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function post() {
        $posts = Post::all();

        return view('pages.posts', compact('posts'));
    }

    public function create() {
        $categories = Category::all();

        $tags = Tag::all();
        
        return view('pages.create', compact('categories', 'tags'));
    }

    public function store(Request $request) {
        $data = $request -> validate([
            'author' => 'required|string|max:60',
            'img' => 'required|string',
            'title' => 'required|string|max:60',
            'date' => 'required|date'
        ]);

        $post = Post::create($data);

        return redirect() -> route('post', $post->id);
    }

    public function delete($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home');
    }
}
