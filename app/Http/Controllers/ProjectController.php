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

class ProjectController extends Controller
{
    public function index()
    {

        return view('projects', [
            'profile' => Profile::get(),
            'about' => About::get(),
            'products' => Product::get(),
            'categories' => Cat::get(),
            'projects' => Project::get(),

            'active' => 'projects'
        ]);
    }

    public function show(Project $project)
    {
        return view('project', [
            'title' => 'Project',
            'profile' => Profile::get(),
            "active" => 'posts',
            'project' => $project,
            'projects' => Project::latest()->paginate(5)->withQueryString()
        ]);
    }
}
