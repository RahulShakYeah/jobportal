<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Job;
use App\Company;
use Auth;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer')->except('index', 'show', 'apply', 'allJobs');
    }

    public function index()
    {
        $job = Job::orderBy('created_at', 'DESC')->where('status', 1)->take(10)->get();
        $company = Company::latest()->get()->random(12);
        return view('welcome', compact('job', 'company'));
    }

    public function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(JobPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
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
        return redirect()->back()->with('message', 'Job Posted Successfully');
    }

    public function myJob()
    {
        $job = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjob', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message', 'Job Updated Successfully');
    }

    public function apply(Request $request, $id)
    {
        $job_id = Job::findOrFail($id);
        $job_id->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Application Submitted Successfully');
    }

    public function applicant()
    {
        $applicant = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicant', compact('applicant'));
    }

    public function downloadCoverLetter($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        $file = public_path() . "/coverletter/" . $profile->cover_letter;
        $headers = array(
            'Content-Type: application/docx',
        );
        return \Response::download($file, "CoverLetter" . $profile->id . ".docx", $headers);
    }

    public function downloadResume($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        $file = public_path() . "/resume/" . $profile->resume;
        $headers = array(
            'Content-Type: application/docx',
        );
        return \Response::download($file, "Resume" . $profile->id . ".docx", $headers);
    }

    public function allJobs(Request $request)
    {
        $keyword = $request->get('title');
        $type = $request->get('type');
        $category_id = $request->get('category_id');
        $address = $request->get('address');


        if ($keyword||$type||$category_id||$address) {
            $job = Job::where('title','LIKE','%'.$keyword.'%')
                    ->orWhere('type',$type)

                ->orwhere('address',$address)
                ->orWhere('category_id',$category_id)

                ->paginate(10);


            return view('jobs.alljob', compact('job'));
        } else {
            $job = Job::where('status', 1)->paginate(10);
            return view('jobs.alljob', compact('job'));
        }
    }
}
