<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;
class JobController extends Controller
{
    public function index(){
        $job = Job::orderBy('created_at','DESC')->take(10)->get();
        return view('welcome',compact('job'));
    }

    public function show($id,Job $job){
        return view('jobs.show',compact('job'));
    }

    public function create(){
        return view('jobs.create');
    }

    public function store(JobPostRequest $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => \Str::slug(request('title')),
            'description' => request('description'),
            'roles' => request('roles'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'status' => request('status'),
            'type' => request('type'),
            'last_date' => request('last_date')
        ]);
        return redirect()->back()->with('message','Job Posted Successfully');
    }

    public function myJob(){
        $job = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob',compact('job'));
    }

    public function edit($id){
        $job = Job::findOrFail($id);
        return view('jobs.edit',compact('job'));
    }

    public function update(Request $request,$id){
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message','Job Updated Successfully');
    }
}
