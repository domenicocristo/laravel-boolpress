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
}