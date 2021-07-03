<?php

use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
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
