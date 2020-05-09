@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Jobs</div>

                    <div class="card-body">
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
                                        @if(empty(Auth()->user()->company->logo))
                                            <img src="{{asset('images/logo/logo.png')}}" width="80" style="width:50%"
                                                 alt="">
                                        @else
                                            <img src="{{asset('logo/'.Auth::user()->company->logo)}}" width="80"
                                                 style="width:50%"
                                                 alt="">
                                        @endif
                                    </td>
                                    <td>Position : {{$jobs->position}}<br> <i class="fas fa-clock"></i> {{$jobs->type}}
                                    </td>
                                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address
                                        : {{$jobs->address}}</td>
                                    <td><i class="fa fa-globe"></i>&nbsp;Date : {{$jobs->created_at->diffForHumans()}}
                                    </td>

                                    <td>
                                        <a href="{{route('show.jobs',[$jobs->id,$jobs->slug])}}">
                                            <button class="btn btn-success btn-sm">Apply</button>
                                        </a>
                                        <a href="{{route('job.edit',[$jobs->id])}}">
                                            <button class="btn btn-secondary btn-sm mt-2">Edit</button>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
