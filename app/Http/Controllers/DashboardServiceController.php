<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class DashboardServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.services.index', [
            'services' => Service::get(),
            'page_title' => 'Dashboard | Service',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create', [
            'page_title' => 'Create | Service',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'body' => 'required',
            'body2' => ''
        ]);

        if ($request->file('image1')) {
            $validateData['image1'] = $request->file('image1')->store('service-images');
        }
        if ($request->file('image2')) {
            $validateData['image2'] = $request->file('image2')->store('service-images');
        }
        if ($request->file('image3')) {
            $validateData['image3'] = $request->file('image3')->store('service-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        // $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Service::create($validateData);

        return redirect('/dashboard/services')->with('success', 'New product has been added!');
    }


    public function show(Service $service)
    {
        return view('dashboard.services.show', [
            'service' => $service
        ]);
    }


    public function edit(Service $service)
    {
        return view('dashboard.services.edit', [
            'service' => $service,
            'page_title' => 'Edit | Service',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }


    public function update(Request $request, Service $service)
    {
        $rules = [
            'name' => 'required|max:255',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'body' => 'required',
            'body2' => ''
        ];


        $validateData = $request->validate($rules);

        if ($request->file('image1')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image1'] = $request->file('image1')->store('service-images');
        }

        if ($request->file('image2')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image2'] = $request->file('image2')->store('service-images');
        }

        if ($request->file('image3')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image3'] = $request->file('image3')->store('service-images');
        }
        //$validateData['user_id'] = auth()->user()->id;


        Service::where('id', $service->id)->update($validateData);

        return redirect('/dashboard/services')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        dd($service);
        if ($service->image) {
            Storage::delete($service->image);
        }

        Service::destroy($service->id);
        return redirect('/dashboard/services')->with('success', 'Post has been deleted!');
    }

    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
    //     return response()->json(['slug' => $slug]);
    // }
}
