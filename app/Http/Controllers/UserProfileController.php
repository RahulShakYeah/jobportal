<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
class UserProfileController extends Controller
{
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
}
