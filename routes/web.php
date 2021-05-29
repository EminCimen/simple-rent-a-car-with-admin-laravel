<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/login',[HomeController::class,'loginAttempt'])->name('loginAttempt');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('/kayit-ol',[HomeController::class,'register'])->name('register');
Route::post('/kayit-ol',[HomeController::class,'registerStore'])->name('registerStore');
Route::get('/tum-araclar',[HomeController::class,'listAll'])->name('listAll');
Route::get('/kirala/{id}',[HomeController::class,'rent'])->name('rent')->middleware('isuser');
Route::post('/kirala/{id}',[HomeController::class,'rentRequest'])->name('rent.request')->middleware('isuser');
Route::get('/musteri-paneli',[HomeController::class,'memberSettings'])->name('memberSettings')->middleware('isuser');
Route::get('/musteri-paneli/duzenle',[HomeController::class,'memberEdit'])->name('memberEdit')->middleware('isuser');
Route::post('/musteri-paneli/duzenle',[HomeController::class,'memberStore'])->name('memberStore')->middleware('isuser');
Route::get('/admin/login',[AdminController::class,'login'])->name('backend.login');
Route::post('/admin/login',[AdminController::class,'loginAttempt'])->name('backend.loginAttempt');

Route::group(['namespace' => 'backend' ,'middleware' => 'islogin'],function (){
    Route::get('/admin',[AdminController::class,'index'])->name('backend.index');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('backend.logout');
    Route::get('/admin/carAdd',[AdminController::class,'carAdd'])->name('backend.carAdd');
    Route::post('/admin/carAdd/store',[AdminController::class,'carStore'])->name('backend.carStore');
    Route::get('/admin/carList',[AdminController::class,'carList'])->name('backend.carList');
    Route::get('/admin/deletedCarList',[AdminController::class,'deletedCarList'])->name('backend.deletedCarList');
    Route::get('/admin/carPassive/{id}',[AdminController::class,'carPassive'])->name('backend.carPassive');
    Route::get('/admin/carActive/{id}',[AdminController::class,'carActive'])->name('backend.carActive');
    Route::get('/admin/carEdit/{id?}',[AdminController::class,'carEdit'])->name('backend.carEdit');
    Route::post('/admin/carEdit/{id?}',[AdminController::class,'carUpdate'])->name('backend.carUpdate');
    Route::get('/admin/adminList',[AdminController::class,'listAdmins'])->name('backend.adminList');
    Route::get('/admin/adminAdd/{id?}',[AdminController::class,'addAdmin'])->name('backend.adminAdd');
    Route::post('/admin/adminAdd',[AdminController::class,'adminStore'])->name('backend.adminStore');
    Route::post('/admin/adminUpdate',[AdminController::class,'adminUpdate'])->name('backend.adminUpdate');
    Route::get('/admin/adminDelete/{id}',[AdminController::class,'adminDelete'])->name('backend.adminDelete');
    Route::get('/admin/reservationConfirm/{id}',[AdminController::class,'reservationOperation'])->name('backend.reservation');
    Route::get('/admin/reservations',[AdminController::class,'reservationsPage'])->name('backend.reservation.page');
    Route::get('/admin/user/list',[AdminController::class,'userList'])->name('backend.userlist.page');
    Route::get('/admin/user/{id}',[AdminController::class,'userEdit'])->name('backend.useredit.page');
    Route::post('/admin/user/{id}',[AdminController::class,'userUpdate'])->name('backend.userupdate');
});


