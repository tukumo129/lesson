<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KitchenController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//guest
Route::get('guest/first_page/{id}', [GuestController::class, 'firstPage'])->name('guest_first_page');
Route::get('guest/home', [GuestController::class, 'home'])->name('guest_home');
Route::get('guest/menu', [GuestController::class,'menu'])->name('guest_menu');
Route::get('guest/list_add/{id}', [GuestController::class,'listAdd'])->name('guest_list_add');
Route::post('guest/order', [GuestController::class,'order'])->name('guest_order');
Route::post('guest/order_submit', [GuestController::class,'orderSubmit'])->name('guest_order_submit');
Route::get('guest/order_list', [GuestController::class,'orderList'])->name('guest_order_list');

Route::get('kitchen/home', [KitchenController::class, 'home'])->name('kitchen_home');
Route::get('kitchen/menu_management', [KitchenController::class, 'menuManagement'])->name('kitchen_menu_management');
Route::post('kitchen/menu_action', [KitchenController::class, 'menuAction'])->name('kitchen_menu_action');
Route::post('kitchen/menu_create', [KitchenController::class, 'menuCreate'])->name('kitchen_menu_create');
Route::get('kitchen/order_list', [KitchenController::class, 'orderList'])->name('kitchen_order_list');
Route::post('kitchen/order_offer', [KitchenController::class, 'orderOffer'])->name('kitchen_order_offer');

Route::fallback(function () {
    return view('error');
});
