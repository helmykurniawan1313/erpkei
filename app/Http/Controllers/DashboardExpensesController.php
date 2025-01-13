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
use PDF;
use Illuminate\Support\Facades\View;

class DashboardExpensesController extends Controller
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
        return view('dashboard.expanses.index', [
            'cashflows' => Cashflow::where('transaction_category_id', 2)->get(),
            'page_title' => 'Pengeluaran',
            'profile' => Profile::get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.expanses.create', [
            'cashflow_categories' => CashflowCategory::where('transaction_category_id', 2)->get(),
            'transaction_categories' => TransactionCategory::all(),
            'companys' => Company::all(),
            'performers' => User::all(),
            'page_title' => 'Tambah Pengeluaran',
            'profile' => Profile::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request['cashflow_date'] = Carbon::createFromFormat('m/d/Y', $request->cashflow_date)->format('Y-m-d');
        $request['nominal'] = str_replace(',00', '',  $request['nominal']);
        $request['nominal'] = str_replace('.', '',  $request['nominal']);
        $request['nominal'] = str_replace('Rp ', '',  $request['nominal']);

        $validateData = $request->validate([
            'cashflow_date' => 'required',
            'cashflow_name' => 'required|max:255',
            'performer_id' => 'required|max:255',
            'company_id' => 'required|max:255',
            'cashflow_category_id' => 'required|max:255',
            'transaction_category_id' => 'required|max:255',
            'user_id' => 'max:255',
            'so_number' => 'max:255',
            'po_number' => 'max:255',
            'tb_number' => 'max:255',
            'nominal' => 'required|max:255'
        ]);

        $validateData['user_id'] = auth()->user()->id;
        Cashflow::create($validateData);

        return redirect('/dashboard/expanses')->with('success', 'Data Pengeluaran Baru Telah Ditambahkan');
    }

    public function show(Cashflow $cashflow)
    {
        return view('dashboard.posts.show', [
            'caashflow' => $cashflow
        ]);
    }

    public function edit(Cashflow $expanse)
    {
        return view('dashboard.expanses.edit', [
            'cashflow' => $expanse,
            'cashflow_categories' => CashflowCategory::where('transaction_category_id', 2)->get(),
            'page_title' => 'Ubah Pengeluaran',
            'profile' => Profile::get(),
            'companys' => Company::all(),
            'performers' => User::all(),
        ]);
    }

    public function update(Request $request, Cashflow $expanse)
    {
        if ($request->cashflow_date != $expanse->cashflow_date) {
            $request['cashflow_date'] = Carbon::createFromFormat('m/d/Y', $request->cashflow_date)->format('Y-m-d');
        };

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

        Cashflow::where('id', $expanse->id)->update($validateData);

        return redirect('/dashboard/expanses')->with('success', 'Data Pengeluaran Telah Berhasil Diubah');
    }

    public function destroy(Cashflow $expanse)
    {
        Cashflow::destroy($expanse->id);
        return redirect('/dashboard/expanses')->with('danger', 'Data Pengeluaran Telah Dihapus');
    }
}
