<?php

use App\Http\Controllers\Admin\ArtistController;

use App\Http\Controllers\Admin\RatingController;
use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'],function (){
Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.auth.logout');
    /////////route admins////////////////////
    Route::get('admins', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.admins');
    Route::post('admins', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.admins.store');
    Route::post('update', [App\Http\Controllers\Admin\AdminController::class, 'update'])->name('admin.admins.update');
    Route::post('destroy', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('admin.admins.destroy');
    /////////route admins////////////////////
    /////////route services////////////////////
        Route::get('Service', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('admin.services');
        Route::post('Service', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('admin.services.store');
         Route::post('Update', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('admin.services.update');
        Route::get('Service/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('admin.services.destroy');
        /////////route services////////////////////
    /////////route RequestsAll////////////////////
    Route::get('RequestAll', [App\Http\Controllers\Admin\RequestsAllController::class, 'index'])->name('admin.users.index');
    Route::get('RequestAll/{id}', [App\Http\Controllers\Admin\RequestsAllController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('get_user', [App\Http\Controllers\Admin\RequestsAllController::class, 'get_user'])->name('admin.users.get_user');
    Route::get('get_user/{id}', [App\Http\Controllers\Admin\RequestsAllController::class, 'destroy_user'])->name('admin.users.destroy_user');
    Route::get('/user_export', [App\Http\Controllers\Admin\RequestsAllController::class, 'export'])->name('user.export');

    /////////route RequestsAll////////////////////
    Route::get('/statues/{id}', [App\Http\Controllers\Admin\ArtistController::class, 'statues'])->middleware('auth:admin')->name('admin.artists.statues');

});

/////////route Artists////////////////////
Route::resource('artists', ArtistController::class)->middleware('auth:admin');
Route::get('/artists/create/Get_area/{id}', [App\Http\Controllers\Admin\ArtistController::class, 'getarea'])->middleware('auth:admin');
/*Excel route*/
Route::get('/artists_export', [App\Http\Controllers\Admin\ArtistController::class, 'export'])->middleware('auth:admin')->name('export');
/* Presence artist*/
Route::get('presence', [App\Http\Controllers\Admin\PresenceController::class, 'index'])->middleware('auth:admin')->name('admin.artists.presence');
Route::get('destroy/{id}', [App\Http\Controllers\Admin\PresenceController::class, 'destroy'])->middleware('auth:admin')->name('admin.artists.presence.destroy');

/////////route Artists////////////////////


/////////route ratings////////////////////
Route::resource('ratings', RatingController::class)->middleware('auth:admin');
Route::get('delete/{id}', [App\Http\Controllers\Admin\RatingController::class, 'destroy'])->middleware('auth:admin')->name('admin.rating.destroy');

/////////route ratings////////////////////

/////////////////Authentication admin
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'],function (){

    Route::get('login', [App\Http\Controllers\Admin\LoginController::class, 'getLogin'])->name('admin.auth.login');
    Route::post('login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.auth');

});

