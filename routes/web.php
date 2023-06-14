<?php

use App\Http\Controllers\ExportExcel;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\RecipeController;
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
use App\Http\Livewire\Kasir\Laporanfull;
use App\Http\Livewire\PengeluaranLain;
use App\Mail\SendEmail;
use App\Models\Barang as ModelsBarang;
use Illuminate\Support\Facades\Mail;
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
})->name('landing');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::any('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('filter');

// Route::resource('user', userController::class);
Route::get('/user', Index::class)->middleware('auth', 'checkRole:admin')->name('user');
Route::get('/profil', Profil::class)->middleware('auth')->name('profil');
Route::get('/barang', Barang::class)->middleware('auth', 'checkRole:gudang')->name('barang');
Route::get('/pengambilan', PengambilanController::class)->middleware('auth', 'checkRole:gudang')->name('pengambilan');
Route::get('/suplier', SuplierController::class)->middleware('auth', 'checkRole:gudang')->name('suplier');
Route::get('/pembelian', Laporan2Kasir::class)->middleware('auth', 'checkRole:gudang')->name('pembelian');
Route::get('/kasir', KasirController::class)->middleware('auth', 'checkRole:kasir')->name('kasir');
Route::get('/jasa', JasaController::class)->middleware('auth', 'checkRole:kasir')->name('jasa');
Route::get('/laporan-pemasukan', LaporanKasir::class)->middleware('auth', 'checkRole:kasir,bos')->name('laporan-pemasukan');
Route::get('/laporan-pengeluaran', Laporan2Kasir::class)->middleware('auth', 'checkRole:kasir,bos')->name('laporan-pengeluaran');
Route::get('/laporan-pengeluaran-lain', PengeluaranLain::class)->middleware('auth', 'checkRole:kasir,bos')->name('laporan-pengeluaran-lain');
// Route::view('/welcome', 'kasir', ['tittle' => 'Taylor']);
// Route::view('/welcome', 'Admin.add', ['tittle' => 'Taylor']);
Route::get('/bar', [userController::class, 'index']);


Route::get('/print/{id}-{bayar}-{kembalian}-{print}', [RecipeController::class, 'printRecipe']);
Route::get('/print/{id}-{bayar}-{kembalian} ', [PrintController::class, 'index']);

Route::get('/laporan', Laporanfull::class)->middleware('auth');
Route::get('/export-ambil', [ExportExcel::class, 'exportall_ambil'])->name('exportall_ambil');

Route::get('/export-laporan-all', [ExportExcel::class, 'exportall_laporan'])->name('export-excel-laporan-all');
Route::get('/export-laporan', [ExportExcel::class, 'export_laporan'])->name('export-excel-laporan');
Route::get('/export-laporan/{id}', [ExportExcel::class, 'exportbulan_laporan'])->name('export-excel-laporan-bulan');

Route::get('/export-pengeluaran/{id}', [ExportExcel::class, 'exportbulan_pengeluaran'])->name('export-excel-pengeluaran-bulan');
Route::get('/export-pengeluaran', [ExportExcel::class, 'export_pengeluaran'])->name('export-excel-pengeluaran');
Route::get('/export-pengeluaran-all', [ExportExcel::class, 'exportall_pengeluaran'])->name('export-excel-pengeluaran-all');

Route::get('/export-pengeluaran-lain/{id}', [ExportExcel::class, 'exportbulan_pengeluaran_lain'])->name('export-excel-pengeluaran-lain-bulan');
Route::get('/export-pengeluaran-lain', [ExportExcel::class, 'export_pengeluaran_lain'])->name('export-excel-pengeluaran-lain');
Route::get('/export-pengeluaran-lain-all', [ExportExcel::class, 'exportall_pengeluaran_lain'])->name('export-excel-pengeluaran-lain-all');

Route::get('/export', [ExportExcel::class, 'export'])->name('export-excel');
Route::get('/export/{id}', [ExportExcel::class, 'exportbulan'])->name('export-bulan-excel');
Route::get('/exportall', [ExportExcel::class, 'exportall'])->name('export-excel-all');

// Route::get('/send-email',function(){
//     $data = [
//         'name' => 'Syahrizal As',
//         'body' => 'Testing Kirim Email di Santri Koding'
//     ];

//     Mail::to('yogga.bayu46@gmail.com')->send(new SendEmail($data));

// });

// Route::view('/em','layouts.mail');
// Route::get('/em', function () {
//     $data = ['name' => 'John Doe', 'password' => 'johndoe@example.com'];
//     return view('layouts.mail', ['data' => $data]);
// });
