<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\KerjaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DkInstansiController;
use App\Http\Controllers\MouInternationalController;
use App\Http\Controllers\NKesepahamanController;
use App\Http\Controllers\NkInstansiController;
use App\Http\Controllers\NpKerjasamaController;
use App\Http\Controllers\NpkInstansiController;
use Illuminate\Support\Facades\Auth;
use Novay\WordTemplate\WordTemplate;

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


// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('auth.login');
})->name('home');
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::middleware('role.admin')->group(function() {
        Route::prefix('admin/')->name('admin.')->group(function() {
            Route::get('/home', [HomeController::class, 'notif'])->name('home');
            Route::prefix('nota/')->name('nota.')->group(function () {
                Route::get('/', [NotaController::class, 'index'])->name('index');
                Route::get('/edit/{id}', [NotaController::class, 'edit'])->name('edit');
                Route::post('/store', [NotaController::class, 'store'])->name('store');
                Route::put('/update/{id}', [NotaController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [NotaController::class, 'destroy'])->name('destroy');
                Route::get('cetak/{id}', [NotaController::class, 'cetak'])->name('cetak');
            });
            Route::prefix('kerja/')->name('kerja.')->group(function () {
                Route::get('/', [KerjaController::class, 'index'])->name('index');
                Route::get('/create', [KerjaController::class, 'create'])->name('create');
                Route::post('/store', [KerjaController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [KerjaController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [KerjaController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [KerjaController::class, 'destroy'])->name('destroy');
                Route::get('cetak/{id}', [KerjaController::class, 'cetak'])->name('cetak');
            });
            Route::prefix('draft/')->name('draft.')->group(function () {
                Route::get('/', [DkInstansiController::class, 'index'])->name('index');
                Route::get('/create', [DkInstansiController::class, 'create'])->name('create');
                Route::post('/store', [DkInstansiController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [DkInstansiController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [DkInstansiController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [DkInstansiController::class, 'destroy'])->name('destroy');
                Route::get('download/{id}', [DkInstansiController::class, 'download'])->name('download');
            });
            Route::prefix('mou/')->name('mou.')->group(function () {
                Route::get('/', [MouInternationalController::class, 'index'])->name('index');
                Route::get('/create', [MouInternationalController::class, 'create'])->name('create');
                Route::post('/store', [MouInternationalController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [MouInternationalController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [MouInternationalController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [MouInternationalController::class, 'destroy'])->name('destroy');
                Route::get('download/{id}', [MouInternationalController::class, 'download'])->name('download');
            });
            Route::prefix('pks/')->name('pks.')->group(function () {
                Route::get('/', [NpKerjasamaController::class, 'index'])->name('index');
                Route::get('/create', [NpKerjasamaController::class, 'create'])->name('create');
                Route::post('/store', [NpKerjasamaController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [NpKerjasamaController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [NpKerjasamaController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [NpKerjasamaController::class, 'destroy'])->name('destroy');
                Route::get('download/{id}', [NpKerjasamaController::class, 'download'])->name('download');
            });
            Route::prefix('nota_kesepahaman/')->name('nota_kesepahaman.')->group(function () {
                Route::get('/', [NKesepahamanController::class, 'index'])->name('index');
                Route::get('/create', [NKesepahamanController::class, 'create'])->name('create');
                Route::post('/store', [NKesepahamanController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [NKesepahamanController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [NKesepahamanController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [NKesepahamanController::class, 'destroy'])->name('destroy');
                Route::get('download/{id}', [NKesepahamanController::class, 'download'])->name('download');
            });
            Route::prefix('nk_instansi/')->name('nk_instansi.')->group(function () {
                Route::get('/', [NkInstansiController::class, 'index'])->name('index');
                Route::get('/create', [NkInstansiController::class, 'create'])->name('create');
                Route::post('/store', [NkInstansiController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [NkInstansiController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [NkInstansiController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [NkInstansiController::class, 'destroy'])->name('destroy');
                Route::get('download/{id}', [NkInstansiController::class, 'download'])->name('download');
            });
            Route::prefix('npk_instansi/')->name('npk_instansi.')->group(function () {
                Route::get('/', [NpkInstansiController::class, 'index'])->name('index');
                Route::get('/create', [NpkInstansiController::class, 'create'])->name('create');
                Route::post('/store', [NpkInstansiController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [NpkInstansiController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [NpkInstansiController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [NpkInstansiController::class, 'destroy'])->name('destroy');
                Route::get('download/{id}', [NpkInstansiController::class, 'download'])->name('download');
            });
        });
        
    });
});

Route::get('/word', function () {
    $file = public_path('uploads/template/NOMOR.rtf');
    
    $array = array(
        '[NOMOR_SURAT]' => 'SVP/12315/BT/SK/V/2017',
        '[PERUSAHAAN]' => asset('images/logopolkesyoo.png'),
        '[NAMA]' => 'Melani Malik',
        '[NIP]' => '6472065508XXXX',
        '[ALAMAT]' => 'Jl. Manunggal Gg. 8 Loa Bakung, Samarinda',
        '[PERMOHONAN]' => 'Permohonan pengurusan pembuatan NPWP',
        '[KOTA]' => 'Samarinda',
        '[DIRECTOR]' => 'Noviyanto Rahmadi',
        '[TANGGAL]' => date('d F Y'),
    );

    $nama_file = 'surat-kerja.doc';
    
    return WordTemplate::export($file, $array, $nama_file);
});
