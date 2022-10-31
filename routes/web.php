<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login\LoginController;

require "back-end.php";

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


// Route::get('/aa', function () {
//    $notify[]=['success','Currency updated successfully'];
//    return view('back-end.partial.essential.dash-board')->withNotify($notify);
//     // $notify[]=['success','Currency updated successfully'];
//     //     return back()->withNotify($notify);
// });



// Route::get('/test',function(){
//     return view('back-end.page.test');
// })->name('test');



Route::get('/login',[LoginController::class,'loginForm'])->name('login-form');
Route::post('/login-post',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

// Route::get('forget-password',[LoginController::class,'forgetPassword'])->name('forget-password');
// Route::post('/forget-password-link',[LoginController::class,'forgetPasswordLink'])->name('forget.password.link');
// Route::get('forget-password-link-click/{token}/{email}',[LoginController::class,'passwordReset'])->name('password.reset');
// Route::post('/forget-password-post',[LoginController::class,'resetPassword'])->name('forget-password-post');



Route::get('forget-password-customer',[LoginController::class,'forgetPassword'])->name('forget.password');
// Route::get('forget-password-employee',[ForgetPassword::class,'forgetPasswordForDriver'])->name('employye.forget.password');
Route::post('forget-password-link',[LoginController::class,'forgetPasswordLink'])->name('forget.password.link');
Route::get('forget-password-link-click/{token}/{email}',[LoginController::class,'passwordReset'])->name('password.reset');
Route::post('reset-password',[LoginController::class,'resetPassword'])->name('password.reset.post');

Route::get('update-reset-password-from',[LoginController::class,'password'])->name('update-password.reset.form');
Route::post('update-reset-password-post',[LoginController::class,'updatePassword'])->name('user.update.password');

