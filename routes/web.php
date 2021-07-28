<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authenticController;
use Illuminate\Support\Str;
use App\Models\clients;
// use number


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
    // echo rand(1,10);
    // return Str::random(10);
});


// custome authentication
// registration

Route::post('registration',[authenticController::class, 'store']);
// login

Route::post('login',[authenticController::class, 'logedin']);
// dashboard
// Route::get('dashboard',function(){
//     if(Session()->has('email')){
//         return view('dashboard');
//     }else{
//         return back()->with('error','Whoos login first');
//     }
// });

// logout
Route::get('logout',[authenticController::class, 'logout']);
Route::get('login',[authenticController::class, 'login']);
    Route::get('registration',[authenticController::class, 'index']);

// middleware
Route::group(['middleware' => ['authcheck']], function(){
    Route::get('login',[authenticController::class, 'login']);
    Route::get('registration',[authenticController::class, 'index']);
    Route::get('dashboard',[authenticController::class, 'dashboard'])->middleware('authcheck');
});


// todo list
Route::post('addtodo',[authenticController::class, 'addtodo']);
Route::get('removetodo/{id}',[authenticController::class, 'removetodo']);


Route::get('/clients',function(){
    return clients::find(1)->post;  
});

