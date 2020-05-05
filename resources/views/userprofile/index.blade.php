@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('avatar/'.Auth()->user()->profile->avatar)}}" width="100" style="width:100%" alt="">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        Update your avatar
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.avatar')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-control" name="avatar" required>
                            @error('avatar')
                            <p class="alert alert-danger mt-2">{{$message}}</p>
                            @enderror
                            <button class="btn btn-success mt-2 float-right" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Update your profile
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('profile.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                       value="{{Auth()->user()->profile->address}}">
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <textarea name="experience" id="experience" cols="65" class="form-control" rows="5"
                                          style="resize: none">{{Auth()->user()->profile->experience}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea name="bio" id="bio" cols="65" class="form-control" rows="5"
                                          style="resize: none">{{Auth()->user()->profile->bio}}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Your Information
                    </div>
                    <div class="card-body">
                        <p>Name : {{Auth()->user()->name}}</p>
                        <p>Email : {{Auth()->user()->email}}</p>
                        <p>Address : {{Auth()->user()->profile->address}}</p>
                        <p>Experience : {{Auth()->user()->profile->experience}}</p>
                        <p>Gender : {{Auth()->user()->profile->gender}}</p>
                        <p>Bio : {{Auth()->user()->profile->bio}}</p>
                        <p>Member from: {{date('F d Y',strtotime(Auth()->user()->created_at))}}</p>
                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p>Download : <a href="{{route('download.coverletter')}}">Cover Letter</a></p>
                        @else
                            <p class="alert alert-danger">Please Upload Your Cover Letter</p>
                        @endif
                        @if(!empty(Auth::user()->profile->resume))
                            <p>Download : <a href="{{route('download.resume')}}">Resume</a></p>
                        @else
                            <p class="alert alert-danger">Please Upload Your Resume</p>
                        @endif
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Update Cover Letter
                    </div>
                    <div class="card-body">
                        <form action="{{route('cover.letter')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-control" name="cover_letter" required>
                            @error('cover_letter')
                                <p class="alert alert-danger mt-2">{{$message}}</p>
                            @enderror
                            <button class="btn btn-success mt-2 float-right" type="submit">Update</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Update Resume
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.resume')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-control" name="resume" required>
                            @error('resume')
                            <p class="alert alert-danger mt-2">{{$message}}</p>
                            @enderror
                            <button class="btn btn-success mt-2 float-right" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
