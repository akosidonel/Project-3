<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Route::get('/admin/department',[MainController::class,'department'])->name('admin.department');
Route::post('/admin/save',[MainController::class,'save'])->name('admin.save');
Route::get('/admin/fetch-departments',[MainController::class,'fetchAllDept'])->name('admin.fetchAllDept');
Route::get('/admin/edit-department', [MainController::class,'editDept'])->name('admin.editDept');
Route::post('/admin/update-department',[MainController::class,'updateDept'])->name('admin.updateDept');
Route::post('/admin/delete-department',[MainController::class,'deleteDept'])->name('admin.deleteDept');