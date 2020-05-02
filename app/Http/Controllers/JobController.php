<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
class JobController extends Controller
{
    public function index(){
        $job = Job::all()->take(10);
        return view('welcome',compact('job'));
    }

    public function show($id,Job $job){
        return view('jobs.show',compact('job'));
    }
}
