<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\MeController;
use App\Http\Controllers\api\v1\BikeController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('/admin', function () {
    //return view('admin.admin');
     if( !Auth::user('admin.admin'))
     {
         return view('auth.login');
     }
    return view('admin.admin');
     
}); */

Route::get('/sample', function () {
    return view('sample');
   
});

Auth::routes();
/* Route::get('/admin', [MeController::class, 'home']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */ 

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

/* Route::get('/client', function () {
    return view('ClientHome');
}); */

/* Route::get('/{any}', function () {
   return view('welcome');
})->where('any', '.*');
 */
