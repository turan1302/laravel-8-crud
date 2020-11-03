<?php

use App\Http\Controllers\MemberController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix'=>'members','as'=>'members.'],function (){
    Route::get('',[MemberController::class,'index'])->name('index');
    Route::post('',[MemberController::class,'store'])->name('store');
    Route::group(['prefix'=>'{member}'],function (){
        Route::delete('',[MemberController::class,'destroy'])->name('destroy');
        Route::get('edit',[MemberController::class,'edit'])->name('edit');
        Route::patch('',[MemberController::class,'update'])->name('update');
    });
});
