<?php

use App\Http\Controllers\dashboard\AmbulanceController;
use App\Http\Controllers\dashboard\dashboardController;
use App\Http\Controllers\dashboard\DoctorController;
use App\Http\Controllers\dashboard\SectionController;
use App\Http\Controllers\dashboard\SingleServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Livewire\CreateGroupServices;
use Livewire\Livewire;
use \App\Http\Controllers\dashboard\InsuranceController;
use \App\Http\Controllers\dashboard\PatientController;

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

        Livewire::setUpdateRoute(fn($handle) => Route::post('/livewire/update', $handle));

        Livewire::setScriptRoute(fn($handle) => Route::get('/livewire/livewire.js', $handle));

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
            
            ################### Service ###################
            Route::resource('Service', SingleServiceController::class);
            ################### End Service ###################

            ################### Insurence ###################
            Route::resource('Insurances', InsuranceController::class);
            ################### End Insurence ###################

            ################### Ambulance ###################
            Route::resource('Ambulance', AmbulanceController::class);
            ################### End Ambulance ###################

            ################### Patient ###################
            Route::put('Patient/update_password', [PatientController::class, 'update_password'])->name('Patient.update_password');
            Route::resource('Patient', PatientController::class);
            #################### End Patient ###################
            
            ################### Groupe services route ###################
            Route::view('Add_GroupServices', 'livewire.GroupServices.include_create')->name('Add_GroupServices');

        });
        require __DIR__ . '/auth.php';

    }
);

