@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{asset('images/logo/logo.png')}}" width="100" alt="">
            </div>
            <div class="col-md-6">
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
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <textarea name="experience" id="experience" cols="65" class="form-control" rows="5" style="resize: none"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea name="bio" id="bio" cols="65" class="form-control" rows="5" style="resize: none"></textarea>
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
                        <p>Bio : {{Auth()->user()->profile->bio}}</p>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Update Cover Letter
                    </div>
                    <div class="card-body">
                       <input type="file" class="form-control" name="cover_letter">
                        <button class="btn btn-success mt-2 float-right" type="submit">Update</button>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Update Resume
                    </div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="resume">
                        <button class="btn btn-success mt-2 float-right" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
