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
                    <div class="card-header">Create Job</div>

                    <div class="card-body">
                        <form action="{{route('job.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title') }}">
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
                                          value="{{ old('description') }}" cols="20" rows="8"
                                          style="resize: none"></textarea>
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
                                          value="{{old('roles')}}" cols="20" rows="8"
                                          style="resize: none"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category"
                                        class="form-control @error('category') is-invalid @enderror"
                                        value="{{old('category')}}">
                                    @foreach(\App\Category::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
                                <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{old('position')}}">
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="number_of_vacancy">Number of Vacancy</label>
                                <input type="number" id="number_of_vacancy" name="number_of_vacancy" class="form-control @error('number_of_vacancy') is-invalid @enderror" value="{{old('number_of_vacancy')}}">
                                @error('number_of_vacancy')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="year_of_experience">Years of Experience</label>
                                <input type="number" id="year_of_experience" name="year_of_experience" class="form-control @error('year_of_experience') is-invalid @enderror" value="{{old('year_of_experience')}}">
                                @error('year_of_experience')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <select name="salary" id="salary" class="form-control">
                                    <option value="negotiable">negotiable</option>
                                    <option value="10000-20000">10000-20000</option>
                                    <option value="20000-40000">20000-40000</option>
                                    <option value="40000-60000">40000-60000</option>
                                    <option value="60000-100000">60000-100000</option>
                                    <option value="100000+">100000+</option>
                                </select>
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="type">Employment Type</label>
                                <select name="type" id="type" class="form-control  @error('type') is-invalid @enderror" value="{{old('type')}}">
                                    <option value="fulltime">Full Time</option>
                                    <option value="parttime">Part Time</option>
                                    <option value="casual">Casual</option>
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
                                    <option value="1">Live</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="date">Last Date</label>
                                <input type="date" id="date" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{old('last_date')}}">
                                @error('last_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark btn-block" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
