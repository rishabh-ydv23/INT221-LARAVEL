<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\ResourceController;
use App\Http\Middleware\ValidUser;
use App\Http\Middleware\CountryCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// BASIC CONTROLLERS
Route::get('/read',[FirstController::class,'read']);
Route::get('/table/{nbr}',[FirstController::class,'show']);         //Controller with Parameters
Route::get('/student',[FirstController::class,'student']);

 
//SINGLE CONTROLLER  -> This controller contains only one method called __invoke().
use App\Http\Controllers\SingleController;
Route::get('/single',SingleController::class);


//Resource Controller --> A resource controller is used for CRUD operations (Create, Read, Update, Delete).
Route::resource('/user',ResourceController::class);


//Group Routing
Route::controller(FirstController::class)->group(function(){
    Route::get('/read','read');
    Route::get('/table/{num}','show');
});


//Route prefixing
Route::prefix('/first')->controller(FirstController::class)->group(function(){
    Route::get('/readd','read');
    Route::get('/table/{nbr}','show');
});


//MIDDLEWARE
Route::get('/data/{age}',function($age){
    return view('data',compact('age'));
})->middleware(ValidUser::class);

Route::get('/data/{country}',function($country){
    return view('data',compact('country'));
})->middleware(CountryCheck::class);



//TEMPLATE INHERITANCE / LAYOUT  -> checck first layout.blade.php
Route::get('/home',function(){
    return view('home');
});

//in placee of writing complete function this is shortcut to write view  -> Route::view() is a shortcut method in Laravel.
Route::view("/contact", "contact");

Route::view("/func", "function")->middleware(Validuser::class);


Route::get('/read/{age}',[FirstController::class,'read'])->middleware(ValidUser::class);

Route::get('/read/{nums}',[FirstController::class,'read'])->middleware(ValidUser::class,CountryCheck::class);

//Group Middleware ->👉 Instead of writing the same middleware again and again on every route,
Route::middleware([ValidUser::class,CountryCheck::class])->group(function(){     //-> if multiple middleware
//if one middleware 
// Route::middleware(ValidUser::class)->group(function(){
    Route::view('/data','data');
    Route::view('/welcome','welcome');
});


//CONTROLLER MIDDLEWARE

// controller middleware -> Middleware is attached directly inside the controller instead of routes. *************************************
use App\Http\Controllers\AdminController;
Route::get('/homee',[AdminController::class,'home']);


// Route::get("/admin",[AdminController::class,"show"]);

// examples Controller
// use App\Http\Controllers\SecondController;
// Route::get("/second",[SecondController::class,"read"]);


//DOMAIN ROUTING
// http://127.0.0.1:8000/ho -> have to search this in url
Route::domain('127.0.0.1')->group(function(){
    Route::get('/ho',function(){
        return "Admin page";
    });
});


//URL GENERATION
// Current URL
Route::get('/current/url', function () {
    return url()->current();
});

Route::get('/full/url', function () {
    return url()->full();
});

Route::get('/about', function () {
    return url()->previous();
});


Route::get('/test', function () {
    return url()->to('/about');                     //http://127.0.0.1:8000/about
});



//normal php
Route::get("/fun/{n}", function($n){
    return view("function",compact('n'));
});


Route::get('/current', function () {
    return url()->current();
});


// Route::get('/test', function () {
//     return url()->full();
// });

Route::get('/back', function () {
    return url()->previous();
});


Route::get('/generate', function () {
    return url('/home');
});

Route::get('/user-url', function () {
    return url('/user/10');
});


//named route url 
Route::get('/profile/{id}', function ($id) {
    return "Profile";
})->name('profile');

Route::get('/test', function () {
    return route('profile', ['id' => 5]);
});

Route::get('/asset', function () {
    return view('asset');
});


Route::get('/asset-url', function () {
    return asset('images/logo.png');
});

// Route::get('/test', function () {
//     return url()->to('/about');
// });

// Generate Asset URL for CSS and Image files.

Route::get('/assetdemo', function () {

    echo asset('css/style.css');
    echo "<br>";

    echo asset('images/logo.png');

});