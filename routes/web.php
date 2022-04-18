<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Route::get('/admin/department',[MainController::class,'department'])->name('admin.department');
Route::post('/admin/save',[MainController::class,'save'])->name('admin.save');
Route::get('/admin/fetch-departments',[MainController::class,'fetchAllDept'])->name('admin.fetchAllDept');
Route::get('/admin/edit-department', [MainController::class,'editDept'])->name('admin.editDept');
Route::post('/admin/update-department',[MainController::class,'updateDept'])->name('admin.updateDept');
Route::post('/admin/delete-department',[MainController::class,'deleteDept'])->name('admin.deleteDept');

Route::get('/admin/dashboard',[MainController::class,'dashboard'])->name('admin.dashboard');




Route::get('/admin/gen-inventory',[MainController::class,'generalFundInventory'])->name('admin.gen-inventory');
Route::get('/admin/sef-inventory',[MainController::class,'sefInventory'])->name('admin.sef-inventory');
Route::get('/admin/return-item',[MainController::class,'returnItem'])->name('admin.return-item');
Route::get('admin/archived',[MainController::class,'archived'])->name('admin.archived');
Route::get('/admin/user-management' ,[MainController::class,'userManagement'])->name('admin.user-management');
Route::get('/admin/activity-log',[MainController::class,'activityLog'])->name('admin.activity-log');

