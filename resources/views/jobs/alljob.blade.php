@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('all.jobs')}}" method="GET">
                <div class="form-inline" style="margin-top:120px">
                    <div class="form-group">
                        <label for="title">Keyword&nbsp;</label>
                        <input type="text" class="form-control form-control-sm" name="title">
                    </div>

                    <div class="form-group">
                        <label for="address">&nbsp;&nbsp;Address&nbsp;</label>
                        <input type="text" class="form-control form-control-sm" name="address">
                    </div>

                    <div class="form-group">
                        <label for="category_id">&nbsp;&nbsp;Category&nbsp;</label>
                        <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror"
                                value="{{old('category')}}">
                            <option value="">--select--</option>
                            @foreach(\App\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">&nbsp;&nbsp;Employment Type&nbsp;</label>
                        <select name="type" id="type" class="form-control  @error('type') is-invalid @enderror"
                                value="{{old('type')}}">
                            <option value="">--select--</option>
                            <option value="fulltime">Full Time</option>
                            <option value="parttime">Part Time</option>
                            <option value="casual">Casual</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <br><br>
                        <button class="btn btn-outline-success pl-2" type="submit">Submit</button>
                    </div>
                </div>
            </form>
            <div class="col-12">
                <div class="rounded border jobs-wrap">
                    @if(count($job) > 0)
                        @foreach($job as $jobs)
                            <a href="{{route('show.jobs',[$jobs->id,$jobs->slug])}}"
                               class="job-item d-block d-md-flex align-items-center  border-bottom {{( $jobs->type == "fulltime" ) ? "fulltime" : (( $jobs->type == "parttime" ) ? "partime" : "freelance")}}">
                                <div class="company-logo blank-logo text-center text-md-left pl-3">
                                    @if($jobs->company->logo == "images/logo/logo.png" || empty($jobs->company->logo))
                                        <img src="{{asset('images/logo/logo.png')}}" class="img-fluid mx-auto"
                                             style="border-radius: 0%" width="80"
                                             alt="Company Logo">
                                    @else
                                        <img src="{{asset('logo/'.$jobs->company->logo)}}" style="border-radius: 0%"
                                             width="80"
                                             alt="Company Logo">
                                    @endif
                                </div>
                                <div class="job-details h-100">
                                    <div class="p-3 align-self-center">
                                        <h3>{{$jobs->position}}</h3>
                                        <div class="d-block d-lg-flex">
                                            <div class="mr-3"><span
                                                    class="icon-building mr-1"></span>{{$jobs->company->company_name}}
                                            </div>
                                            <div class="mr-3"><span
                                                    class="icon-room mr-1"></span> {{substr($jobs->address,0,20)}}</div>
                                            <div><span class="icon-money mr-1"></span> {{$jobs->salary}}</div>
                                            <div>&nbsp;&nbsp;<span class="icon-clock-o mr-1"></span> {{$jobs->created_at->diffForHumans()}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-category align-self-center">
                                    @if($jobs->type == "fulltime")
                                        <div class="p-3">
                                            <span class="text-info p-2 rounded border border-info">Full Time</span>
                                        </div>
                                    @elseif($jobs->type == "parttime")
                                        <div class="p-3">
                                            <span class="text-danger p-2 rounded border border-danger">Part Time</span>
                                        </div>
                                    @else
                                        <div class="p-3">
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    @else
                        <tr><p class="alert alert-danger">No Jobs Found</p></tr>
                    @endif
                </div>
            </div>
            <br><br>

        </div>
        {{$job->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}
    </div>


@endsection
<style>
    .fa {
        color: #4183D7;
    }

    .fas {
        color: #4183D7;
    }
</style>

