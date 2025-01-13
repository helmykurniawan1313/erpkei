<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index', [
            'products' => Product::get(),
            'page_title' => 'Dashboard | Product',
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
        return view('dashboard.products.create', [
            'page_title' => 'Create | Product',
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
            'link' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('product-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        // $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Product::create($validateData);

        return redirect('/dashboard/products')->with('success', 'New product has been added!');
    }


    // public function show(Product $product)
    // {
    //     return view('dashboard.products.show', [
    //         'product' => $product
    //     ]);
    // }


    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product,
            'page_title' => 'Edit | Product',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|max:255',
            'link' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];


        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image'] = $request->file('image')->store('product-images');
        }

        //$validateData['user_id'] = auth()->user()->id;


        Product::where('id', $product->id)->update($validateData);

        return redirect('/dashboard/products')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }

        Product::destroy($product->id);
        return redirect('/dashboard/products')->with('success', 'Post has been deleted!');
    }

    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
    //     return response()->json(['slug' => $slug]);
    // }
}
