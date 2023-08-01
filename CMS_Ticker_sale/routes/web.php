<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\myController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Trang thống kê
Route::get('/statistical', [myController::class, 'showStatistical']);

// Trang quản lý vé
Route::get('/ticket_management', [myController::class, 'showTicketManagement']);
Route::post('/update', [myController::class, 'update']);

// Trang đối soát vé
Route::get('/ticket_check', [myController::class, 'showTicketCheck']);

// Trang danh sách gói vé
Route::get('/setting', [myController::class, 'showSetting']);
// Chức năng thêm gói vé
Route::post('/setting', [myController::class, 'addsetting']);
// Chức năng cập nhật gói vé
Route::post('/setting_update', [myController::class, 'updatesetting']);


Route::get('/ticket_check/filter', [MyController::class, 'filterdsl'])->name('FilterData');




Route::get('/exportCsv', [MyController::class, 'export'])->name('export');
