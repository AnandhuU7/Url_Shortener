<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Models\Url;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get("/url",[UrlController::class,'create']);
Route::post("/url",[UrlController::class,'store']);
Route::get("/url/{url}/edit",[UrlController::class,'edit']);
Route::put("/url/{url}",[UrlController::class,'update']);
Route::delete("/url/{url}",[UrlController::class,'destroy']);
Route::middleware(['auth'])->group(function () {
    Route::get("/list", [UrlController::class, 'index']);
});
Route::post("/shortend",[UrlController::class,"shortend"]);