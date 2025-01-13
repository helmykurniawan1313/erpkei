<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Profile;

class DashboardCatController extends Controller
{
    public function index()
    {
        return view('dashboard.cats.index', [
            'cats' => Cat::all(),
            'page_title' => 'Dashboard | Category',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    public function create()
    {
        return view('dashboard.cats.create', [
            'page_title' => 'Create | Category',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',

        ]);
        $validateData['user_id'] = auth()->user()->id;
        // $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Cat::create($validateData);

        return redirect('/dashboard/cats')->with('success', 'New product has been added!');
    }

    public function edit(Cat $cat)
    {
        return view('dashboard.cats.edit', [
            'cat' => $cat,
            'page_title' => 'Edit | Category',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    public function update(Request $request, Cat $cat)
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ];


        $validateData = $request->validate($rules);


        //$validateData['user_id'] = auth()->user()->id;


        Cat::where('id', $cat->id)->update($validateData);

        return redirect('/dashboard/cats')->with('success', 'Post has been updated!');
    }

    public function destroy(Cat $cat)
    {
        Cat::destroy($cat->id);
        return redirect('/dashboard/cats')->with('success', 'Post has been deleted!');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Cat::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
