<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class HomeController extends Controller
{
    public function home() {
        $posts = Post::all();

        return view('pages.home', compact('posts'));
    }

    public function post($id) {
        $post = Post::findOrFail($id);

        return view('pages.post', compact('post'));
    }

    public function create() {
        return view('pages.create');
    }

    public function store(Request $request) {
        $data = $request -> validate([
            'author' => 'required|string|max:255',
            'img' => 'required|string',
            'title' => 'required|string|max:255',
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