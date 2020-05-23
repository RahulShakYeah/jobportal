<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegistrationController extends Controller
{
    public function employerRegister(Request $request){
//        $this->validate($request,[
//            'company_name' => 'required',
//            'email' => 'required|string|email|unique:users',
//            'password' => 'required|string|min:8|confirmed'
//        ]);

        $euser =  User::create([
            'email' => request('email'),
            'user_type' => request('user_type'),
            'password' => Hash::make(request('password')),
        ]);

        Company::create([
            'user_id' => $euser->id,
            'company_name' => request('cname'),
            'slug' => \Str::slug(request('cname'))
        ]);

        $euser->sendEmailVerificationNotification();

        return redirect()->back()->with('message','A verification link has been sent to your email. Please
        follow the link to verify it');
    }
}
