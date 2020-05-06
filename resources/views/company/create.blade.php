@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth()->user()->company->logo))
                    <img src="{{asset('images/logo/logo.png')}}" width="100" style="width:100%" alt="">
                @else
                    <img src="{{asset('logo/'.Auth::user()->company->logo)}}" width="100" style="width:100%"
                         alt="">
                @endif
                <br><br>
                <div class="card">
                    <div class="card-header">
                        Update your avatar
                    </div>
                    <div class="card-body">
                        <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-control" name="logo" required>
                            @error('logo')
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
                        Update your company information
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('company.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                       value="{{Auth::user()->company->address}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="number" name="phone" id="phone" class="form-control"
                                       value="{{Auth::user()->company->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" name="website" id="website" class="form-control"
                                       value="{{Auth::user()->company->website}}">
                            </div>
                            <div class="form-group">
                                <label for="slogan">Slogan</label>
                                <input type="text" name="slogan" id="slogan" class="form-control"
                                       value="{{Auth::user()->company->slogan}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="65" class="form-control" rows="5"
                                          style="resize: none">{{Auth::user()->company->description}}</textarea>
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
                        Your Company Information
                    </div>
                    <div class="card-body">
                        <p>Company Name : {{Auth()->user()->company->company_name}}</p>
                        <p>Company Email : {{Auth()->user()->email}}</p>
                        <p>Company Website : {{Auth()->user()->company->website}}</p>
                        <p>Company Slogan : {{Auth()->user()->company->slogan}}</p>
                        <p>Company Address : {{Auth()->user()->company->address}}</p>
                        <p>Company Phone number : {{Auth()->user()->company->phone}}</p>
                        <p>Company Description : {{Auth()->user()->company->description}}</p>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Cover photo
                    </div>
                    <div class="card-body">
                        @if(empty(Auth()->user()->company->cover_photo))
                            <p class="alert alert-danger">Please upload your cover photo</p>
                        @else
                            <img src="{{asset('coverphoto/'.Auth()->user()->company->cover_photo)}}" width="100" style="width:100%" alt="">
                        @endif
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        Update Cover Photo
                    </div>
                    <div class="card-body">
                        <form action="{{route('company.coverphoto')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="form-control" name="cover_photo">
                            @error('cover_photo')
                            <p class="alert alert-danger mt-2">{{$message}}</p>
                            @enderror
                            <button class="btn btn-success mt-2 float-right" type="submit">Update</button>
                        </form>
                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
