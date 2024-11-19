<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataTableController;
use Illuminate\Support\Facades\Validator;


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
    return view('auth.login');
});

// email maziyatulilma@gmail.com pass 888888, sulfa@gmail.com pass 123456

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login-proses',[LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/register-proses',[LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'] , function(){
    Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/peminjaman', [HomeController::class, 'index'])->name('index');
    Route::get('/assets', [HomeController::class, 'asset'])->name('asset');
    Route::get('/user', [HomeController::class, 'user'])->name('user');

    Route::get('/create', [HomeController::class, 'create'])->name('data.create');
    Route::get('/buat', [HomeController::class, 'buat'])->name('asset.buat');
    Route::get('/make', [HomeController::class, 'make'])->name('user.make');

    Route::post('/store', [HomeController::class, 'store'])->name('data.store');
    Route::post('/setor', [HomeController::class, 'setor'])->name('asset.setor');
    Route::post('/fund', [HomeController::class, 'fund'])->name('user.fund');

    Route::get('/clientside', [DataTableController::class, 'clientside'])->name('clientside');
    Route::get('/serverside', [DataTableController::class, 'serverside'])->name('serverside');

    Route::get('/cetak_pdf', [DataTableController::class, 'cetak_pdf'])->name('cetak_pdf');
    Route::get('/data_pdf', [DataTableController::class, 'data_pdf'])->name('data_pdf');
    Route::get('/user_pdf', [DataTableController::class, 'user_pdf'])->name('user_pdf');


    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('data.edit');
    Route::get('/ubah/{id}', [HomeController::class, 'ubah'])->name('asset.ubah');
    Route::get('/change/{id}', [HomeController::class, 'change'])->name('user.change');

    Route::put('/update/{id}', [HomeController::class, 'update'])->name('data.update');
    Route::put('/upgrade/{id}', [HomeController::class, 'upgrade'])->name('asset.upgrade');
    Route::put('/uptodate/{id}', [HomeController::class, 'uptodate'])->name('user.uptodate');

    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('data.delete');
    Route::delete('/hapus/{id}', [HomeController::class, 'hapus'])->name('asset.hapus');
    Route::delete('/hilang/{id}', [HomeController::class, 'hilang'])->name('user.hilang');

});


