<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
class UserProfileController extends Controller
{
    public function __construct(){
        $this->middleware('seeker');
    }

    public function index(){
        return view('userprofile.index');
    }

    public function store(Request $request){
        $user_id = auth()->user()->id;
        $id = auth()->user()->profile->id;
        $profile = Profile::findOrFail($id);
        $address = $request->get('address');
        $experience = $request->get('experience');
        $bio = $request->get('bio');
        if(isset($address)){
            $address = $request->get('address');
        }else{
            $address = $profile->address;
        }
        if(isset($experience)){
            $experience = $request->get('experience');
        }else{
            $experience = $profile->experience;
        }
        if(isset($bio)){
            $bio = $request->get('bio');
        }else{
            $bio = $profile->bio;
        }
        Profile::where('user_id',$user_id)->update([
            'address' => $address,
            'experience' => $experience,
            'bio' => $bio
        ]);
        return redirect()->back()->with('message','Profile Successfully Updated');
    }

    public function coverLetter(Request $request){
        $this->validate($request,[
            'cover_letter' => 'required'
        ]);
        $user_id = Auth()->user()->id;
        $id = Auth()->user()->profile->id;
        $profile = Profile::findOrFail($id);
        if($request->hasFile('cover_letter')){
            $file = request('cover_letter');
            $old_path = public_path().'/coverletter/'.$profile->cover_letter;
            if(\File::exists($old_path)){
                \File::delete($old_path);
            }
            $path = public_path().'/coverletter/';
            $fileName = 'CoverLetter_'.time().rand(0,9999).$file->getClientOriginalName();
            $file->move($path,$fileName);

            Profile::where('user_id',$user_id)->update([
                'cover_letter' => $fileName
            ]);
            return redirect()->back()->with('message','Cover Letter Successfully Updated');
        }
    }

    public function resume(Request $request){
        $this->validate($request,[
            'resume' => 'required'
        ]);
        $user_id = Auth()->user()->id;
        $id = Auth()->user()->profile->id;
        $profile = Profile::findOrFail($id);
        if($request->hasFile('resume')){
            $file = request('resume');
            $old_path = public_path().'/resume/'.$profile->resume;
            if(\File::exists($old_path)){
                \File::delete($old_path);
            }
            $path = public_path().'/resume/';
            $fileName = 'Resume_'.time().rand(0,9999).$file->getClientOriginalName();
            $file->move($path,$fileName);

            Profile::where('user_id',$user_id)->update([
                'resume' => $fileName
            ]);
            return redirect()->back()->with('message','Resume Successfully Updated');
        }
    }

    public function avatar(Request $request){
        $this->validate($request,[
            'avatar' => 'required'
        ]);
        $user_id = Auth()->user()->id;
        $id = Auth()->user()->profile->id;
        $profile = Profile::findOrFail($id);
        if($request->hasFile('avatar')){
            $file = request('avatar');
            $old_path = public_path().'/avatar/'.$profile->avatar;
            if(\File::exists($old_path)){
                \File::delete($old_path);
            }
            $path = public_path().'/avatar/';
            $fileName = 'Avatar_'.time().rand(0,9999).$file->getClientOriginalName();
            $file->move($path,$fileName);

            Profile::where('user_id',$user_id)->update([
                'avatar' => $fileName
            ]);
            return redirect()->back()->with('message','Avatar Successfully Updated');
        }
    }
}
