<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ('Welcome');
});

Route::get('/event',function(){
    $events=[
        'comptia', 'Cognitia', 'Internal Event', 'Mini Expo', 'Final'
    ];
    return $events;
});


//b)Implement a route that allows users to view details of a specific event by passing the event name as a parameter in the URL. 
Route::get('/events/{name}',function($name){
    $events=[
        'Cognitia'=>'A coding event',
        'InternalEvent' => 'An event conducted within the department.',
        'MiniExpo' => 'Students showcase their mini projects.',
        'FinalExpo' => 'Final year project exhibition.'
    ];
    if(array_key_exists($name,$events)){            //Check karo ki $events array me "Cognitia" naam ki key present hai ya nahi.
        return "<h2>$name   $events[$name]";
    }
});


Route::get('/student/{name}/{number}/{branch?}',function($name,$number,$branch='cse'){
     return "Name is ". $name . "and branch is $branch $number";
})->where(['name'=>'[a-zA-Z]+','number'=>'[0-9]{3}']);


// 1. Developer Profile (Required Parameter)
Route::get('/developer/{name}', function ($name) {
    return "Developer Profile: $name";
});

// 2. Developer Name and Project (Multiple Parameters)
Route::get('/developer/{name}/project/{project}', function ($name, $project) {
    return "Developer: $name <br> Project: $project";
});

// 3. Optional Experience Parameter
Route::get('/profile/{name}/{experience?}', function ($name, $experience = null) {

    if ($experience) {
        return "Developer: $name <br> Experience: $experience years";
    }

    return "Developer: $name <br> Experience: Not Provided";
});

// 4. Constraint Routing (Only Numeric Employee IDs)
Route::get('/employee/{id}', function ($id) {
    return "Employee ID: $id";
})->where('id', '[0-9]+');

// 5. Admin Route Group
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return "Google Admin Dashboard";
    });

    Route::get('/developers', function () {
        return "Manage Developers";
    });

    Route::get('/reports', function () {
        return "Project Reports";
    });

});

// 6. Fallback Route
Route::fallback(function () {
    return "404 – Google Developer Portal Page Not Found";
});



Route::get('/page1', function () {
    return "Page 1";
});

Route::get('/back', function () {
    return redirect()->back();
});


use App\Http\Controllers\ProductController;

Route::get('/add', [ProductController::class, 'store']);

Route::get('/show', [ProductController::class, 'index']);

Route::get('/update/{id}', [ProductController::class, 'updateProduct']);

Route::get('/delete/{id}', [ProductController::class, 'destroy']);

