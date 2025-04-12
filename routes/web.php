<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::pattern('id', '[0-9]+');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu
    // masukkan semua route yang perlu autentikasi di sini

    Route::get('/', [WelcomeController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update-foto', [ProfileController::class, 'updateFoto'])->name('profile.updateFoto');

    Route::middleware(['authorize:ADM,MNG'])->group(function() {
        Route::get('/level', [LevelController::class, 'index']);
        Route::post('/level/list', [LevelController::class, 'list']);
        Route::get('/level/create_ajax', [LevelController::class, 'create_ajax']); // ajax form create
        Route::post('/level_ajax', [LevelController::class, 'store_ajax']); // ajax store
        Route::get('/level/{id}/detail_ajax', [LevelController::class, 'detail_ajax']);
        Route::get('/level/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // ajax form edit
        Route::put('/level/{id}/update_ajax', [LevelController::class, 'update_ajax']); // ajax update
        Route::get('/level/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // ajax form confirm
        Route::delete('/level/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // ajax delete
        Route::get('/level/import', [LevelController::class, 'import']); // ajax form upload excel
        Route::post('/level/import_ajax', [LevelController::class, 'import_ajax']); // ajax import excel
        Route::get('/level/export_excel', [LevelController::class, 'export_excel']); // export excel
        Route::get('/level/export_pdf', [LevelController::class, 'export_pdf']); // export pdf
    });

    Route::middleware(['authorize:MNG'])->group(function() {
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::post('/kategori/list', [KategoriController::class, 'list']);
        Route::get('/kategori/create_ajax', [KategoriController::class, 'create_ajax']); // ajax form create
        Route::post('/kategori_ajax', [KategoriController::class, 'store_ajax']); // ajax store
        Route::get('/kategori/{id}/detail_ajax', [KategoriController::class, 'detail_ajax']);
        Route::get('/kategori/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // ajax form edit
        Route::put('/kategori/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // ajax update
        Route::get('/kategori/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // ajax form confirm
        Route::delete('/kategori/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // ajax delete
        Route::get('/kategori/import', [KategoriController::class, 'import']); // ajax form upload excel
        Route::post('/kategori/import_ajax', [KategoriController::class, 'import_ajax']); // ajax import excel
        Route::get('/kategori/export_excel', [KategoriController::class, 'export_excel']); // export excel
        Route::get('/kategori/export_pdf', [KategoriController::class, 'export_pdf']); // export pdf

        Route::get('/barang', [BarangController::class, 'index']);
        Route::post('/barang/list', [BarangController::class, 'list']);
        Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']); // ajax form create
        Route::post('/barang_ajax', [BarangController::class, 'store_ajax']); // ajax store
        Route::get('/barang/{id}/detail_ajax', [BarangController::class, 'detail_ajax']);
        Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // ajax form edit
        Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']); // ajax update
        Route::get('/barang/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // ajax form confirm
        Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // ajax delete
        Route::get('/barang/import', [BarangController::class, 'import']); // ajax form upload excel
        Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
        Route::get('/barang/export_excel', [BarangController::class, 'export_excel']); // export excel
        Route::get('/barang/export_pdf', [BarangController::class, 'export_pdf']); // export pdf
    });

    Route::middleware(['authorize:STF'])->group(function() {
        Route::get('/supplier', [SupplierController::class, 'index']);
        Route::post('/supplier/list', [SupplierController::class, 'list']);
        Route::get('/supplier/create_ajax', [SupplierController::class, 'create_ajax']); // ajax form create
        Route::post('/supplier_ajax', [SupplierController::class, 'store_ajax']); // ajax store
        Route::get('/supplier/{id}/detail_ajax', [SupplierController::class, 'detail_ajax']);
        Route::get('/supplier/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // ajax form edit
        Route::put('/supplier/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // ajax update
        Route::get('/supplier/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // ajax form confirm
        Route::delete('/supplier/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // ajax delete
        Route::get('/supplier/import', [SupplierController::class, 'import']); // ajax form upload excel
        Route::post('/supplier/import_ajax', [SupplierController::class, 'import_ajax']); // ajax import excel
        Route::get('/supplier/export_excel', [SupplierController::class, 'export_excel']); // export excel
        Route::get('/supplier/export_pdf', [SupplierController::class, 'export_pdf']); // export pdf
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/list', [UserController::class, 'list']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/create_ajax', [UserController::class, 'create_ajax']);
        Route::post('/ajax', [UserController::class, 'store_ajax']);
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/{id}', [UserController::class, 'update']);
        Route::get('/{id}/detail_ajax', [UserController::class, 'detail_ajax']);
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
        Route::get('/import', [UserController::class, 'import']);
        Route::post('/import_ajax', [UserController::class, 'import_ajax']);
        Route::get('/export_excel', [UserController::class, 'export_excel']);
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/export_pdf', [UserController::class, 'export_pdf']); // export pdf
    });   
});
    // Route::group(['prefix' => 'user'], function () {
    //     Route::get('/', [UserController::class, 'index']);
    //     Route::post('/list', [UserController::class, 'list']);
    //     Route::get('/create', [UserController::class, 'create']);
    //     Route::post('/', [UserController::class, 'store']);
    //     Route::get('/create_ajax', [UserController::class, 'create_ajax']);
    //     Route::post('/ajax', [UserController::class, 'store_ajax']);
    //     Route::get('/{id}', [UserController::class, 'show']);
    //     Route::get('/{id}/edit', [UserController::class, 'edit']);
    //     Route::put('/{id}', [UserController::class, 'update']);
    //     Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
    //     Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
    //     Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
    //     Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
    //     Route::delete('/{id}', [UserController::class, 'destroy']); 
    // });
    
    // Route::group(['prefix' => 'level'], function () {
    //     Route::get('/', [LevelController::class, 'index']);
    //     Route::post('/list', [LevelController::class, 'list']);
    //     Route::get('/create', [LevelController::class, 'create']);
    //     Route::post('/', [LevelController::class, 'store']);
    //     Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
    //     Route::post('/ajax', [LevelController::class, 'store_ajax']);
    //     Route::get('/{id}', [LevelController::class, 'show']);
    //     Route::get('/{id}/edit', [LevelController::class, 'edit']);
    //     Route::put('/{id}', [LevelController::class, 'update']);
    //     Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
    //     Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
    //     Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
    //     Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
    //     Route::delete('/{id}', [LevelController::class, 'destroy']);
    // });
    
    // Route::group(['prefix' => 'kategori'], function () {
    //     Route::get('/', [KategoriController::class, 'index']);
    //     Route::post('/list', [KategoriController::class, 'list']);
    //     Route::get('/create', [KategoriController::class, 'create']);
    //     Route::post('/', [KategoriController::class, 'store']);
    //     Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
    //     Route::post('/ajax', [KategoriController::class, 'store_ajax']);
    //     Route::get('/{id}', [KategoriController::class, 'show']);
    //     Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    //     Route::put('/{id}', [KategoriController::class, 'update']);
    //     Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
    //     Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
    //     Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
    //     Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
    //     Route::delete('/{id}', [KategoriController::class, 'destroy']);
    // });
    
    // Route::group(['prefix' => 'barang'], function () {
    //     Route::get('/', [BarangController::class, 'index']);
    //     Route::post('/list', [BarangController::class, 'list']);
    //     Route::get('/create', [BarangController::class, 'create']);
    //     Route::post('/', [BarangController::class, 'store']);
    //     Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
    //     Route::post('/ajax', [BarangController::class, 'store_ajax']);
    //     Route::get('/{id}', [BarangController::class, 'show']);
    //     Route::get('/{id}/edit', [BarangController::class, 'edit']);
    //     Route::put('/{id}', [BarangController::class, 'update']);
    //     Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
    //     Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
    //     Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
    //     Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
    //     Route::delete('/{id}', [BarangController::class, 'destroy']);
    // });
    
    // Route::group(['prefix' => 'supplier'], function () {
    //     Route::get('/', [SupplierController::class, 'index']);
    //     Route::post('/list', [SupplierController::class, 'list']);
    //     Route::get('/create', [SupplierController::class, 'create']);
    //     Route::post('/', [SupplierController::class, 'store']);
    //     Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
    //     Route::post('/ajax', [SupplierController::class, 'store_ajax']);
    //     Route::get('/{id}', [SupplierController::class, 'show']);
    //     Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    //     Route::put('/{id}', [SupplierController::class, 'update']);
    //     Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
    //     Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
    //     Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
    //     Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
    //     Route::delete('/{id}', [SupplierController::class, 'destroy']);
    // });