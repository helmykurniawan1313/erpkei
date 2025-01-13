<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardAboutController;
use App\Http\Controllers\LoginController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UploadMIController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardServiceController;
use App\Http\Controllers\DashboardClientController;
use App\Http\Controllers\DashboardCatController;
use App\Http\Controllers\DashboardProjectController;

use App\Http\Controllers\DashboardMainController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;


use App\Http\Controllers\DashboardIncomeController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\DashboardExpensesController;
use App\Http\Controllers\EmployeeDebtController;
use App\Http\Controllers\ExpansesCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home', ['title' => 'Home', 'active' => 'home']);
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/profile', DashboardProfileController::class)->middleware('auth');




Route::resource('/dashboard/profile', DashboardProfileController::class)->middleware('auth');
Route::get('/dashboard/profiles/{id}/edit', [DashboardProfileController::class, 'edit']);
Route::put('/dashboard/profile/{id}', [DashboardProfileController::class, 'update']);




Route::post('/dashboard/uploadmainimage/proses', [UploadMIController::class, 'proses_upload']);
Route::get('/dashboard/uploadmainimage', [UploadMIController::class, 'upload']);
Route::get('/dashboard/uploadmainimage/hapus/{id}', [UploadMIController::class, 'hapus']);

Route::resource('/dashboard/about', DashboardAboutController::class)->middleware('auth');
Route::get('/dashboard/abouts/{id}/edit',  [DashboardAboutController::class, 'edit'])->middleware('auth');


Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload/proses', [UploadController::class, 'proses_upload']);
Route::get('/upload/hapus/{id}', [UploadController::class, 'hapus']);

Route::resource('/dashboard/products', DashboardProductController::class)->middleware('auth');
Route::resource('/dashboard/services', DashboardServiceController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/clients', DashboardClientController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/cats', DashboardCatController::class)->except('show')->middleware('auth');

Route::get('/dashboard/projects/checkSlug', [DashboardProjectController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/projects', DashboardProjectController::class)->middleware('auth');
Route::resource('/dashboard/setting', SettingController::class)->middleware('auth');
Route::get('/dashboard/setting/changepass/{username}/edit', [SettingController::class, 'editpass'])->middleware('auth');
Route::put('/dashboard/setting/changepass/{username}', [SettingController::class, 'updatepass'])->middleware('auth');



Route::resource('/dashboard/incomes', DashboardIncomeController::class)->middleware('auth');
Route::resource('/dashboard/incomecategory', IncomeCategoryController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/expanses', DashboardExpensesController::class)->middleware('auth');
Route::resource('/dashboard/expansescategory', ExpansesCategoryController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/employeedebt', EmployeeDebtController::class)->middleware('auth');
Route::get('/dashboard/employeedebt/{performer_id}/detail',  [EmployeeDebtController::class, 'detail'])->middleware('auth');
Route::get('/dashboard/employeedebt/{performer_id}/createdebt',  [EmployeeDebtController::class, 'createdebt'])->middleware('auth');
Route::post('/dashboard/employeedebt/createdebt',  [EmployeeDebtController::class, 'storedebt'])->middleware('auth');
Route::get('/dashboard/employeedebt/{performer_id}/paydebt',  [EmployeeDebtController::class, 'paydebt'])->middleware('auth');
Route::delete('/dashboard/employeedebt/{id}/del',  [EmployeeDebtController::class, 'deletedebt'])->middleware('auth');
Route::put('/dashboard/employeedebt/{id}/edit', [EmployeeDebtController::class, 'update'])->middleware('auth');
Route::resource('/dashboard/main', DashboardMainController::class)->middleware('auth');
