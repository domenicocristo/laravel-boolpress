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
            'date' => 'required|date',
            'category_id' => 'required|string'
        ]);

        $post = Post::make($data);
        $category = Category::findOrFail($request -> get('category_id'));
        $post -> category() -> associate($category);
        $post -> save();

        $tags = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> attach($tags);
        $post -> save();

        return redirect()->route('post', $post->id);
    }

    public function edit($id) {
        $post = Post::findOrFail($id);

        $categories = Category::all();

        $tags = Tag::all();
        
        return view('pages.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, $id) {
        $data = $request -> validate([
            'author' => 'required|string|max:60',
            'img' => 'required|string',
            'title' => 'required|string|max:60',
            'date' => 'required|date',
            'category_id' => 'required|string'
        ]);

        $post = Post::findOrFail($id);
        $post->update($data);

        $category = Category::findOrFail($request -> get('category_id'));
        $post -> category() -> associate($category);
        $post -> save();

        $tags = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> sync($tags);
        $post -> save();

        return redirect()->route('post', $post->id);
    }

    public function delete($id) {
        $post = Post::findOrFail($id);
        $post -> tags() -> sync([]);
        $post -> save();

        $post->delete();

        return redirect()->route('home');
    }
}
