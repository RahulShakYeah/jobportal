@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center mb-5 section-heading" style="margin-top:120px">
                <h2 class="mb-5">{{$categoryName->name}}</h2>
            </div>
        </div>
        <div class="row">
            <table class="table">
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
            {{$job->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}
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
