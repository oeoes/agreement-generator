<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    return factory('App\User', 10)->make();
});

Route::post('/download', function() {
    $pdf = PDF::loadView('export', [
        'no_surat' => request('no_surat'),
        'pihak_pertama' => request('pihak_pertama'),
        'jab_pihak_pertama' => request('jab_pihak_pertama'),
        'pihak_kedua' => request('pihak_kedua'),
        'ktp' => request('ktp'),
        'alamat' => request('alamat'),
        'nominal' => request('nominal'),
        'mulai_bayar' => request('mulai_bayar'),
        'bank' => request('bank'),
        'nasabah' => request('nasabah'),
        'norek' => request('norek'),
        'wakil_pihak_pertama' => request('wakil_pihak_pertama'),
        'jab_wakil_pihak_pertama' => request('jab_wakil_pihak_pertama'),
        'hari' => request('hari'),
        'tgl' => request('tgl'),
        'tgl_teks' => request('tgl_teks'),
        'tahun_teks' => request('tahun_teks'),
        'bulan' => request('bulan'),
        'tahun' => request('tahun'),
        'tgl_mulai' => request('tgl_mulai'),
        'tgl_selesai' => request('tgl_selesai'),
        'header_footer' => request('header_footer')
        ]);
        
    $content = $pdf->download()->getOriginalContent();
    $name = 'kontrak_'.\Carbon\Carbon::now().'.pdf';
    Storage::disk('local')->put($name, $content);

    return response()->download(storage_path().'/app/'.$name, $name, ['Content-Type' => ' application/pdf'])->deleteFileAfterSend();
});
