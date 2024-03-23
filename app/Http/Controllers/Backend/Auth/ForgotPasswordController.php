<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
   
    public function showForgotPasswordForm()
    {
        return view('backend.auth.sendMail');
    }    
}
