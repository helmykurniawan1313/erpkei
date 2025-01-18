<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use App\Models\Cashflow;
use App\Models\CashflowCategory;
use App\Models\TransactionCategory;
use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\View;

class DivisionController extends Controller
{
    protected $division_name;
    protected $division;
    protected $user;
    protected $profile;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->division_name = auth()->user()->division->division_name;
            $this->division = auth()->user()->division_id;
            $this->user = auth()->user()->name;
            $this->profile = Profile::get();

            // Share variables with all views
            View::share('division_name', $this->division_name);
            View::share('division', $this->division);
            View::share('user', $this->user);
            View::share('profile', $this->profile);

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

        return view('dashboard.divisions.index', [
            'divisiondatas' => Division::get(),

            'page_title' => 'Divisi',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.divisions.create', [

            'departments' => Department::get(),
            'page_title' => 'Tambah Divisi',

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
            'division_name' => 'required',
            'department_id' => 'max:255',
            'division_information' => 'max:255',

        ]);

        $validateData['user_id'] = auth()->user()->id;
        Division::create($validateData);

        return redirect('/dashboard/divisions')->with('success', 'Data Divisi Baru Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Cashflow $cashflow)
    {
        return view('dashboard.posts.show', [
            'caashflow' => $cashflow
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {

        return view('dashboard.divisions.edit', [
            'divisiondata' => $division,
            'departments' => Department::get(),
            'page_title' => 'Ubah Divisi',

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {

        $rules = [
            'division_category_name' => 'required',
            'division_category_information' => 'max:255',

        ];

        $validateData = $request->validate($rules);


        Division::where('id', $division->id)->update($validateData);

        return redirect('/dashboard/divisions')->with('success', 'Data Divisi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        Division::destroy($division->id);
        return redirect('/dashboard/divisions')->with('danger', 'Divisi Telah Dihapus');
    }
}
