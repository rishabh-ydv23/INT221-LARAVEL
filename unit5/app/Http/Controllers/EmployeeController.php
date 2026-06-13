<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            // NAME
            'name' => [
                'required',
                function ($attribute, $value, $fail) {

                    if (!preg_match('/^[A-Za-z ]+$/', $value)) {
                        $fail('Name should contain only alphabets and spaces.');
                    }

                    if (strlen($value) < 5 || strlen($value) > 10) {
                        $fail('Name must be between 5 and 10 characters.');
                    }
                }
            ],

            // EMAIL
            'email' => [
                'required',
                'email',
                'unique:employees,email',

                function ($attribute, $value, $fail) {

                    if (!str_ends_with($value, '@google.com')) {
                        $fail('Only Google domain emails are allowed.');
                    }
                }
            ],

            // PASSWORD
            'password' => [
                'required',

                function ($attribute, $value, $fail) use ($request) {

                    if (strlen($value) < 8) {
                        $fail('Password must be at least 8 characters.');
                    }

                    if (!preg_match('/[A-Z]/', $value)) {
                        $fail('Password must contain an uppercase letter.');
                    }

                    if (!preg_match('/[a-z]/', $value)) {
                        $fail('Password must contain a lowercase letter.');
                    }

                    if (!preg_match('/[0-9]/', $value)) {
                        $fail('Password must contain a number.');
                    }

                    if (!preg_match('/[@$!%*#?&]/', $value)) {
                        $fail('Password must contain a special character.');
                    }

                    if ($value != $request->password_confirmation) {
                        $fail('Password confirmation does not match.');
                    }
                }
            ],

            // PHONE
            'phone' => [
                'required',

                function ($attribute, $value, $fail) {

                    if (!is_numeric($value)) {
                        $fail('Phone must be numeric.');
                    }

                    if (strlen($value) != 10) {
                        $fail('Phone must be exactly 10 digits.');
                    }
                }
            ],

            // DOB
            'dob' => [
                'required',
                'date',

                function ($attribute, $value, $fail) {

                    $age = Carbon::parse($value)->age;

                    if ($age < 24) {
                        $fail('Employee must be at least 24 years old.');
                    }
                }
            ]

        ]);

        return "Validation Passed";
    }
}