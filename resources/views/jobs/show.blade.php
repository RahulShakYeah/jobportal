@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$job->title}}</div>

                    <div class="card-body">
                        <h3>Description</h3>
                        <p>{{$job->description}}</p>
                        <h3>Roles</h3>
                        <p>{{$job->roles}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Short Info</div>

                    <div class="card-body">
                        <p>Company : <a
                                href="{{route('company.index',[$job->company->id,$job->company->slug])}}">{{$job->company->company_name}}</a>
                        </p>
                        <p>Address : {{$job->address}}</p>
                        <p>Employment Type : {{$job->type}}</p>
                        <p>Position : {{$job->position}}</p>
                        <p>Posted on : {{$job->created_at->diffForHumans()}}</p>
                        <p>Last date to apply : {{date("F d, Y", strtotime($job->last_date))}}</p>
                    </div>
                </div>
                <br>
                @if(Auth::check() && Auth::user()->user_type == 'seeker')
                    @if(!$job->checkApplication())
                        <form method="POST" action="{{route('job.apply',[$job->id])}}">
                            @csrf
                            <button class="btn btn-success btn-block">Apply</button>
                        </form>
                    @else
                        <button type="button" class="btn btn-outline-dark btn-block" disabled>Applied</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
