<?php
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'welcome';
});

Route::view('/form','form');

//before using request must import  use Illuminate\Http\Request;
// Route::post('/submit', function (Request $request) {
// 	return $request->name;
// });

Route::post('/submit',[UserController::class,'submit']);


//FILE UPLOAD
Route::view('/upld','fileupload');
Route::post('/upload',[UploadController::class,'upload']);
Route::view('/display','displayimage');


//EMAIL
Route::get('/email',[EmailController::class,'sendmail']);

 
//laravel localisation
//1) create lang folder
//2)create en/fr folder ->return []

Route::view('/en','welcome');       //default english opage
Route::get('/local/{lang}',function($lang){
    App::setLocale($lang);
    return view('local');
});

//create view file



//SESSIONS
//Chech all sessions
Route::get('/all',function(){
    $value=session()->all();
    echo"<pre>";
    print_r($value);
    echo"<pre>";
});

//Storing or creating sessions
Route::get('/store-session',function(){
    session(['user'=>"Rishabh"]);           //M1=>Session helper
    session()->put('class','laravel');      //M2=>using put
    echo "Session created";
    return redirect('/all');
});

//read or get sessions
Route::get('/get-session',function(){
    $val=session()->get('class');
    $value=session('user');                     //session helper syntax
    echo "The value of session ". $val . "<br>";
    echo "The session helper syntax". $value;
});

//delete session
Route::get('delete-session',function(){
    session()->forget('user');
    echo" session deleted";
});

//delete all sessions
Route::get('/destroy',function(){
    session()->flush();
    echo "all session deleted";
});

// | Method              | Work                |
// | ------------------- | ------------------- |
// | session()->all()    | Get all sessions    |
// | session()->put()    | Store session       |
// | session()->get()    | Read session        |
// | session()->forget() | Delete one session  |
// | session()->flush()  | Delete all sessions |


//CHECK ONCE CLASS CODE FOR SESSION WITH CONTROLLER  --> must check classCodeu1





// use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('/lan', function () {

    if(session()->has('locale'))
    {
        App::setLocale(session('locale'));
    }

    return view('home');
});

Route::get('/change-language/{lang}', function ($lang) {

    session(['locale' => $lang]);

    return redirect('/lan');
});