<?php

use App\Http\Livewire\Admin\Dashboard\Index;
use App\Http\Livewire\Admin\Settings\Footer\Label;
use App\Http\Livewire\Admin\Settings\Footer\Logo;
use App\Http\Livewire\Admin\Settings\Footer\Social;
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

Route::get('/',Index::class)->name('admin.index');
// Footer Settings
Route::prefix('settings')->group(function () {

    Route::get('/footer/label',Label::class)->name('admin.setting.footer.label');
    Route::get('/footer/socials',Social::class)->name('admin.setting.footer.social');
    Route::get('/footer/logos',Logo::class)->name('admin.setting.footer.logo');

});
