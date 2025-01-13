<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\About;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardAboutController extends Controller
{
    public function index()
    {
        //get data from profile
        $about = About::get();
        $username = auth()->user()->username;

        //send data to view
        return view(
            'dashboard.abouts.index',
            [
                'about' => $about,
                'page_title' => 'Dashboard | About Us',
                'profile' => Profile::get(),
                'user' => $username



            ]
        );
    }

    public function edit($id)
    {
        $about = About::where('id', $id)->get();
        $username = auth()->user()->username;

        return view('dashboard.abouts.edit', [
            'about' => $about,
            'page_title' => 'Edit | About Us',
            'profile' => Profile::get(),
            'user' => $username
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {

        $rules = [
            'main_header' => 'required|max:255',
            'main_body' => 'required',
            'background' => 'image|file|max:1024',
            'ourstory' => 'required',
            'image1' => 'image|file|max:1024',
            'client' => 'max:255',
            'project' => 'max:255',
            'support' => 'max:255',
            'employee' => 'max:255',
            'about' => 'required',
            'image2' => 'image|file|max:1024'

        ];



        $validateData = $request->validate($rules);

        if ($request->file('background')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['background'] = $request->file('background')->store('about-image');
        }

        if ($request->file('image1')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image1'] = $request->file('image1')->store('about-image');
        }

        if ($request->file('image2')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image2'] = $request->file('image2')->store('about-image');
        }

        //$validateData['user_id'] = auth()->user()->id;


        About::where('id', $about->id)->update($validateData);


        return redirect('/dashboard/about')->with('success', 'About Us Pagde has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $rules = [
            'main_header' => 'required|max:255',
            'main_body' => 'required',
            'background' => 'image|file|max:1024',
            'ourstory' => 'required',
            'image1' => 'image|file|max:1024',
            'client' => 'max:255',
            'project' => 'max:255',
            'support' => 'max:255',
            'employee' => 'max:255',
            'about' => 'required',
            'image2' => 'image|file|max:1024'

        ];



        $validateData = $request->validate($rules);

        if ($request->file('background')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['background'] = $request->file('background')->store('about-image');
        }

        //$validateData['user_id'] = auth()->user()->id;


        About::create($validateData);

        return redirect('/dashboard/abouts')->with('success', 'Post has been updated!');
    }
}
