@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="company-profile">
                <img src="{{asset('images/coverphoto/cover-photo.jpg')}}" style="width: 100%" alt="">
                <div class="company-desc">
                    <img src="{{asset('images/logo/logo.png')}}" style="border-radius: 50%;max-width: 200px" alt="">
                    <p>{{$company->description}}</p>
                    <h1>{{$company->company_name}}</h1>
                    <p>Slogan - {{$company->slogan}}&nbsp;<br>Address - {{$company->address}}&nbsp;<br>Phone - {{$company->phone}}&nbsp;<br>Website - {{$company->website}}&nbsp;</p>
                </div>
            </div>

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
                @foreach($company->jobs as $jobs)
                    <tr>
                        <td><img src="{{asset('images/logo/logo.png')}}" style="border-radius: 50%" width="80" alt="Company Logo"></td>
                        <td>Position : {{$jobs->position}}<br> <i class="fas fa-clock"></i> {{$jobs->type}} </td>
                        <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address : {{$jobs->address}}</td>
                        <td><i class="fa fa-globe"></i>&nbsp;Date : {{$jobs->created_at->diffForHumans()}}</td>

                        <td><a href="{{route('show.jobs',[$jobs->id,$jobs->slug])}}"><button class="btn btn-success btn-sm">Apply</button></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
