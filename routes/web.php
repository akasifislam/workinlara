<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });
Route::get('/', [HeaderController::class, 'index'])->name('header.index');


Route::get('dropzone', [DropzoneController::class, 'dropzone']);
Route::post('dropzone/store', [DropzoneController::class, 'dropzoneStore'])->name('dropzone.store');



Route::resource('posts', PostController::class);
Route::resource('tests', TestController::class);
Route::resource('infos', InfoController::class);


Route::delete('/skdfjhfgsdhjgf', [PostController::class, 'deleteAllPost'])->name('post.delete.success');



// multiple delete 
Route::get('myproducts', [ProductController::class, 'index']);
Route::delete('myproducts/{id}', [ProductController::class, 'destroy']);
Route::delete('myproductsDeleteAll', [ProductController::class, 'deleteAll']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth'], 'namespace' => 'admin'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'user'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
});




Route::get('employee', [EmpController::class, 'getAllEmployees']);
Route::get('pdf', [EmpController::class, 'downloadPdf'])->name('app.download.pdf');
Route::get('excel', [EmpController::class, 'exportIntoExcel'])->name('app.download.excel');
Route::get('csv', [EmpController::class, 'exportIntoCSV'])->name('app.download.csv');



// Route::resource('category', CategoryController::class);

Route::get('date-time', [CategoryController::class, 'getDateTime'])->name('date.time.index');
// Route::post('demos/sortabledatatable',  [CategoryController::class, 'updateOrder']);


// Route::get('date-time', 'HomeController@getDateTime')->name('date.time.index');
// Route::get('date-time', 'HomeController@getDateTime')->name('date.time.index');

Route::get('/apple', [ItemController::class, 'itemView']);

Route::post('/update-items', [ItemController::class, 'updateItems'])->name('update.items');
