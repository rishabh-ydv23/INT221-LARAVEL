<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function submit(Request $request){
        //by using input method
        // $name=$request->input('name');
        // $email=$request->input('email');
        
        return $request->all();                         //in place of retrieving req one by one we can retrieve all request at once 

        // echo "Name : ". $name ."<br>";
        // echo "Email : ". $email ."<br>";

    }
}
 