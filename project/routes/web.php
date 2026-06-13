<?php

use Illuminate\Support\Facades\Route;               //This imports Laravel's Route class.

Route::get('/',function(){
    return 'welcome';
});


// if we want to return more then one line for that we can use echo   -- "<br>"->for next line
    Route::get('/abc123',function(){
        echo"Hello ", "<br>";
        return "welocome";
    });


// Dynamic Route Parameter
    Route::get('/user/{id}',function($id){
        return "User Id: ".$id;
    });


//optional parameter
    Route::get('/user/{name?}',function($name="Rishabh"){
        return "my name is ".$name;
    });


//MULTIPLE PARAMETERS
    Route::get('/post/{post}/comment/{comment}',function($post,$comment){
        return "Post are $post and comment $comment";
    });


//static table 
    Route::get('/table',function(){
        for($i=0;$i<10;$i++){
            echo("2 * $i = ". 2*$i)."<br>";
        }
    });

//Dynamic table
// double quotes ke andar likhoge to vaise ke vaise he value printt hogi $ lagaoge to var aayega
    Route::get('/table/{num?}',function($num){
        for($i=1;$i<=10;$i++){
            echo("$num * $i = ". $num*$i)."<br>";
        }
    })->whereNumber('num');


//Student info using mult para  ***********************************************
    Route::get('/student/{sname}/{rollNo}/{section}',function($sname,$rollNo,$section){
        return "Student name is : {$sname} ". "<br>". "and roll no is {$rollNo} ". "<br>" . "and section is {$section}";
    })->where(['sname'=>'[a-zA-Z]+', 'rollNo'=>'[0-9]+','section'=>'[A-Za-z0-9]+']);


// Runs when no route matches.
Route::fallback(function(){
    return "<h1>Not found";
});


//***************************************************************REDIRECTS
    Route::get('/welcome',function(){
        return redirect('/');
    });


//shortcut to redirect
    Route::redirect('/welcome','/');
 

//Redirect with json response       -> with json resonse we write redirectTo()
    Route::get('/json3',function(){
        return response()->redirectTo('/json2');
    });



//redirect to named route
//creating named route
    Route::get('/hom',function(){
        return "this is named route of home";
    })->name('home');

    Route::get('/ghar',function(){
        return redirect()->route('home');
    });


//****************************************************************named route ******
    Route::get('/house',function(){
        return route('home');                //Gives URL
        // redirect()->route('home')       Opens that page named route 
    });




Route::get('/home',function(){
    return view('home');
});

Route::get('/about',function(){
    return view('about');
})->name('aboutUs');


// ************************************************************Global Route Constraints
// pehle hume app service provider me jaaba public function boot()::void{}

        Route::get('/product/{id}', function($id){
            return "Product ID is ".$id;
        });


//slug - Route Parameter with Regular Expressions
    Route::get('/post/{slug}', function ($slug) {
        return $slug;
    })->where('slug', '[A-Za-z0-9-]+');




//********************************************************VIEWS
Route::get('/table/{num}',function($num){
    return view('table',['num'=>$num]);
});


//Passing data to views
// 1)Using Associative array
    Route::get('/first',function(){
        return view('first',['name'=>'Rishabh', 'age'=>20]);
    });

    //dynamically passing data
    Route::get('/first/{name}/{age}', function($name, $age) {
        return view('first', [
            'name' => $name,
            'age'  => $age
        ]);
    });



// 2) Using with 
    Route::get('/first',function(){
        return view('first')->with('name','Rishabh')->with('id',5);
    });

    Route::get('/first/{name}/{id}', function($name, $id) {
        return view('first')
                ->with('name', $name)
                ->with('id', $id);
    });



// 3)Using withName
    Route::get('/first', function () {
        return view('first')
                ->withName('Rishabh')
                ->withAge(20)
                ->withCity('Delhi');
    });

    Route::get('/first/{name}/{age}', function($name, $age) {
        return view('first')
                ->withName($name)
                ->withAge($age);
    });



// 4) using compact
    Route::get('/first', function () {
        $name = "Rishabh";
        return view('first', compact('name'));
    });

//Dynamically data
    Route::get('/first/{id}/{name}',function($name,$id){
        return view('first',compact('name','id'));
    });



Route::get("/new", function()
{
    return view("n1",["arr"=>["a,b,c,d,e,f"]]); //static data
});



// Check sHARING DATA WITH ALL VIEW IN /NEW AND FROM ONE NOTES

// *************************************************Response- Attaching Headers ************************************

Route::get('/home',function(){
    return response('this is home page')->header('name','Rishabh');
});

//multiple headers
    Route::get('/home', function () {
        return response("Welcome")
                ->header('Name', 'Rishabh')
                ->header('Age', '20');
    });


//ATTACHING multiple header
    Route::get('/home1',function(){
        return response('welcome')
            ->withHeaders([
                'name'=>'Rishu',
                'age'=>21
            ]);
    }) ;


//view Response 

Route::get('/hi',function(){
    return response()->view('welcome');
});


Route::get('/json',function(){
    return response()->json([
        'name'=>'Rishabh',
        'age'=>21,
        'class'=>323
    ]);
});

Route::get('/json2',function(){
    $student=[
        'name'=>'Rishabhhh',
        'age'=>211,
        'class'=>323
    ];
    // return($student);
    return response()->json($student);
});


//Custom status codes along with header
Route::get('/notFound',function(){
    return response('Page not found',400);
    return response("Not Found", 404)
	    ->header('Error', 'Page Missing');

});


// adding header via routes  / Content-Type Header
    Route::get('/header',function(){
        return response('Hello this is response with headder')
            ->header('Content-type','text/plain');  
            // ->header('Content-Type', 'application/json');
    });

//JSON RESPONSE WITH HEADER
    Route::get('/jsonHead',function(){
        return response()->json([
            'name'=>'Rishabh',
            'sec'=>'323'
        ])->header('Content-type','application/json');
    });



// ******************************************************************** Attaching Cookies***********************

//Single cookie set
    Route::get('/set-cookies',function(){
        $cookies=cookie('name','rishabh',3);
        return response('Cookies set')
            ->cookie($cookies);
    });

//multiple cookies 
    Route::get('/set-cookes',function(){
        $cookie1=cookie('name','rishabh',3);
        $cookie2=cookie('age','21',3);
        $cookie3=cookie('sec','323',3);

        return response('Cookies set')
            ->cookie($cookie1)
            ->cookie($cookie2)
            ->cookie($cookie3);
    });


//getting cookies
    Route::get('/get-cookie',function(){
        $userName=request()->cookie('name');
        //if more then 1 cookie
        // $userName=request()->cookie('name');

        return response("UserName is " . ($userName ?? "Cookies not found"));
    });


//deleting cookies
    Route::get('/delete-cookies',function(){
        $cookie=cookie::forget('name');
        return response("Cookies deleted")->withCookie($cookie);
    });


    Route::get('/stud',function(){
        $student=[
            ['name'=>'Rishabh','age'=>20,'sec'=>323],
            ['name'=>'Rishabh','age'=>20,'sec'=>323],
            ['name'=>'Rishabh','age'=>20,'sec'=>323],
        ];
        return view('student',compact('student'));
    });

//view folder k andar view file hoti h ->subview

    Route::get('/sub-view',function(){
        return view('admin.hello');
    });


 // using direct view method
    Route::view("/sbv","admin.hello");


// Laravel Redirections
    Route::get('/about', function () {
        return "About Page";
    });

    Route::get('/home', function () {
        return redirect('/about');
    });


//Redirect with Data
    Route::get('/dashboard',function(){
        return "this is dashboard";
    });
    Route::get('/login', function () {
        return redirect('/dashboard')
                ->with('success', 'Login Successful');
    });



//Redirect with json response       -> with json resonse we write redirectTo()
Route::get('/json3',function(){
    return response()->redirectTo('/json2');
});



// Redirect to Named Route
Route::get('/dashboard',function(){
    return 'This is a dashboard';
})->name('dashboard');

Route::get('/login',function(){
    return redirect()->route('dashboard');
});


// Dynamic Parameter with Named Route
Route::get('/stu/{name}', function ($name) {
    return "Student name " . $name;
})->name('student');

Route::get('/home', function () {
    return redirect()->route('student', ['name' => 10]);
});