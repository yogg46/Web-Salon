<?php

use App\Http\Controllers\userController;
use App\Http\Livewire\Admin\Index;
use App\Http\Livewire\Profil;
use App\Http\Livewire\Gudang\Barang;
use App\Http\Livewire\Gudang\PembelianController;
use App\Http\Livewire\Gudang\PengambilanController;
use App\Http\Livewire\Gudang\SuplierController;
use App\Http\Livewire\Kasir\JasaController;
use App\Http\Livewire\Kasir\KasirController;
use App\Http\Livewire\Kasir\LaporanKasir;
use App\Http\Livewire\Kasir\Laporan2Kasir;
use App\Models\Barang as ModelsBarang;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login2');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

// Route::resource('user', userController::class);
Route::get('/user', Index::class)->middleware('auth', 'checkRole:admin')->name('user');
Route::get('/profil', Profil::class)->middleware('auth')->name('profil');
Route::get('/barang', Barang::class)->middleware('auth', 'checkRole:gudang')->name('barang');
Route::get('/pengambilan', PengambilanController::class)->middleware('auth', 'checkRole:gudang')->name('pengambilan');
Route::get('/suplier', SuplierController::class)->middleware('auth', 'checkRole:gudang')->name('suplier');
Route::get('/pembelian', PembelianController::class)->middleware('auth', 'checkRole:gudang')->name('pembelian');
Route::get('/kasir', KasirController::class)->middleware('auth', 'checkRole:kasir')->name('kasir');
Route::get('/jasa', JasaController::class)->middleware('auth', 'checkRole:kasir')->name('jasa');
Route::get('/laporan-pemasukan', LaporanKasir::class)->middleware('auth', 'checkRole:kasir,bos')->name('laporan-pemasukan');
Route::get('/laporan-pengeluaran', Laporan2Kasir::class)->middleware('auth', 'checkRole:kasir,bos')->name('laporan-pengeluaran');
Route::view('/welcome', 'kasir', ['tittle' => 'Taylor']);
// Route::view('/welcome', 'Admin.add', ['tittle' => 'Taylor']);
Route::get('/bar', [userController::class, 'index']);
