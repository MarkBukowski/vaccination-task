<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\AppointmentsImport;
use App\Exports\AppointmentsExport;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['prefix' => 'appointments', 'middleware' => 'auth'], function(){
//    authenticated personnel routes
    Route::get('list', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('edit/{appointment}', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::post('update/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::post('delete/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::get('filter', [AppointmentController::class, 'showByDate'])->name('appointments.filter');

//    import/export
    Route::get('export-csv/{date}', [AppointmentController::class, 'export'])->name('appointments.export');
    Route::post('import-csv', [AppointmentController::class, 'import'])->name('appointments.import');
});

// global routes
Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
