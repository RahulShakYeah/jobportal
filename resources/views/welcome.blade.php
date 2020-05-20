@extends('layouts.app')

@section('content')
    <div class="container">
        <input type="text" class="form-control" name="search_job" placeholder="Search Jobs" l>
        <div class="row">
            <h1>Recent Jobs</h1>
            <table class="table">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($job as $jobs)
                    <tr>
                        <td>
                            @if($jobs->company->logo == "images/logo/logo.png" || empty($jobs->company->logo))
                                <img src="{{asset('images/logo/logo.png')}}" style="border-radius: 0%" width="80"
                                     alt="Company Logo">
                            @else
                                <img src="{{asset('logo/'.$jobs->company->logo)}}" style="border-radius: 0%" width="80"
                                     alt="Company Logo">
                            @endif
                        </td>
                        <td>Position : {{$jobs->position}}<br> <i class="fas fa-clock"></i> {{$jobs->type}} </td>
                        <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address : {{$jobs->address}}</td>
                        <td><i class="fa fa-globe"></i>&nbsp;Date : {{$jobs->created_at->diffForHumans()}}</td>

                        <td><a href="{{route('show.jobs',[$jobs->id,$jobs->slug])}}">
                                <button class="btn btn-success btn-sm">Apply</button>
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="{{route('all.jobs')}}" style="text-decoration: none">
                <button class="btn btn-success btn-block">Browse all jobs</button>
            </a>
        </div>
        <br><br>
        <h1>Featured Companies</h1>
    </div>
    <div class="container">
        <div class="row">
            @foreach($company as $company)
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">

                        @if($company->logo == "images/logo/logo.png" || empty($company->logo))
                            <img src="{{asset('images/logo/logo.png')}}" style="border-radius: 0%" width="80"
                                 alt="Company Logo">
                        @else
                            <img src="{{asset('logo/'.$company->logo)}}" style="border-radius: 0%" width="80"
                                 alt="Company Logo">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$company->company_name}}</h5>
                            <p class="card-text">{{substr($company->description,0,20)}}...</p>
                            <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit
                                Company</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
