<?php

use App\Http\Controllers\Controller;
use App\Http\Livewire\Home\Home\Index;
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
//---------------------------Home Page------------------//
Route::get('/',Index::class)->name('home.index');
//-----------------------------Users Register-------------------------//
Route::get('/register',\App\Http\Livewire\Home\Users\Register::class)->name('register');
//-------------------------------Users Login-----------------------------------//
Route::get('/login',\App\Http\Livewire\Home\Users\Login::class)->name('login');
Route::get('/verify-mobile/{id}',\App\Http\Livewire\Home\Users\VerifyMobile::class)->name('verify.mobile');
//--------------------------Change Password------------------------------------//
Route::get('/forget-password',\App\Http\Livewire\Home\Users\ForgetPassword::class)->name('forget.password');
Route::get('/forget-password/verify/{id}',\App\Http\Livewire\Home\Users\ForgetPasswordVerify::class)->name('forget.password.verify');
Route::get('/change-password/{code}',\App\Http\Livewire\Home\Users\ChangePassword::class)->name('change.password');
//-----------------------------------------Logout---------------------------------//
Route::post('/logout',[\App\Http\Controllers\HomeController::class,'logout'])->name('logout');
//--------------------------------------Users Profile----------------------------------//

Route::middleware('auth')->prefix('users/profile')->group(function (){
    Route::get('/',\App\Http\Livewire\Home\Profile\Index::class)->name('user.profile.index');
});

//Laravel Ajax
Route::get('/ajax/index',[\App\Http\Controllers\Ajax\AjaxController::class,'index'])->name('ajax.index');
Route::post('/ajax/store',[\App\Http\Controllers\Ajax\AjaxController::class,'store'])->name('ajax.store');


//\Illuminate\Support\Facades\Auth::routes();
