<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('HalamanDashboard');


Route::get('admin_project', [DashboardController::class, 'admin_project'])->name('HalamanAdminproject');
Route::post('/tambah_project', [DashboardController::class, 'tambah_project'])->name('Tambah_project');
Route::post('/edit_project/{id}', [DashboardController::class, 'edit_project'])->name('Edit_project');
Route::delete('/project/{project}', [DashboardController::class, 'project_destroy'])->name('project.destroy');


Route::get('admin_lapharian/{id}', [DashboardController::class, 'admin_lapharian'])->name('HalamanAdminlapharian');
Route::get('haltambah_lapharian', [DashboardController::class, 'haltambah_lapharian'])->name('HalamanTambahlapharian');
Route::delete('/lapharian/{lapharian}', [DashboardController::class, 'lapharian_destroy'])->name('lapharian.destroy');
