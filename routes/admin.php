<?php

use App\Http\Livewire\Admin\Dashboard\Index;
use App\Http\Livewire\Admin\Settings\Footer\Label;

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
// Settings
Route::prefix('settings')->group(function () {
    /////////////////////////////////////Footer Routes //////////////////////////////////////
    Route::prefix('footer')->group(function (){

        Route::get('/label',Label::class)->name('admin.setting.footer.label');
        Route::get('/socials',Social::class)->name('admin.setting.footer.social');
        //Footer Logos
        Route::get('/logos',\App\Http\Livewire\Admin\Settings\Footer\Logo\Index::class)->name('admin.setting.footer.logo.index');
        Route::get('/logos/{footerLogo}', \App\Http\Livewire\Admin\Settings\Footer\Logo\Update::class)->name('admin.setting.footer.logo.update');
        Route::get('/logo/trashed', \App\Http\Livewire\Admin\Settings\Footer\Logo\Trashed::class)->name('admin.setting.footer.logo.trashed');
        //Footer Menus
        Route::get('/menus',\App\Http\Livewire\Admin\Settings\Footer\Menu\Index::class)->name('admin.setting.footer.menu.index');
        Route::get('/menus/{footerMenu}', \App\Http\Livewire\Admin\Settings\Footer\Menu\Update::class)->name('admin.setting.footer.menu.update');
        //Footer Apps Access
        Route::get('/apps',\App\Http\Livewire\Admin\Settings\Footer\Apps::class)->name('admin.setting.footer.apps');
    });


});
