@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Edit Job</div>

                    <div class="card-body">
                        <form action="{{route('job.update',$job->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{$job->title}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                           cols="20" rows="8"
                                          style="resize: none">{{$job->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="roles">Roles</label>
                                <textarea name="roles" id="roles"
                                          class="form-control @error('roles') is-invalid @enderror"
                                           cols="20" rows="8"
                                          style="resize: none">{{$job->roles}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror"
                                        value="{{old('category_id')}}">
                                    @foreach(\App\Category::all() as $category)
                                        <option value="{{$category->id}}" {{$job->category_id == $category->id?"selected":""}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{$job->position}}">
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$job->address}}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="type">Employment Type</label>
                                <select name="type" id="type" class="form-control  @error('type') is-invalid @enderror" value="{{old('type')}}">
                                    <option value="fulltime" {{$job->type == "fulltime"?"selected":""}}>Full Time</option>
                                    <option value="parttime" {{$job->type == "parttime"?"selected":""}}>Part Time</option>
                                    <option value="casual" {{$job->type == "casual"?"selected":""}}>Casual</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control  @error('status') is-invalid @enderror" value="{{old('status')}}">
                                    <option value="1" {{$job->status == "1"?"selected":""}}>Live</option>
                                    <option value="0" {{$job->status == "0"?"selected":""}}>Draft</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="datepicker">Last Date</label>
                                <input type="text" id="datepicker" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{$job->last_date}}">
                                @error('last_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark btn-block" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
