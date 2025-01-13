<?php

namespace App\Http\Controllers;

use App\Models\CashflowCategory;
use App\Models\Profile;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class IncomeCategoryController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.incomecategory.index', [
            'categories' => CashflowCategory::where('transaction_category_id', 1)->get(),
            'page_title' => 'Kategori Pemasukan',
            'profile' => Profile::get(),
            'user' => auth()->user()->name

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.incomecategory.create', [
            'page_title' => 'Buat Kategori Pemasukan',
            'profile' => Profile::get(),
            'user' => auth()->user()->name
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
            'transaction_category_id' => 'required|max:255',
            'cashflow_category_name' => 'required|max:255',
            'cashflow_category_information' => 'required|max:255',

        ]);



        $validateData['user_id'] = auth()->user()->id;
        // $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        CashflowCategory::create($validateData);

        return redirect('/dashboard/incomecategory')->with('success', 'Kategori Pemasukan Baru Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(CashflowCategory $incomecategory)
    {

        return view('dashboard.incomecategory.edit', [
            'category' => $incomecategory,
            'page_title' => 'Ubah Kategori Pemasukan',
            'profile' => Profile::get(),
            'user' => auth()->user()->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashflowCategory $incomecategory)
    {

        $rules = [
            'transaction_category_id' => 'max:255',
            'cashflow_category_name' => 'max:255',
            'cashflow_category_information' => 'max:255',
        ];


        $validateData = $request->validate($rules);


        //$validateData['user_id'] = auth()->user()->id;


        CashflowCategory::where('id', $incomecategory->id)->update($validateData);

        return redirect('/dashboard/incomecategory')->with('success', 'Kategori Pemasukan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // public function destroy(CashflowCategory $incomecategory)
    // {

    //     CashflowCategory::destroy($incomecategory->id);
    //     return redirect('/dashboard/incomecategory')->with('success', 'Post has been deleted!');
    // }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
