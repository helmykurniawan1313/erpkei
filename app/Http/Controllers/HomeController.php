<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Post;
use App\Models\Profile;
use App\Models\About;
use App\Models\MainImage;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\Project;
use App\Models\Cat;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        if (request('author')) {
            User::firstWhere('username', request('author'));
        }
        return view('home', [
            'profile' => Profile::get(),
            'services' => Service::get(),
            'about' => About::get(),
            'products' => Product::get(),
            'mainimage' => MainImage::get(),
            'clients' => Client::get(),
            'projects' => Project::get(),
            'post' => Post::latest()->paginate(3)->withQueryString(),
            'categories' => Cat::get(),
            'active' => '/'
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Single Post',
            "active" => 'posts',
            'post' => $post
        ]);
    }
}
