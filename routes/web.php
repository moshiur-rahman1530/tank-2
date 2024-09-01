<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\LcController;
use App\Http\Controllers\TankController;
use App\Http\Controllers\TankPositionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }else{
       return view('auth.login'); 
    }
});

// Route::get('/', function () {
//     if (Auth::check()) {
//         return redirect()->route('dashboard');
//     }
//     return view('auth.login');
// })->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'ShowAllDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('ports', PortController::class);
    Route::resource('certificates', CertificateController::class);
    Route::resource('lcs', LcController::class);
    Route::resource('tanks', TankController::class);
    Route::resource('positions', TankPositionController::class);
    Route::get('/autocomplete', [LcController::class, 'autocomplete'])->name('lc.autocomplete');
    
    Route::get('/auto_lc', [TankPositionController::class, 'auto_lc'])->name('auto_lc');   
    Route::get('/auto_tank', [TankPositionController::class, 'auto_tank'])->name('auto_tank');   
    Route::post('/getlc', [TankPositionController::class, 'getlc'])->name('getlc');   
    Route::post('/upgetlc', [TankPositionController::class, 'upgetlc'])->name('upgetlc');   
    Route::post('/updateposition/{id}', [TankPositionController::class, 'PositionUpdate'])->name('updateposition');   

    Route::post('/positionDelete', [TankPositionController::class, 'positionDelete'])->name('positionDelete');   
    Route::post('/showPosition', [TankPositionController::class, 'showPosition'])->name('showPosition');   





    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/register_form_role', [App\Http\Controllers\UserController::class, 'register_form_role'])->name('register_form_role');



    // Tank position
    // Route::get('/brands', 'TankPositionController@index')->middleware('admin');
    // Route::post('/brands', 'TankPositionController@store')->middleware('admin');
    Route::get('/alltankposition', 'App\Http\Controllers\TankPositionController@alltankposition');
    Route::post('/positionDetails','App\Http\Controllers\TankPositionController@TankPositionDetails')->name('positions.positionDetails');
    // Route::get('/positions', 'App\Http\Controllers\TankPositionController@index')->name('positions.index');
    Route::get('/getpositionbyid', 'App\Http\Controllers\TankPositionController@getpositionbyid')->name('positions.getpositionbyid');


    // lc

    Route::get('/allLc', 'App\Http\Controllers\LcController@allLc');
    Route::post('/lcDetailId','App\Http\Controllers\LcController@lcDetailId');
    Route::post('/updatelc/{id}', [LcController::class, 'updatelc'])->name('updatelc');   
    Route::post('/LcsDelete', [LcController::class, 'LcsDelete'])->name('LcsDelete');   
    Route::post('/lcShow', [LcController::class, 'lcShow'])->name('lcShow');   

  
    // tanks

    Route::get('/allTanks', 'App\Http\Controllers\TankController@allTanks')->name('tanks.allTanks');
    Route::post('/TanksDetails','App\Http\Controllers\TankController@TanksDetails');
    Route::post('/updatetank/{id}', [TankController::class, 'updatetank'])->name('updatetank');   
    Route::post('/TanksDelete', [TankController::class, 'TanksDelete'])->name('TanksDelete');   
    Route::post('/showsingletank', [TankController::class, 'showsingletank'])->name('showsingletank');   
    Route::get('/tanks/view/{id}', [TankController::class, 'viewtank'])->name('tanks.view');   



// port

    Route::get('/allPorts', 'App\Http\Controllers\PortController@allPorts');
    Route::post('/PortsDetails','App\Http\Controllers\PortController@PortsDetails');
    Route::post('/updatePort/{id}', [PortController::class, 'updatePort'])->name('updatePort');   
    Route::post('/PortsDelete', [PortController::class, 'PortsDelete'])->name('PortsDelete');   
    Route::post('/showsinglePort', [PortController::class, 'showsinglePort'])->name('showsinglePort');   


});
    // Route::get('/auto_lc', [LcController::class, 'auto_lc'])->name('auto_lc');

    require __DIR__.'/auth.php';
    Auth::routes();