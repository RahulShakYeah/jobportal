<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\Job;
use App\Company;
use Auth;
use App\Category;
use App\Http\Requests\JobPostRequest;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer', 'verified'])->except('index', 'show', 'apply', 'allJobs');
    }

    public function index()
    {
        $job = Job::latest()->where('status', 1)->take(5)->get();
        $category = Category::with('jobs')->get();
        $company = Company::latest()->get()->random(12);
        return view('welcome', compact('job', 'company','category'));
    }

    public function show($id, Job $job)
    {
        //$data = [];
        $jobBasedOnCategory = Job::latest()
                                ->where('category_id',$job->category_id)
            //use to identify the expired job
//                                ->whereDate('last_date','>',date('Y-m-d'))
                                ->where('id','!=',$job->id)
                                ->where('status',1)
                                ->limit(4)
                                ->get();
        //array_push($data,$jobBasedOnCategory);
        //$collection = collect($data);
        //$unique = $collection->unique("id(unique component required)");
        //$finalData = $unique->values()->all();
        return view('jobs.show', compact('job','jobBasedOnCategory'));
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
            'last_date' => $request->get('last_date'),
            'number_of_vacancy' => $request->get('number_of_vacancy'),
            'year_of_experience' => request('year_of_experience'),
            'salary' => request('salary')
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
        \DB::table('jobs')->where('id',$id)->update(array('slug' => \Str::slug($request->get('title'))));
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
        $search = $request->get('search');
        $address = $request->get('address');

        if($search && $address){
            $job = Job::where('title','LIKE','%'.$search.'%')
                        ->where('status',1)
                        ->orWhere('position','LIKE'.'%'.$search.'%')
                        ->orWhere('type','LIKE','%'.$search.'%')
                        ->orWhere('address','LIKE','%'.$address.'%')
                        ->paginate(10);
            return view('jobs.alljob', compact('job'));
        }

        $keyword = $request->get('title');
        $type = $request->get('type');
        $category_id = $request->get('category_id');
        $address = $request->get('address');


        if ($keyword || $type || $category_id || $address) {
            $job = Job::where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('type', $type)
                ->orwhere('address', $address)
                ->orWhere('category_id', $category_id)
                ->paginate(10);


            return view('jobs.alljob', compact('job'));
        } else {
            $job = Job::where('status', 1)->paginate(10);
            return view('jobs.alljob', compact('job'));
        }
    }
}
