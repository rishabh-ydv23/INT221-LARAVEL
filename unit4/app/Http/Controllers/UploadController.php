<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        echo "file uploaded successfully <br>";
        $path = $request->file('file')->store('images', 'public');    //Ye line file ko save karti hai.    -> storage/app/public/images/     folder me file save karega.
        //$path = "images/h7s82j3k.jpg";
        // explode kya karta hai?   ->String ko tod deta hai.

        // $fileArray = explode('/', $path);
        // $filename = $fileArray[1];
        // return view('displayimage', [
        //     'path' => 'images/' . $filename
        // ]);
    }
}  