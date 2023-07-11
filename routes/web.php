<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProtofolioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home', [
//         'title' => 'Home Portofolio'
//     ]);
// });
Route::get('/', [IndexController::class, 'index']);

Route::middleware(['auth'])->group(function(){
  Route::resource('/profile', ProfileController::class);
  Route::resource('/portofolio', ProtofolioController::class);
  Route::resource('/client', ClientController::class);
  Route::resource('/blog', BlogController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
