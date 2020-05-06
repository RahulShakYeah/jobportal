<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
{
    public function index($id,Company $company){
        return view('company.index',compact('company'));
    }

    public function create(){
        return view('company.create');
    }

    public function store(Request $request){
        $user_id = auth()->user()->id;
        $id = auth()->user()->company->id;
        $company = Company::findOrFail($id);
        $address = $request->get('address');
        $phone = $request->get('phone');
        $website = $request->get('website');
        $slogan = $request->get('slogan');
        $description = $request->get('description');
        if(isset($address)){
            $address = $request->get('address');
        }else{
            $address = $company->address;
        }
        if(isset($phone)){
            $phone = $request->get('phone');
        }else{
            $phone = $company->phone;
        }
        if(isset($website)){
            $website = $request->get('website');
        }else{
            $website = $company->website;
        }
        if(isset($slogan)){
            $slogan = $request->get('slogan');
        }else{
            $slogan = $company->slogan;
        }
        if(isset($description)){
            $description = $request->get('description');
        }else{
            $description = $company->description;
        }
        Company::where('user_id',$user_id)->update([
            'address' => $address,
            'phone' => $phone,
            'website' => $website,
            'slogan' => $slogan,
            'description' => $description
        ]);
        return redirect()->back()->with('message','Company data Successfully Updated');
    }

    public function logo(Request $request){
        $this->validate($request,[
            'logo' => 'required'
        ]);
        $user_id = Auth()->user()->id;
        $id = Auth()->user()->company->id;
        $company = Company::findOrFail($id);
        if($request->hasFile('logo')){
            $file = request('logo');
            $old_path = public_path().'/logo/'.$company->logo;
            if(\File::exists($old_path)){
                \File::delete($old_path);
            }
            $path = public_path().'/logo/';
            $fileName = 'Companylogo_'.time().rand(0,9999).$file->getClientOriginalName();
            $file->move($path,$fileName);

            Company::where('user_id',$user_id)->update([
                'logo' => $fileName
            ]);
            return redirect()->back()->with('message','Company Logo Successfully Updated');
        }
    }

    public function coverphoto(Request $request){
        $this->validate($request,[
            'cover_photo' => 'required'
        ]);
        $user_id = Auth()->user()->id;
        $id = Auth()->user()->company->id;
        $company = Company::findOrFail($id);
        if($request->hasFile('cover_photo')){
            $file = request('cover_photo');
            $old_path = public_path().'/coverphoto/'.$company->cover_photo;
            if(\File::exists($old_path)){
                \File::delete($old_path);
            }
            $path = public_path().'/coverphoto/';
            $fileName = 'Companycoverphoto_'.time().rand(0,9999).$file->getClientOriginalName();
            $file->move($path,$fileName);

            Company::where('user_id',$user_id)->update([
                'cover_photo' => $fileName
            ]);
            return redirect()->back()->with('message','Company Cover Photo Successfully Updated');
        }
    }
}
