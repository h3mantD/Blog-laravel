<?php

use App\Http\Controllers\PostsController;
use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

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

Route::get('/', function () {
    return view('template');
})->name('homePage');

Route::get('/home', function() {
    //return view('template');
    return redirect()->route('posts.index');
    //dd(Auth::user());
})->middleware('auth');

//Route::get('/view-all', [PostsController::class, 'index']);

Route::resource('posts', PostsController::class);

Route::get('testing-livewire', Home::class);