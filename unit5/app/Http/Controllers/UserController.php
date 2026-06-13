<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;

class UserController extends Controller
{
    public function addUser(Request $request){
        $validate=$request->validate([
            'username'=>'required|min:3',
            'useremail'=>'required|email',
            'userage'=>'required|numeric|min:18',
            'city'=>'required'
        ]);

        echo "<  pre>";
        print_r($validate);
        echo "</pre>";

        return "registration successfull";        
    }



//Custom validations 
    // $request->validate(
    //     [ rules ],
    //     [ custom messages ]
    // );

//     public function addUser(Request $request){
//         $val=$request->validate([
//             'username'=>'required|string|min:5',
//             'useremail'=>'required|email',
//             "userage"=>'required|numeric|min:18',
//             'city'=>'required'
//         ],
//         [
//             'username.required'=>"User Name is mandatory.",
//             'username.string'=>'User Name should be string only.',
//             'username.min'=>'User Name length should not be less than 5.',

//             "useremail.required" => "User Email is required",
//             "useremail.email"    => "Enter the correct email address",

//             "userage.required" => "User age is required",
//             "userage.numeric"  => "User age must be a number",
//             "userage.min"      => "User age should not be less than 18",

//             "city.required" => "User City is required"
//         ]);

//         echo "<pre>";
//         print_r($val);
//         echo "</pre>";

//         return "registration successfull";
//     }
// }






public function addEmployee(Request $request)
{
    $val = $request->validate([
        'name' => [
            'required',
            'regex:/^[A-Za-z\s]+$/',
            'min:5',
            'max:10'
        ],

        'email' => [
            'required',
            'email',
            'ends_with:@google.com',
            'unique:employees,email'
        ],

        'password' => [
            'required',
            'confirmed',
            'min:8',
            'regex:/[A-Z]/',
            'regex:/[a-z]/',
            'regex:/[0-9]/',
            'regex:/[@$!%*#?&]/'
        ],

        'phone' => [
            'required',
            'numeric',
            'digits:10'
        ],

        'dob' => [
            'required',
            'date',
            'before_or_equal:' . now()->subYears(24)->format('Y-m-d')
        ]

    ], [

        // Name
        'name.required' => 'Employee name is required.',
        'name.regex' => 'Name should contain only alphabets and spaces.',
        'name.min' => 'Name must contain at least 5 characters.',
        'name.max' => 'Name should not exceed 10 characters.',

        // Email
        'email.required' => 'Email is required.',
        'email.email' => 'Enter a valid email address.',
        'email.ends_with' => 'Email must belong to google.com domain.',
        'email.unique' => 'Email already exists.',

        // Password
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters.',
        'password.confirmed' => 'Password confirmation does not match.',
        'password.regex' => 'Password must contain uppercase, lowercase, number and special character.',

        // Phone
        'phone.required' => 'Phone number is required.',
        'phone.numeric' => 'Phone number must contain only digits.',
        'phone.digits' => 'Phone number must be exactly 10 digits.',

        // DOB
        'dob.required' => 'Date of Birth is required.',
        'dob.before_or_equal' => 'Employee must be at least 24 years old.'
    ]);

    echo "<pre>";
    print_r($val);
    echo "</pre>";

    return "Employee Registration Successful";
}
}