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

//------------------------Dashboard--------------------------//
Route::get('/',Index::class)->name('admin.index');
//----------------------------------- Settings---------------------------//
Route::prefix('settings')->group(function () {
    /////////////////////////////////////Footer Routes //////////////////////////////////////
    Route::prefix('footer')->group(function (){
        //----------------------------------Footer ETC-------------------------------------------//
        Route::get('/label',Label::class)->name('admin.setting.footer.label');
        Route::get('/socials',Social::class)->name('admin.setting.footer.social');
        //----------------------------------Footer Logos-------------------------------------------//
        Route::get('/logos',\App\Http\Livewire\Admin\Settings\Footer\Logo\Index::class)->name('admin.setting.footer.logo.index');
        Route::get('/logos/{footerLogo}', \App\Http\Livewire\Admin\Settings\Footer\Logo\Update::class)->name('admin.setting.footer.logo.update');
        Route::get('/logo/trashed', \App\Http\Livewire\Admin\Settings\Footer\Logo\Trashed::class)->name('admin.setting.footer.logo.trashed');
        //-----------------------------------Footer Menus------------------------------------------//
        Route::get('/menus',\App\Http\Livewire\Admin\Settings\Footer\Menu\Index::class)->name('admin.setting.footer.menu.index');
        Route::get('/menus/{footerMenu}', \App\Http\Livewire\Admin\Settings\Footer\Menu\Update::class)->name('admin.setting.footer.menu.update');
        //---------------------------------Footer Apps Access-----------------------------//
        Route::get('/apps',\App\Http\Livewire\Admin\Settings\Footer\Apps::class)->name('admin.setting.footer.apps');
    });
});
        //---------------------------Admin Logs---------------------------------//
Route::get('/logs',App\Http\Livewire\Admin\Logs\Index::class)->name('admin.logs');
        //---------------------------Admin Permissions---------------------------------//
Route::get('/permissions',App\Http\Livewire\Admin\Permissions\Index::class)->name('admin.permissions.index');
Route::get('/permissions/{permission}/edit',App\Http\Livewire\Admin\Permissions\Edit::class)->name('admin.permissions.edit');
Route::get('/permissions/trashed',App\Http\Livewire\Admin\Permissions\Trashed::class)->name('admin.permissions.trashed');
        //---------------------------Admin Roles---------------------------------//
Route::get('/roles',App\Http\Livewire\Admin\Roles\Index::class)->name('admin.roles.index');
Route::get('/roles/{role}/edit',App\Http\Livewire\Admin\Roles\Edit::class)->name('admin.roles.edit');
Route::get('/roles/trashed',App\Http\Livewire\Admin\Roles\Trashed::class)->name('admin.roles.trashed');
         //---------------------------Admin Users---------------------------------//
Route::get('/users',App\Http\Livewire\Admin\Users\Index::class)->name('admin.users.index');
Route::get('/users/create',App\Http\Livewire\Admin\Users\Create::class)->name('admin.users.create');
Route::get('/users/{user}/edit',App\Http\Livewire\Admin\Users\Edit::class)->name('admin.users.edit');
Route::get('/users/trashed',App\Http\Livewire\Admin\Users\Trashed::class)->name('admin.users.trashed');
Route::get('/users/permissions/{user}',App\Http\Livewire\Admin\Users\Permission::class)->name('admin.users.permission');
Route::get('/users/info/{user}',App\Http\Livewire\Admin\Users\Info::class)->name('admin.users.info');
        //---------------------------Admin Products Routes---------------------------------//
Route::prefix('products')->group(function (){
    //Admin Categories
    Route::get('/categories',App\Http\Livewire\Admin\Products\Categories\Index::class)->name('admin.categories.index');
    Route::get('/categories/{category}/edit',App\Http\Livewire\Admin\Products\Categories\Update::class)->name('admin.categories.edit');
    Route::get('/categories/trashed',App\Http\Livewire\Admin\Products\Categories\Trashed::class)->name('admin.categories.trashed');
});

