<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegistrationController extends Controller
{
    public function employerRegister(){
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

        return redirect()->to('login');
    }
}
