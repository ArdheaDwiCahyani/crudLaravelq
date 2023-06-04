<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\alternatif_kosController;
use App\Http\Controllers\kriteriaController;
use App\Http\Controllers\penilaianController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\sub_kriteriaController;
use App\Http\Controllers\hasilController;
use App\Http\Controllers\pemilikController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');    
}) -> name('dashboard'); 

Route::controller(adminController::class) -> prefix('admin') -> group(function () {
    Route::get('/', 'index') -> name('admin');
    Route::get('tambah', 'tambah') -> name('admin.tambah');
    Route::post('tambah', 'simpan') -> name('admin.tambah.simpan');
    Route::get('edit/{id}', 'edit') -> name('admin.edit');
    Route::post('edit/{id}', 'update') -> name('admin.tambah.update');
    Route::get('hapus/{id}', 'hapus') -> name('admin.hapus');
    Route::get('/pdfadmin', 'cetak')->name('pdfadmin');
});

Route::controller(userController::class) -> prefix('user') -> group(function () {
    Route::get('/', 'index') -> name('user');
    Route::get('tambah', 'tambah') -> name('user.tambah');
    Route::post('tambah', 'simpan') -> name('user.tambah.simpan');
    Route::get('edit/{id}', 'edit') -> name('user.edit');
    Route::post('edit/{id}', 'update') -> name('user.tambah.update');
    Route::get('hapus/{id}', 'hapus') -> name('user.hapus');
    Route::get('/pdfuser', 'cetak')->name('pdfuser');
});

Route::controller(alternatif_kosController::class) -> prefix('alternatif_kos') -> group(function () {
    Route::get('', 'index') -> name('alternatif_kos');
    Route::get('tambah', 'tambah') -> name('alternatif_kos.tambah');
    Route::post('tambah', 'simpan') -> name('alternatif_kos.tambah.simpan');
    Route::get('edit/{id}', 'edit') -> name('alternatif_kos.edit');
    Route::post('edit/{id}', 'update') -> name('alternatif_kos.tambah.update');
    Route::get('hapus/{id}', 'hapus') -> name('alternatif_kos.hapus');
    Route::get('getkriteria', 'getkriteria')->name('getkriteria');
    Route::get('/pdfkos', 'cetak')->name('pdfkos');
});

Route::controller(pemilikController::class) -> prefix('pemilik') -> group(function () {
    Route::get('/', 'index') -> name('pemilik');
    Route::get('tambah', 'tambah') -> name('pemilik.tambah');
    Route::post('tambah', 'simpan') -> name('pemilik.tambah.simpan');
    Route::get('edit/{id}', 'edit') -> name('pemilik.edit');
    Route::post('edit/{id}', 'update') -> name('pemilik.tambah.update');
    Route::get('hapus/{id}', 'hapus') -> name('pemilik.hapus');
    Route::get('/pdfpemilik', 'cetak')->name('pdfpemilik');
});

Route::post('/submit-form', 'FormController@submitForm');

Route::post('/upload', function () {
    $image = request()->file('image');
    $imageName = $image->getClientOriginalName();
    $image->move(public_path('images'), $imageName);
    return view('image', ['imageName' => $imageName]);
  });

Route::controller(kriteriaController::class) -> prefix('kriteria') -> group(function () {
    Route::get('', 'index') -> name('kriteria');
    Route::get('tambah', 'tambah') -> name('kriteria.tambah');
    Route::post('tambah', 'simpan') -> name('kriteria.tambah.simpan');
    Route::get('edit/{id}', 'edit') -> name('kriteria.edit');
    Route::post('edit/{id}', 'update') -> name('kriteria.tambah.update');
    Route::get('hapus/{id}', 'hapus') -> name('kriteria.hapus');
});

Route::controller(sub_kriteriaController::class) -> prefix('sub_kriteria') -> group(function () {
    Route::get('', 'index') -> name('sub_kriteria');
    Route::get('tambah', 'tambah') -> name('sub_kriteria.tambah');
    Route::post('tambah', 'simpan') -> name('sub_kriteria.tambah.simpan');
    Route::get('edit/{id}', 'edit') -> name('sub_kriteria.edit');
    Route::post('edit/{id}', 'update') -> name('sub_kriteria.tambah.update');
    Route::get('hapus/{id}', 'hapus') -> name('sub_kriteria.hapus');
});

Route::controller(RoleController::class) -> prefix('role') -> group(function () {
    Route::get('', 'index') -> name('role');
    Route::get('tambah', 'tambah') -> name('role.tambah');
    Route::post('tambah', 'simpan') -> name('role.tambah.simpan');
    Route::get('edit/{id}', 'edit') -> name('role.edit');
    Route::post('edit/{id}', 'update') -> name('role.tambah.update');
    Route::get('hapus/{id}', 'hapus') -> name('role.hapus');
    Route::get('/pdfrole', 'cetak') -> name('pdfrole');
});

Route::controller(penilaianController::class) -> prefix('penilaian') -> group(function () {
    Route::get('', 'index') -> name('penilaian');
    Route::get('tambah', 'tambah') -> name('penilaian.tambah');
    Route::post('tambah', 'simpan') -> name('penilaian.tambah.simpan');
    Route::get('edit/{id}', 'edit') -> name('penilaian.edit');
    // Route::post('edit/{id}', 'update') -> name('penilaian.tambah.update');
    // Route::get('hapus/{id}', 'hapus') -> name('penilaian.hapus');
});

Route::controller(hasilController::class) -> prefix('hasil') -> group(function () {
    Route::get('', 'index') -> name('hasil');
    Route::get('tambah', 'tambah') -> name('hasil.tambah');
    Route::post('tambah', 'simpan') -> name('hasil.tambah.simpan');
    // Route::get('edit/{id}', 'edit') -> name('hasil.edit');
    // Route::post('edit/{id}', 'update') -> name('hasil.tambah.update');
    // Route::get('hapus/{id}', 'hapus') -> name('hasil.hapus');
});





