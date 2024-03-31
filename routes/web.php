<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\logincontroller;

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

Route::get('/', [DatabaseController::class, "welcome"])->middleware('auth');
Route::get("/dash", [DatabaseController::class, 'count_data'])->name('dashboard')->middleware('auth');
Route::get("/analytics", [DatabaseController::class, 'analytics'])->middleware('auth');
Route::get("/products", [DatabaseController::class, 'productdata'])->middleware('auth');
Route::get("/search", [DatabaseController::class, 'search'])->name('stockSearch')->middleware('auth');
Route::get("/trash/{id}", [DatabaseController::class, "trashdata"])->middleware('auth');
Route::get("/trashdata", [DatabaseController::class, "trashlist"])->middleware('auth');
Route::get("/restore/{id}", [DatabaseController::class, "restore"])->middleware('auth');
Route::get("/delete/{id}", [DatabaseController::class, "delete"])->middleware('auth');
Route::post("/forcedelete", [DatabaseController::class, "multidelete"])->middleware('auth');
Route::post("/multi-trash", [DatabaseController::class, "multitrash"])->middleware('auth');
Route::get("customers", [DatabaseController::class, 'customerdata'])->middleware('auth');
Route::get("/searchcust", [DatabaseController::class, 'searchcustomer'])->name('custSearch')->middleware('auth');
Route::get("/trashcust/{id}", [DatabaseController::class, "trashcustdata"])->middleware('auth');
Route::get("/trash-custdata", [DatabaseController::class, "trashcustlist"])->middleware('auth');
Route::get("/deletecust/{id}", [DatabaseController::class, "deletecust"])->middleware('auth');
Route::get("/restorecust/{id}", [DatabaseController::class, "restorecust"])->middleware('auth');
Route::post("/multi-trash-cust", [DatabaseController::class, "multitrashcust"])->middleware('auth');
Route::post("/forcedeletecust", [DatabaseController::class, "multideletecust"])->middleware('auth');
Route::post("/restorestock", [DatabaseController::class, "restorestock"])->middleware('auth');
Route::post("/restorecustomer", [DatabaseController::class, "restorecustomer"])->middleware('auth');
Route::get("edit/{id}", [DatabaseController::class, "editprod"])->middleware('auth');
Route::post("updateprod", [DatabaseController::class, "updateprod"])->middleware('auth');
Route::get("/additems", [DatabaseController::class, "additems"])->middleware('auth');
Route::post("/insertprod", [DatabaseController::class, "insertprod"])->middleware('auth');


Route::post("/addorder", [DatabaseController::class, "addorder"])->middleware('auth');
Route::get("/orderplace", [DatabaseController::class, "orderplace"])->middleware('auth');
Route::get("/selectprice", [DatabaseController::class, "selectprice"])->middleware('auth');
Route::get("/changequant", [DatabaseController::class, "changequant"])->middleware('auth');
Route::post("/takeorder", [DatabaseController::class, "takeorder"])->middleware('auth');
Route::get("/viewcust/{bill}", [DatabaseController::class, "viewcust"])->middleware('auth');
Route::get("/downloadcust/{bill}", [DatabaseController::class, "downloadcust"])->middleware('auth');
Route::get("/viewitem/{id}", [DatabaseController::class, "viewitem"]);
/* login system */
Route::get("/login", [logincontroller::class, "login"])->name('login');
Route::get("/register", [logincontroller::class, "register"]);
Route::post("/logindata", [logincontroller::class, "logindata"]);
Route::post("/registerdata", [logincontroller::class, "registerdata"]);
Route::get("/logout", [logincontroller::class, "logout"]);
Route::get("auth/google", [logincontroller::class, "logwithgoogle"])->name('loginwithgoogle');
Route::any("/callback", [logincontroller::class, "callbackfromgoogle"])->name('callback');
