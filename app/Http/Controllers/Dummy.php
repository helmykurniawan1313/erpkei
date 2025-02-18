<?php

namespace App\Http\Controllers;

use App\Models\Department;
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
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\View;

class Dummy extends Controller
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

        return view('dashboard.dummys.index', [
            'departments' => Department::get(),
            'page_title' => 'Departemen',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $companies = Company::all();
        return view('dashboard.dummys.create', compact('companies'));
    }
    public function store(Request $request)
    {
        $companyName = $request->input('company_name');

        if ($companyName) {
            $company = Company::firstOrCreate(['company_name' => $companyName]);
            // Do something with the company...
            return redirect('/dummys/create')->with('success', 'Company saved!');
        } else {
            return redirect('/dummys/create')->with('error', 'Please select or enter a company.');
        }
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
    public function edit(Department $department)
    {

        return view('dashboard.departments.edit', [
            'department' => $department,
            'page_title' => 'Ubah Departemen',

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {

        $rules = [
            'department_category_name' => 'required',
            'department_category_information' => 'max:255',

        ];

        $validateData = $request->validate($rules);


        Department::where('id', $department->id)->update($validateData);

        return redirect('/dashboard/departments')->with('success', 'Data Departemen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        Department::destroy($department->id);
        return redirect('/dashboard/departments')->with('danger', 'Departemen Telah Dihapus');
    }
}
