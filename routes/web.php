<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\suplierController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login_proses']);

Route::middleware(['auth', 'cekLevel:superadmin,admin'])->group(function(){

    /**
     * ini routing untuk logout!!!
     */
    Route::get('/logout', [AuthController::class, 'logout']);

    /**
     *  ini routing dashboard Controller
     */
    Route::get('/dashboard', [dashboardController::class, 'index']);
 
    
    /**
     * ini routing untuk pegawai controller
     */
    Route::controller(pegawaiController::class)->group(function(){

        Route::get('/pegawai', 'index');

        Route::post('/pegawai/add', 'store')->name('savePegawai');

        Route::get('/pegawai/edit/{id}', 'edit');
        Route::post('/pegawai/edit/{id}', 'update');

        Route::get('/pegawai/{id}', 'destroy');

    });

    /**
     * ini route stok
     */


     /**
      * ini route barang masuk
      */

      /**
       * ini route barang keluar
       */

       /**
        * ini route pelanggan
        */

        /**
         * ini route suplier
         */
        Route::controller(suplierController::class)->group(function(){
            Route::get('/suplier', 'index');
            
            Route::get('/suplier/add', 'create');
            Route::post('suplier/add', 'store');

            Route::get('suplier/edit/{id}', 'edit');
            Route::post('suplier/edit/{id}', 'update');

            Route::get('/suplier/{id}', 'destroy');
        });




        Route::controller(pelangganController::class)->group(function(){

            Route::get('/pelanggan', 'index');

            Route::get('/pelanggan', 'create');
            Route::post('/pelanggan', 'store');
            




        });

});

