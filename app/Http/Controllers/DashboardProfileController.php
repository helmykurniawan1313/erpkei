<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class DashboardProfileController extends Controller
{
    protected $division_name;
    protected $division;
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->division_name = auth()->user()->division->division_name;
            $this->division = auth()->user()->division_id;
            $this->user = auth()->user()->name;

            // Share variables with all views
            View::share('division_name', $this->division_name);
            View::share('division', $this->division);
            View::share('user', $this->user);

            return $next($request);
        });
    }

    public function index()
    {
        //get data from profile
        $profile = Profile::get();

        //send data to view
        return view('dashboard.profiles.index', [
            'profile' => $profile,
            'page_title' => 'Dashboard | Profile',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    public function edit($id)
    {
        $profile = Profile::where('id', $id)->get();

        return view('dashboard.profiles.edit', [
            'profile' => $profile,
            'page_title' => 'Edit | Profile',
            'profile' => Profile::get(),
        ]);
    }

    public function update(Request $request, Profile $profile)
    {

        $rules = [
            'company_name' => 'required|max:255',
            'company_logo' => 'image|file|max:1024',
            'address' => 'max:255',
            'email_1' => 'max:255',
            'email_2' => 'max:255',
            'telp' => 'max:255',
            'whatsapp' => 'max:255',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('company_logo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['company_logo'] = $request->file('company_logo')->store('profile-image');
        }

        Profile::where('id', $profile->id)->update($validateData);

        return redirect('/dashboard/profile')->with('success', 'Profile has been updated!');
    }

    public function store(Request $request)
    {

        $rules = [
            'company_name' => 'required|max:255',
            'company_logo' => 'image|file|max:1024',
            'address' => 'max:255',
            'email_1' => 'max:255',
            'email_2' => 'max:255',
            'telp' => 'max:255',
            'whatsapp' => 'max:255',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('company_logo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['company_logo'] = $request->file('company_logo')->store('profile-image');
        }

        About::create($validateData);

        return redirect('/dashboard/profile')->with('success', 'Profile has been created!');
    }
}
