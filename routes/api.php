<?php

use App\Http\Controllers\Api\EmployeController;
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

Route::group(['middleware'=>['history']], function () {

    /*
     * employee related routes
     * */
    Route::post('/get/all/employees', [EmployeController::class,'employees']);
    Route::post('/employee/store', [EmployeController::class,'store']);
    Route::put('/employee/update{employee}', [EmployeController::class,'update']);
    Route::delete('/employee/remove{employee}', [EmployeController::class,'remove']);

});

