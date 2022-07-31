<?php
use Illuminate\Support\Facades\{
    Auth,
    Route
};

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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return Auth::user();
})->middleware('auth');

Route::get('/google-auth/callback', [\App\Http\Controllers\Auth\LoginController::class, 'googleLogin']);
Route::get('/google-auth/redirect', [\App\Http\Controllers\Auth\LoginController::class, 'redirectGoogle'])->name('login.google');
Route::get('/github-auth/callback', [\App\Http\Controllers\Auth\LoginController::class, 'gitHubLogin']);
Route::get('/github-auth/redirect', [\App\Http\Controllers\Auth\LoginController::class, 'redirectGithub'])->name('login.github');
