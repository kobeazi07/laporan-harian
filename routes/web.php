<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'HalamanLogin'])->name('HalamanLogin');
Route::post('/login', [DashboardController::class, 'login'])->name('login');
Route::post('/logout', [DashboardController::class, 'user_logout'])->name('Logout');


Route::middleware(['auth', 'role:Admin|Surveyor'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('HalamanDashboard');


    Route::get('admin_project', [DashboardController::class, 'admin_project'])->name('HalamanAdminproject');
    Route::post('/tambah_project', [DashboardController::class, 'tambah_project'])->name('Tambah_project');
    Route::post('/edit_project/{id}', [DashboardController::class, 'edit_project'])->name('Edit_project');
    Route::delete('/project/{project}', [DashboardController::class, 'project_destroy'])->name('project.destroy');


    Route::get('admin_lapharian/{id}', [DashboardController::class, 'admin_lapharian'])->name('HalamanAdminlapharian');
    Route::get('haltambah_lapharian/{id}', [DashboardController::class, 'haltambah_lapharian'])->name('HalamanTambahlapharian');
    Route::get('haledit_lapharian/{id}', [DashboardController::class, 'haledit_lapharian'])->name('HalamanEditlapharian');
    Route::get('/lap-harian/{id}/data-edit', [
        DashboardController::class,
        'getDataEdit'
    ])->name('lapharian.data-edit');
    Route::get('halfoto_lapharian/{id}', [DashboardController::class, 'halfoto_lapharian'])->name('HalamanFotolapharian');
    Route::post('/dokumentasi/upload', [
        DashboardController::class,
        'upload_foto'
    ])->name('dokumentasi.upload');
    Route::delete(
        '/dokumentasi/{dokumentasi}',
        [DashboardController::class, 'hapus_foto']
    )->name('dokumentasi.destroy');
    Route::post('/tambah_lapharian', [DashboardController::class, 'tambah_lapharian'])->name('Tambah_lapharian');
    Route::post(
        '/lap-harian/{id}/update',
        [DashboardController::class, 'Update_lapharian']
    )->name('Update_lapharian');
    Route::delete(
        '/lapharian/{lapharian}',
        [DashboardController::class, 'lapharian_destroy']
    )->name('lapharian.destroy');

    Route::get('/laporan-harian/{id}/cetak', [DashboardController::class, 'cetak_pdf'])
        ->name('laporan-harian.cetak');
    Route::get(
        '/admin/lap_harian/actfoto/{id}',
        [DashboardController::class, 'actfoto']
    )->name('actfoto');
});
