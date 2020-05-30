<?php

namespace App\Http\Controllers;

use App\Mail\SendJobMail;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
class EmailController extends Controller
{
    public function send(Request $request){
        $this->validate($request,[
            'your_name' => 'required|string',
            'your_email' => 'required|email',
            'friend_name' => 'required|string',
            'friend_email' => 'required|email',
        ]);
        $homeUrl = url('/');
        $jobId = $request->get('job_id');
        $jobSlug = $request->get('job_slug');
        $jobUrl = $homeUrl.'/'.'jobs/'.$jobId.'/'.$jobSlug;

        $data = array(
            'your_name' => $request->get('your_name'),
            'your_email' => $request->get('your_email'),
            'friend_name' => $request->get('friend_name'),
            'job_url' => $jobUrl
        );

        $emailTo = $request->get('friend_email');
        try {
            Mail::to($emailTo)->send(new SendMail($data));
            return redirect()->back()->with('message', 'Job sent to ' . $emailTo);
        }catch(\Exception $e){
            return redirect()->back()->with('err_message', 'Something went wrong. Please try again later!');
        }

    }
}
