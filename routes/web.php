<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Http\Request;

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

//__Email Varification__//

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//__Verifay Noticed__//

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Auth::routes();

//__Varification Resand__//
Route::post('/email/verify', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//__Email Varification__//

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//__Verifay Noticed__//

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Auth::routes();

//__Varification Resand__//
Route::post('/email/verify', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
//__Password Change__//
Route::get('pasword/change',[App\Http\Controllers\HomeController::class,'password_change'])->name('password.change')->middleware(['auth','verified']);
Route::post('pasword/change',[App\Http\Controllers\HomeController::class,'update_password'])->name('update.password')->middleware(['auth','verified']);
//__Create Categori__//
Route::get('catagori/create',[App\Http\Controllers\Admin\CatagoriController::class,'catagori_create'])->name('catagori.create')->middleware(['auth','verified']);
Route::post('catagori/create',[App\Http\Controllers\Admin\CatagoriController::class,'store'])->name('catagori.store')->middleware(['auth','verified']);
Route::get('catagori/index',[App\Http\Controllers\Admin\CatagoriController::class,'index'])->name('catagori.index')->middleware(['auth','verified']);
Route::get('catagori/edit/{id}',[App\Http\Controllers\Admin\CatagoriController::class,'edit'])->name('catagori.edit')->middleware(['auth','verified']);
Route::post('catagori/update/{id}',[App\Http\Controllers\Admin\CatagoriController::class,'update'])->name('catagori.update')->middleware(['auth','verified']);
Route::get('catagori/delete/{id}',[App\Http\Controllers\Admin\CatagoriController::class,'destroy'])->name('catagori.delete')->middleware(['auth','verified']);

//__Classes Query Bilder__//
Route::get('classes/create',[App\Http\Controllers\Admin\ClassesController::class,'classes_create'])->name('classes.create')->middleware(['auth','verified']);
Route::post('classes/create',[App\Http\Controllers\Admin\ClassesController::class,'store'])->name('classes.store')->middleware(['auth','verified']);
Route::get('classes/index',[App\Http\Controllers\Admin\ClassesController::class,'index'])->name('classes.index')->middleware(['auth','verified']);
Route::get('classes/edit/{id}',[App\Http\Controllers\Admin\ClassesController::class,'edit'])->name('classes.edit')->middleware(['auth','verified']);
Route::post('classes/update/{id}',[App\Http\Controllers\Admin\ClassesController::class,'update'])->name('classes.update')->middleware(['auth','verified']);
Route::get('classes/delete/{id}',[App\Http\Controllers\Admin\ClassesController::class,'destroy'])->name('classes.delete')->middleware(['auth','verified']);

//__Students Query Bilder__//
Route::resource('students',StudentController::class)->middleware(['auth','verified']);

//__subcatagori Query Bilder__//
Route::get('subcatagori/create',[App\Http\Controllers\Admin\SubcatagoriController::class,'subcatagori_create'])->name('subcatagori.create')->middleware(['auth','verified']);
Route::post('subcatagori/create',[App\Http\Controllers\Admin\SubcatagoriController::class,'store'])->name('subcatagori.store')->middleware(['auth','verified']);
Route::get('subcatagori/index',[App\Http\Controllers\Admin\SubcatagoriController::class,'index'])->name('subcatagori.index')->middleware(['auth','verified']);
Route::get('subcatagori/edit/{id}',[App\Http\Controllers\Admin\SubcatagoriController::class,'edit'])->name('subcatagori.edit')->middleware(['auth','verified']);
Route::post('subcatagori/update/{id}',[App\Http\Controllers\Admin\SubcatagoriController::class,'update'])->name('subcatagori.update')->middleware(['auth','verified']);
Route::get('subcatagori/delete/{id}',[App\Http\Controllers\Admin\SubcatagoriController::class,'delete'])->name('subcatagori.delete')->middleware(['auth','verified']);



