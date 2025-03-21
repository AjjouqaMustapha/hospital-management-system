<?php

use App\Http\Controllers\dashboard\dashboardController;
use App\Http\Controllers\dashboard\DoctorController;
use App\Http\Controllers\dashboard\SectionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        ################### dashboard ###################
        ################### user ###################
    
        Route::get('/dashboard/user', function () {
            return view('dashboard.user.dashboard');
        })->middleware(['auth'])->name('dashboard.user');
        ################### end user ###################
    
        ################### admin ###################
    
        Route::get('/dashboard/admin', function () {
            return view('dashboard.admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');
        ################### endadmin ###################
        ################### end dashboard ###################
    
        //--------------------------------------------------------------------------------------------------
    
        Route::middleware(['auth:admin'])->group(function () {

            ################### section ###################

            Route::resource('Sections', SectionController::class);
            
            ################### end section ###################

            ################### Doctors ###################

            Route::put('Doctors/update_password', [DoctorController::class, 'update_password'])->name('Doctors.update_password');
            Route::put('Doctors/update_status', [DoctorController::class, 'update_status'])->name('Doctors.update_status');
            
            Route::resource('Doctors', DoctorController::class);

            ################### end Doctors ###################
    
        });






        require __DIR__ . '/auth.php';

    }
);

