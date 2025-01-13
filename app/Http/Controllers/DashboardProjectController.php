<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Cat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardProjectController extends Controller
{
    public function index()
    {
        return view('dashboard.projects.index', [
            'projects' => Project::where('user_id', auth()->user()->id)->get(),
            'page_title' => 'Dashboard | Project',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    public function create()
    {
        return view('dashboard.projects.create', [
            'cats' => Cat::all(),
            'page_title' => 'Create | project',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:projects',
            'cat_id' => 'required',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if ($request->file('image1')) {
            $validateData['image1'] = $request->file('image1')->store('project-images');
        }
        if ($request->file('image2')) {
            $validateData['image2'] = $request->file('image2')->store('project-images');
        }
        if ($request->file('image3')) {
            $validateData['image3'] = $request->file('image3')->store('project-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Project::create($validateData);

        return redirect('/dashboard/projects')->with('success', 'New post has been added!');
    }

    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', [
            'project' => $project,
            'cats' => Cat::all(),
            'page_title' => 'Edit | Project',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $rules = [
            'title' => 'required|max:255',
            'cat_id' => 'required',
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if ($project->slug != $request->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image1')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image1'] = $request->file('image1')->store('project-images');
        }
        if ($request->file('image2')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image2'] = $request->file('image2')->store('project-images');
        }
        if ($request->file('image3')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image3'] = $request->file('image3')->store('project-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Project::where('id', $project->id)->update($validateData);

        return redirect('/dashboard/projects')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->image1) {
            Storage::delete($project->image1);
        }

        Project::destroy($project->id);
        return redirect('/dashboard/projects')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Project::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
