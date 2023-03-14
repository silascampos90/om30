<?php

use App\Http\Controllers\PatientController;
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

Route::get('/', [PatientController::class, 'view'])->name('view.patient');
Route::get('/patient/list', [PatientController::class, 'list'])->name('list.patient');
Route::get('/patient/upload', [PatientController::class, 'upload'])->name('upload.patient');
Route::get('/patient/update/{id}', [PatientController::class, 'show'])->name('show.patient');
