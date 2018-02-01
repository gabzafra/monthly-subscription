<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showHome()
    {
        $posts = Post::with('author')->get();
        return view('pages.home', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::whereSlug($slug)->with('author')->first();
        return view('pages.post', compact('post'));
    }
}
