<?php

use App\Http\Controllers\FileCsvController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('patient/store', [PatientController::class, 'store'])->name('store.patient');
Route::post('patient/update', [PatientController::class, 'update'])->name('update.api.patient');
Route::post('patient/cep/find', [PatientController::class, 'cepFind'])->name('cep.find.patient');
Route::post('patient/remove', [PatientController::class, 'remove'])->name('remove.api.patient');
Route::get('patient/find', [PatientController::class, 'getPatientByCpfOrName'])->name('find.api.patient');

Route::post('patient/file/upload', [FileCsvController::class, 'uploadCsv'])->name('upload.file.patient');
