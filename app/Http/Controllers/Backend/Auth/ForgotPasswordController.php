<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\ForgotPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class ForgotPasswordController extends Controller
{
   
    public function showForgotPasswordForm()
    {
        return view('backend.auth.sendMail');
    }    

    public function checkSendMail(Request $request)
    {
        $checkdata=Admin::where('email',$request->email)->first();
        if(!$checkdata){

            return redirect()->route('admin.forgotPassword')->with('error', 'Email not found');
        }

        // dd(route('admin.forgotPassword'));
        $token=md5(Str::random(14));
        $input['serial'] =md5(Str::random(14));
        $input['created_at'] = now(); // Use Laravel's now() helper to get the current datetime
        $input['id_user'] =$checkdata->id;
        $input['_status']="Active";
        $input['token'] =$token;

        ForgotPassword::create($input);

        $data = [
            'subject' => "Forgot Password",
            'name' =>$checkdata->name,
            'body' => 'Hey! Forgot Password Your Password ? Reset Now'. '<br><a href="https://example.com/reset-password">Click here to reset your password</a>',
            'link'=>route('admin.forgotPassword.verifyToken', ['token' => $token]),
            'type'=>'fogot password'
        ];
        
        Mail::to($request->email)->send(new SendMail($data));

        return redirect()->route('admin.forgotPassword')->with('success', 'Email Sent');
    }
    
    public function verifyToken($token){

        $tokencheck=ForgotPassword::where('token',$token)->first();

        if(!$tokencheck){
            return redirect()->route('admin.login',compact('tokencheck'));
        }

        return view('backend.auth.changePassword',compact('tokencheck'));
    }

    public function checkPassword(Request $request){


        $tokencheck=ForgotPassword::where('serial',$request->serial)->first();

        if($request->password != $request->password_confirmation){
            
            return view('backend.auth.changePassword')->with('error', 'Password Not Match');
        }

        $result = ForgotPassword::where('serial',$request->serial)->update(['_status'=>'Non Active']);

        $admin = Admin::find($tokencheck->id_user);
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('admin.login')->with('success', 'Password Update Success');
    }
}
