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
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
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
        $userdatas = User::with(['division.department'])->get();




        return view('dashboard.users.index', [

            'page_title' => 'Pengguna',

        ], compact('userdatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creata()
    {

        return view('dashboard.users.create', [
            'divisiondatas' => Division::all(),
            'departments' => Department::all(),
            'page_title' => 'Tambah Pengguna',

        ]);
    }
    public function create()
    {

        $departments = Department::with('divisions')->get();

        return view('dashboard.users.create', [
            'divisiondatas' => Division::all(),
            'departments' => $departments,
            'page_title' => 'Tambah Pengguna'
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
            'name' => 'required',
            'email' => 'required|email|unique:email',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required',
            'department_id' => 'required',
            'division_id' => 'required'
        ], [
            'email.unique' => 'The email has already been taken.',
            'username.unique' => 'The username has already been taken.',
        ]);
        $validateData['user_id'] = auth()->user()->id;
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/dashboard/users')->with('success', 'Data Pengguna Baru Telah Ditambahkan');
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
    public function edit(User $user)
    {

        $departments = Department::with('divisions')->get();
        return view('dashboard.users.edit', [
            'userdata' => $user,
            'divisiondata' => Division::all(),
            'departments' => $departments,
            'page_title' => 'Ubah Pengguna',

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable',
            'department_id' => 'required',
            'division_id' => 'required',
        ];


        $validateData = $request->validate($rules);


        // Check if password field is filled and different from the stored password
        if ($request->filled('password') && !Hash::check($request->password, $user->password)) {
            $validateData['password'] = Hash::make($validateData['password']);
        } else {
            unset($validateData['password']); // Remove password from validation data if not changing
        }

        $user->update($validateData);

        return redirect('/dashboard/users')->with('success', 'Data Berhasil Diubah');
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
    // UserController.php

    public function getDivisions($departmentId)
    {
        $divisions = Division::where('department_id', $departmentId)->pluck('division_name', 'id');
        return response()->json($divisions);
    }







    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $emailExists = User::where('email', $email)->exists();

        return response()->json(['success' => !$emailExists]);
    }

    public function checkUsername(Request $request)
    {
        $username = $request->input('username');
        $usernameExists = User::where('username', $username)->exists();

        return response()->json(['success' => !$usernameExists]);
    }
}
