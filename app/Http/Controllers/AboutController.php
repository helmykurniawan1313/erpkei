<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\About;
use App\Models\MainImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutController extends Controller
{

    public function index()
    {

        return view('about', [
            'profile' => Profile::get(),
            'about' => About::get(),
            'post' => Post::get(),
            'active' => 'about'
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }


    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
}
