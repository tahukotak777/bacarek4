<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;

// get route
Route::get('/', [IndexController::class, "Home"]);
Route::get('/National', [IndexController::class,'National']);
Route::get('/International', function () {
    return view('International');
});
Route::get('/Economy', function () {
    return view('Economy');
});
Route::get('/Sports', function () {
    return view('Sports');
});
Route::get('/Technology', function () {
    return view('Technology');
});
Route::get('/Automotive', function () {
    return view('Automotive');
});
Route::get('/Entertainment', function () {
    return view('Entertainment');
});

Route::get('/Login', [indexController::class, 'Login']);
Route::get('/SignUp', function () {
    return view('SignUp');
});

Route::get('/Upload', [indexController::class,'Upload']);
Route::get('/Profile', [indexController::class,'Profile']);
Route::get('/Profile/Edit', [indexController::class,'ProfileEdit']);
Route::get('/Edit/{idBerita}', [indexController::class,'Edit']);
Route::get('/DetailBerita/{idBerita}', [indexController::class,'DetailBerita']);

//get tetapi cuman buat klik
Route::get("/DeleteBerita/{idBerita}", [BeritaController::class,"destroy"]);
Route::get('/MemberikanHak/{idAccount}', [AccountController::class,'BeriHak']);
Route::get('/MencabutHak/{idAccount}', [AccountController::class,'CabutHak']);
Route::get('/Logout', [AccountController::class,'Logout']);

//post route
Route::post('/CreateAccount', [AccountController::class, "store"]);
Route::post('/LoginAccount', [AccountController::class, "index"]);  
Route::post('/UploadBerita', [BeritaController::class, "store"]);  
Route::post('/EditBerita/{idBerita}', [BeritaController::class, "update"]);
Route::post('/EditProfile', [AccountController::class, "update"]);