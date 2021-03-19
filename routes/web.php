<?php

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
// localization 
Route::get('lang/{locale}', function ($locale){
	if($locale == 'ar'){
    	Session::put('locale', 'ar');
	}else {
		Session::put('locale', 'en');
	}
    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'home')->name('home');
});

Route::get('/admin', function () {
    return view('admin.pages.index');
});


// App::setLocale($locale);


