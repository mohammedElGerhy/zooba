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
/*
 *route artist
 */
Route::group(['prefix'=> 'artists'], function (){
    Route::get('login', [App\Http\Controllers\ArtistController::class, 'login'])->name('artist.login');
    Route::post('login', [App\Http\Controllers\ArtistController::class, 'set_login'])->name('artist.set_login');

    Route::group(['middleware' => 'artist:artist'], function (){
        Route::get('/', [App\Http\Controllers\ArtistController::class, 'index'])->name('artist.profile');
        Route::any('logout', [App\Http\Controllers\ArtistController::class, 'logout'])->name('artist.logout');
        Route::post('presence', [App\Http\Controllers\ArtistController::class, 'add_presence'])->name('artist.presence');
        Route::get('show/{id}', [App\Http\Controllers\ArtistController::class, 'show'])->name('artist.show');
        Route::get('delete/{id}', [App\Http\Controllers\ArtistController::class, 'destroy'])->name('artist.destroy');
        Route::get('processes', [App\Http\Controllers\ArtistController::class, 'get_processes'])->name('artist.processes');

    });

});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('get_service', [App\Http\Controllers\HomeController::class, 'get_service'])->name('get_service');
Route::get('get_artists', [App\Http\Controllers\HomeController::class, 'get_artists'])->name('get_artists');
Route::get('get_processes', [App\Http\Controllers\HomeController::class, 'get_processes'])->name('get_processes');
Route::get('get_artist/{id}', [App\Http\Controllers\HomeController::class, 'get_artist'])->name('get_artist');

Route::get('/get_artist/get_area/{id}', [App\Http\Controllers\HomeController::class, 'getarea']);
Route::post('Filter_area', [App\Http\Controllers\HomeController::class, 'Filter_area'])->name('Filter_area');
Route::post('get_all', [App\Http\Controllers\HomeController::class, 'get_all'])->name('get_all');
Route::post('contact-form', [App\Http\Controllers\ArtistController::class, 'store'])->name('artist.contact-form');
Route::post('/form-comment', [App\Http\Controllers\ArtistController::class, 'store_comment'])->name('artist.form-comment');
Route::post('/artists/form-success', [App\Http\Controllers\ArtistController::class, 'statues_success'])->name('artist.form-success');
Route::post('/artists/form-end', [App\Http\Controllers\ArtistController::class, 'statues_end'])->name('artist.form-end');
