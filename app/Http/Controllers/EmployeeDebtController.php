<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
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
use Illuminate\Support\Facades\View;

use PDF;

class EmployeeDebtController extends Controller
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


        // Fetch data 
        // Fetch data 
        $debt = DB::table('cashflow')
            ->join('users', 'cashflow.performer_id', '=', 'users.id')
            ->select(
                'users.name',
                'cashflow.performer_id',
                DB::raw('SUM(cashflow.nominal) as total_nominal')
            )
            ->where('cashflow.transaction_category_id', '=', 4)
            ->groupBy('cashflow.performer_id', 'users.name')
            ->get()->keyBy('performer_id')
            ->toArray();

        $paydebt = DB::table('cashflow')
            ->join('users', 'cashflow.performer_id', '=', 'users.id')
            ->select(
                'users.name',
                'cashflow.performer_id',
                DB::raw('SUM(cashflow.nominal) as total_nominal')
            )
            ->where('cashflow.transaction_category_id', '=', 3)
            ->groupBy('cashflow.performer_id', 'users.name')
            ->get()->keyBy('performer_id')->toArray();
        // Initialize result array 
        $result = [];
        // Perform the subtraction 
        foreach ($debt as $performer_id => $debt_value) {
            $paydebt_value = $paydebt[$performer_id]->total_nominal ?? 0;
            $difference = $debt_value->total_nominal - $paydebt_value;
            $result[] = (object)
            ['name' => $debt_value->name, 'performer_id' => $performer_id, 'difference' => $difference,];
        }
        // Convert to Collection 
        $result = collect($result);
        // Output result 
        // ddd($result);

        return view('dashboard.employeedebt.index', [
            'debts' => $result,
            'cashflow' => Cashflow::all(),
            'page_title' => 'Hutang Karyawan',
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
        return view('dashboard.employeedebt.create', [
            'page_title' => 'Tambah Hutang / Piutang',
            'profile' => Profile::get(),
            'performers' => User::all(),
            'companys' => Company::get(),
            'cashflow_categories' => CashflowCategory::whereIn('id', [1, 2])->get(),

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

        if ($request->cashflow_category_id == 1) {
            $request['transaction_category_id'] = 3;
        } else {
            $request['transaction_category_id'] = 4; // Change 4 to the appropriate value based on your logic
        }

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

        return redirect('/dashboard/employeedebt')->with('success', 'Data Hutang / Piutang Baru Telah Berhasil Ditambahkan');
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

    public function detail($performer_id)
    {
        // Fetch debt data
        $debt = DB::table('cashflow')
            ->join('users', 'cashflow.performer_id', '=', 'users.id')
            ->select(
                'users.name',
                'cashflow.performer_id',
                DB::raw('SUM(cashflow.nominal) as total_nominal')
            )
            ->where('cashflow.performer_id', $performer_id)
            ->where('cashflow.transaction_category_id', 4)
            ->groupBy('cashflow.performer_id', 'users.name')
            ->first(); // Retrieve only the first matching record

        // Fetch paydebt data
        $paydebt = DB::table('cashflow')
            ->join('users', 'cashflow.performer_id', '=', 'users.id')
            ->select(
                'users.name',
                'cashflow.performer_id',
                DB::raw('SUM(cashflow.nominal) as total_nominal')
            )
            ->where('cashflow.performer_id', $performer_id)
            ->where('cashflow.transaction_category_id', 3)
            ->groupBy('cashflow.performer_id', 'users.name')
            ->first(); // Retrieve only the first matching record

        // Perform the subtraction
        $paydebt_value = $paydebt ? $paydebt->total_nominal : 0;
        $difference = $debt ? $debt->total_nominal - $paydebt_value : 0;

        // Initialize result
        $result = (object)[
            'name' => $debt ? $debt->name : ($paydebt ? $paydebt->name : 'Unknown'),
            'performer_id' => $performer_id,
            'difference' => $difference,
        ];

        // Retrieve additional data if needed
        $cashflows = Cashflow::where('performer_id', $performer_id)
            ->whereIn('transaction_category_id', [3, 4])
            ->get();

        $profile = Profile::get();

        // Return the view with the data
        return view('dashboard.employeedebt.detail', [
            'cashflows' => $cashflows,
            'result' => $result,
            'debtname' => $cashflows->first(),
            'page_title' => 'Detail Hutang / Piutang',
            'profile' => $profile,
        ]);
    }


    public function edit(Cashflow $employeedebt)
    {


        return view('dashboard.employeedebt.edit', [
            'cashflow' => $employeedebt,
            'cashflow_categories' => CashflowCategory::whereIn('id', [1, 2])->get(),
            'page_title' => 'Ubah Hutang Karyawan',
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
    public function update(Request $request, $id)
    {


        $cashflow = Cashflow::findOrFail($id);

        if ($request->cashflow_date != $cashflow->cashflow_date) {
            $request['cashflow_date'] = Carbon::createFromFormat('m/d/Y', $request->cashflow_date)->format('Y-m-d');
        }

        $request['nominal'] = str_replace(',00', '', $request['nominal']);
        $request['nominal'] = str_replace('.', '', $request['nominal']);
        $request['nominal'] = str_replace('Rp ', '', $request['nominal']);

        $rules = [
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
        ];

        $validateData = $request->validate($rules);
        $validateData['user_id'] = auth()->user()->id;

        Cashflow::where('id', $cashflow->id)->update($validateData);

        return redirect("/dashboard/employeedebt/{$cashflow->performer_id}/detail")->with('success', 'Post has been updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashflow $employeedebt)
    {

        Cashflow::destroy($employeedebt->id);
        return redirect('/dashboard/employeedebt')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function createdebt($performer_id)
    {
        $performer_name = request('performer_name');

        return view('dashboard.employeedebt.createdebt', [
            'cashflow_categories' => CashflowCategory::where('transaction_category_id', 2)->get(),
            'transaction_categories' => TransactionCategory::all(),
            'companys' => Company::all(),
            'performers' => User::all(),
            'page_title' => 'Tambah Hutang',
            'profile' => Profile::all(),
            'performer_id' => $performer_id,
            'performer_name' => $performer_name,
        ]);
    }


    public function paydebt($performer_id)
    {
        $performer_name = request('performer_name');

        return view('dashboard.employeedebt.paydebt', [
            'cashflow_categories' => CashflowCategory::where('transaction_category_id', 2)->get(),
            'transaction_categories' => TransactionCategory::all(),
            'companys' => Company::all(),
            'performers' => User::all(),
            'page_title' => 'Tambah Bayar Hutang',
            'profile' => Profile::all(),
            'performer_id' => $performer_id,
            'performer_name' => $performer_name,
        ]);
    }

    public function storedebt(Request $request)
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

            'nominal' => 'required|max:255'


        ]);

        $validateData['user_id'] = auth()->user()->id;


        Cashflow::create($validateData);
        $id = $request->performer_id; // Ensure $id holds the correct performer ID
        return redirect("/dashboard/employeedebt/$id/detail")->with('success', 'Data Berhasil Ditambahkan');
    }
    public function deletedebt(Request $request, $id)
    {
        // Delete the cashflow record
        Cashflow::destroy($id);

        // Retrieve performer_id from the request
        $performer_id = $request->input('performer_id');

        // Redirect to the performer's detail page
        return redirect("/dashboard/employeedebt/$performer_id/detail")->with('danger', 'Data Telah Berhasil Dihapus');
    }
    public function debtedit(Cashflow $employeedebt)
    {

        return view('dashboard.employeedebt.debtedit', [
            'cashflow' => $employeedebt,
            'cashflow_categories' => CashflowCategory::all(),

            'page_title' => 'Ubah Data Hutang / Piutang',
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
    public function debtupdate(Request $request, Cashflow $employeedebt)
    {

        if ($request->cashflow_date != $employeedebt->cashflow_date) {

            $request['cashflow_date'] = Carbon::createFromFormat('m/d/Y', $request->cashflow_date)->format('Y-m-d');
        };
        $request['nominal'] = str_replace(',00', '',  $request['nominal']);
        $request['nominal'] = str_replace('.', '',  $request['nominal']);
        $request['nominal'] = str_replace('Rp ', '',  $request['nominal']);
        $rules = [
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
        ];



        $validateData = $request->validate($rules);



        $validateData['user_id'] = auth()->user()->id;

        Cashflow::where('id', $employeedebt->id)->update($validateData);

        return redirect('/dashboard/employeedebt')->with('success', 'Data Berhasil Diubah');
    }
}
