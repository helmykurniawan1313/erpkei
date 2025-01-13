<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        //get data from profile
        $profile = Profile::get();

        //send data to view

        return view('dashboard.layouts.headers', [
            'profile' => Profile::get()
        ]);
    }
}
