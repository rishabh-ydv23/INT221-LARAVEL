<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    public function sendmail(Request $request){
        $toemail='rishabhyadavunnao@gmail.com';
        $message='hi, whats up';
        $subject='Greetings';
        
        Mail::to($toemail)->send(
            new WelcomeMail($message,$subject)
        );
        return "Email send successfully";
    }
}
