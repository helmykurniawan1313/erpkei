<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\User;
use App\Models\About;
use App\Models\Cashflow;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class DashboardMainController extends Controller
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



    public function index(Request $request)
    {
        $division_name = auth()->user()->division->division_name;
        $division = auth()->user()->division_id;
        if ($division == 1 or $division == 2) {

            $query = DB::table('cashflow')
                ->select(
                    DB::raw('YEAR(cashflow_date) as year'),
                    DB::raw('MONTH(cashflow_date) as month'),
                    DB::raw('SUM(CASE WHEN transaction_category_id = 1 THEN nominal ELSE 0 END) as total_income'),
                    DB::raw('SUM(CASE WHEN transaction_category_id = 2 THEN nominal ELSE 0 END) as total_expense')
                )
                ->groupBy('year', 'month');

            // If date filtering is needed
            if ($request->has('start_date') && $request->has('end_date')) {
                $query->whereBetween('cashflow_date', [$request->start_date, $request->end_date]);
            }

            $monthlyData = $query->get()->map(function ($data) {
                $data->difference = $data->total_income - $data->total_expense;
                return $data;
            });


            $incomeData = DB::table('cashflow')
                ->select(DB::raw('MONTH(cashflow_date) as month'), DB::raw('SUM(nominal) as total'))
                ->where('transaction_category_id', 1)
                ->groupBy('month')
                ->get();

            $expenseData = DB::table('cashflow')
                ->select(DB::raw('MONTH(cashflow_date) as month'), DB::raw('SUM(nominal) as total'))
                ->where('transaction_category_id', 2)
                ->groupBy('month')
                ->get();

            $incomeArray = array_fill(0, 12, 0);
            $expenseArray = array_fill(0, 12, 0);

            foreach ($incomeData as $item) {
                $incomeArray[intval($item->month) - 1] = floatval($item->total);
            }

            foreach ($expenseData as $item) {
                $expenseArray[intval($item->month) - 1] = floatval($item->total);
            }

            // Other data fetching and processing...
            // ddd(floatval($item->total));

            // Get data from profile

            // $username = auth()->user()->name;
            // $sumincome = Cashflow::where('transaction_category_id', 1)->sum('nominal');
            // $sumexpanse = Cashflow::where('transaction_category_id', 2)->sum('nominal');
            // $sumpaydebt = Cashflow::where('transaction_category_id', 3)->sum('nominal');
            // $sumdebt = Cashflow::where('transaction_category_id', 4)->sum('nominal');
            // $totaldebt = $sumdebt - $sumpaydebt;
            // $totalinex = $sumincome - $sumexpanse;
            // $totalsum = ($sumincome - $sumexpanse) + ($sumpaydebt - $sumdebt);
            // $debtpersentage = $sumpaydebt / $sumdebt * 100;
            // $transaction_count = Cashflow::count();

            // // Get all distinct cashflow categories for income
            // $categoriesDataincome = Cashflow::where('transaction_category_id', 1)
            //     ->with('cashflow_category')
            //     ->get()
            //     ->groupBy('cashflow_category_id')
            //     ->map(function ($group) use ($sumincome) {
            //         $cashflowCategory = $group->first()->cashflow_category;
            //         $total = $group->sum('nominal');
            //         $percentage = ($sumincome > 0) ? ($total / $sumincome) * 100 : 0;
            //         return [
            //             'cashflow_category_id' => $cashflowCategory->id,
            //             'cashflow_category_name' => $cashflowCategory->cashflow_category_name,
            //             'total' => $total,
            //             'percentage' => $percentage
            //         ];
            //     })->values();

            // // Get all distinct cashflow categories for expanse
            // $categoriesDataexpanse = Cashflow::where('transaction_category_id', 2)
            //     ->with('cashflow_category')
            //     ->get()
            //     ->groupBy('cashflow_category_id')
            //     ->map(function ($group) use ($sumexpanse) {
            //         $cashflowCategory = $group->first()->cashflow_category;
            //         $total = $group->sum('nominal');
            //         $percentage = ($sumexpanse > 0) ? ($total / $sumexpanse) * 100 : 0;
            //         return [
            //             'cashflow_category_id' => $cashflowCategory->id,
            //             'cashflow_category_name' => $cashflowCategory->cashflow_category_name,
            //             'total' => $total,
            //             'percentage' => $percentage
            //         ];
            //     })->values();
            // ddd($categoriesDataincome);
            // Send data to view
            return view('dashboard.main.index', [
                'division_name' => $division_name,
                'division' => $division,
                'sumincome' => Cashflow::where('transaction_category_id', 1)->sum('nominal'),
                'sumexpanse' => Cashflow::where('transaction_category_id', 2)->sum('nominal'),
                'sumdebt' => Cashflow::where('transaction_category_id', 4)->sum('nominal'),
                'sumpaydebt' => Cashflow::where('transaction_category_id', 3)->sum('nominal'),
                'totaldebt' => Cashflow::where('transaction_category_id', 4)->sum('nominal') - Cashflow::where('transaction_category_id', 3)->sum('nominal'),
                'totalsum' => (Cashflow::where('transaction_category_id', 1)->sum('nominal') - Cashflow::where('transaction_category_id', 2)->sum('nominal')) + (Cashflow::where('transaction_category_id', 3)->sum('nominal') - Cashflow::where('transaction_category_id', 4)->sum('nominal')),
                'totalinex' => Cashflow::where('transaction_category_id', 1)->sum('nominal') - Cashflow::where('transaction_category_id', 2)->sum('nominal'),
                'transaction_count' => Cashflow::count(),
                'debtpersentage' => Cashflow::where('transaction_category_id', 3)->sum('nominal') / Cashflow::where('transaction_category_id', 4)->sum('nominal') * 100,
                'page_title' => 'Main Dashboard',
                'categoriesDataincome' => Cashflow::where('transaction_category_id', 1)
                    ->with('cashflow_category')
                    ->get()
                    ->groupBy('cashflow_category_id')
                    ->map(function ($group) {
                        return [
                            'cashflow_category_id' => $group->first()->cashflow_category->id,
                            'cashflow_category_name' => $group->first()->cashflow_category->cashflow_category_name,
                            'total' => $group->sum('nominal'),
                            'percentage' => $group->sum('nominal') / Cashflow::where('transaction_category_id', 1)->sum('nominal') * 100
                        ];
                    })->values(),
                'categoriesDataexpanse' => Cashflow::where('transaction_category_id', 2)
                    ->with('cashflow_category')
                    ->get()
                    ->groupBy('cashflow_category_id')
                    ->map(function ($group) {
                        return [
                            'cashflow_category_id' => $group->first()->cashflow_category->id,
                            'cashflow_category_name' => $group->first()->cashflow_category->cashflow_category_name,
                            'total' => $group->sum('nominal'),
                            'percentage' => $group->sum('nominal') / Cashflow::where('transaction_category_id', 2)->sum('nominal') * 100
                        ];
                    })->values(),
                'incomeArray' => $incomeArray, // Pass the monthly income data to the view 
                'expenseArray' => $expenseArray, // Pass the monthly expense data to the view
                'monthlyData' => $monthlyData // Pass the monthly financial data to the view
            ]);
        } elseif ($division == 3) {
            return view(
                'dashboard.main.index',
                [
                    'division' => $division,
                    'division_name' => $division_name,
                    'page_title' => 'Main Dashboard'
                ]
            );
        } else {
        }
    }







    public function edit($id)
    {
        $about = About::where('id', $id)->get();
        $username = auth()->user()->username;

        return view('dashboard.abouts.edit', [
            'about' => $about,
            'page_title' => 'Edit | About Us',
            'profile' => Profile::get(),
            'user' => $username
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {

        $rules = [
            'main_header' => 'required|max:255',
            'main_body' => 'required',
            'background' => 'image|file|max:1024',
            'ourstory' => 'required',
            'image1' => 'image|file|max:1024',
            'client' => 'max:255',
            'project' => 'max:255',
            'support' => 'max:255',
            'employee' => 'max:255',
            'about' => 'required',
            'image2' => 'image|file|max:1024'

        ];



        $validateData = $request->validate($rules);

        if ($request->file('background')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['background'] = $request->file('background')->store('about-image');
        }

        if ($request->file('image1')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image1'] = $request->file('image1')->store('about-image');
        }

        if ($request->file('image2')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image2'] = $request->file('image2')->store('about-image');
        }

        //$validateData['user_id'] = auth()->user()->id;


        About::where('id', $about->id)->update($validateData);


        return redirect('/dashboard/about')->with('success', 'About Us Pagde has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $rules = [
            'main_header' => 'required|max:255',
            'main_body' => 'required',
            'background' => 'image|file|max:1024',
            'ourstory' => 'required',
            'image1' => 'image|file|max:1024',
            'client' => 'max:255',
            'project' => 'max:255',
            'support' => 'max:255',
            'employee' => 'max:255',
            'about' => 'required',
            'image2' => 'image|file|max:1024'

        ];



        $validateData = $request->validate($rules);

        if ($request->file('background')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['background'] = $request->file('background')->store('about-image');
        }

        //$validateData['user_id'] = auth()->user()->id;


        About::create($validateData);

        return redirect('/dashboard/abouts')->with('success', 'Post has been updated!');
    }
}
