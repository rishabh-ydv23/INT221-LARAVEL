<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function read($nums){
        
        return "the numsber os $nums";
    }

    public function show($nbr){
        return view('table',compact('nbr'));
        // return "value is $nbr";
    } 

    public function student(){
        $student=[
            ['id'=>1, 'name'=>'Rishabh'],
            ['id'=>2, 'name'=>'Ri'],
            ['id'=>3, 'name'=>'Rish']
        ];
        return view('student',compact('student'));
    }
}

