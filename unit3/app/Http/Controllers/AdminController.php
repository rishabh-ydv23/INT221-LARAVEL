<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ValidUser;


class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('ValidUser');

        // middleware applicable to some functions
        $this->middleware('Agecheck')->only("show");//apply to specific function
        $this->middleware('Agecheck')->except("show");// exclude this function

        //multiple middleware
        $this->middleware(['Agechcek',"Countrycheck"]);
    }

    

    public function home(){
        return "this is home";
    }

    public function about(){
        return "This is about";
    }
}
