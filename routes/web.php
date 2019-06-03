<?php
use App\Http\Controllers\GameController;
use App\Events\MoveCreated;
use App\Events\TestEvent;

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
    return view('welcome');
});

Route::get('/move', 'MoveController@index')->name('move');
Route::post('/move', 'MoveController@store')->name('move.store');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::get('/chat', 'ChatController@index')->name('chat');
Route::get('/message', 'MessageController@index')->name('message');
Route::post('/message', 'MessageController@store')->name('message.store');

Route::get('/analyse', 'AnalyseController@index')->name('analyse');
Route::post('/analyse', 'AnalyseController@show')->name('analyse.show');
Route::post('/analyse/{id}/next', 'AnalyseController@nextMove');

Route::get('/game', 'GameController@index')->name('game');
Route::get('/{id}', 'GameController@show')->name('game.show');
Route::post('/game', 'GameController@store');
Route::post('/game/{id}/move', 'GameController@insertMove');

Route::post('/profile/report', 'ProfileController@report')->name('profile.report');
Route::post('/profile/add', 'ProfileController@add')->name('profile.add');
Route::post('/profile/reported', 'ProfileController@reported')->name('profile.reported');
Route::get('/profile/{user}', 'ProfileController@show');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updatePicture')->name('profile.update');




