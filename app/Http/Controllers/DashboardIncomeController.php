<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

class DashboardIncomeController extends Controller
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
    public function index(Request $request)
    {
        $query = Cashflow::where('transaction_category_id', 1);

        if ($request->has('month') && !empty($request->month)) {
            $query->whereMonth('cashflow_date', $request->month);
        }

        return view('dashboard.income.index', [
            'cashflows' => $query->get(),
            'page_title' => 'Pemasukan',
            'profile' => Profile::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.income.create', [
            'cashflow_categories' => CashflowCategory::where('transaction_category_id', 1)->get(),
            'transaction_categories' => TransactionCategory::all(),
            'companys' => Company::all(),
            'performers' => User::all(),
            'page_title' => 'Tambah Pemasukan',
            'profile' => Profile::all(),
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
        $request['cashflow_date'] = Carbon::createFromFormat('m/d/Y', $request->cashflow_date)->format('Y-m-d');
        $request['nominal'] = str_replace(',00', '',  $request['nominal']);
        $request['nominal'] = str_replace('.', '',  $request['nominal']);
        $request['nominal'] = str_replace('Rp ', '',  $request['nominal']);

        $validateData = $request->validate([
            'cashflow_date' => 'required',
            'cashflow_name' => 'required|max:255',
            'performer_id' => 'max:255',
            'company_id' => 'max:255',
            'cashflow_category_id' => 'max:255',
            'transaction_category_id' => 'max:255',
            'user_id' => 'max:255',
            'so_number' => 'max:255',
            'po_number' => 'max:255',
            'tb_number' => 'max:255',
            'nominal' => 'required|max:255'
        ]);

        $validateData['user_id'] = auth()->user()->id;
        Cashflow::create($validateData);

        return redirect('/dashboard/incomes')->with('success', 'Data Pemasukan Baru Telah Ditambahkan');
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
    public function edit(Cashflow $income)
    {
        return view('dashboard.income.edit', [
            'cashflow' => $income,
            'cashflow_categories' => CashflowCategory::where('transaction_category_id', 1)->get(),
            'page_title' => 'Ubah Pemasukan',
            'profile' => Profile::get(),
            'companys' => Company::all(),
            'performers' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cashflow $income)
    {
        if ($request->cashflow_date != $income->cashflow_date) {
            $request['cashflow_date'] = Carbon::createFromFormat('m/d/Y', $request->cashflow_date)->format('Y-m-d');
        }

        $request['nominal'] = str_replace(',00', '',  $request['nominal']);
        $request['nominal'] = str_replace('.', '',  $request['nominal']);
        $request['nominal'] = str_replace('Rp ', '',  $request['nominal']);

        $rules = [
            'cashflow_date' => 'required',
            'cashflow_name' => 'required|max:255',
            'performer_id' => 'max:255',
            'company_id' => 'max:255',
            'cashflow_category_id' => 'max:255',
            'transaction_category_id' => 'max:255',
            'user_id' => 'max:255',
            'so_number' => 'max:255',
            'po_number' => 'max:255',
            'tb_number' => 'max:255',
            'nominal' => 'required|max:255'
        ];

        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;

        Cashflow::where('id', $income->id)->update($validateData);

        return redirect('/dashboard/incomes')->with('success', 'Data Pemasukan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashflow $income)
    {
        Cashflow::destroy($income->id);
        return redirect('/dashboard/incomes')->with('danger', 'Data Pemasukan Telah Dihapus');
    }
}
