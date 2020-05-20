@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($applicant as $applicant)
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header"><a href="{{route('show.jobs',[$applicant->id,$applicant->slug])}}">{{$applicant->title}}</a></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <th>Applicant Name</th>
                                <th>Applicant Email</th>
                                <th>Applicant Gender</th>
                                <th>Applicant Experience</th>
                                <th>Applicant Bio</th>
                                <th>Cover Letter</th>
                                <th>Resume</th>
                                </thead>
                            @foreach($applicant->users as $users)

                                    <tbody>
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->profile->gender}}</td>
                                    <td style="overflow: scroll">{{$users->profile->experience}}</td>
                                    <td style="overflow: scroll">{{$users->profile->bio}}</td>
                                    @if($users->profile->cover_letter != null)
                                        <td><a href="{{route('download.covercom',[$users->profile->user_id])}}">Cover
                                                Letter</a></td>
                                    @else
                                        <td><p class="alert alert-warning">No cover letter uploaded</p></td>
                                    @endif
                                    @if($users->profile->cover_letter != null)
                                        <td><a href="{{route('download.resumecom',[$users->profile->user_id])}}">Resume</a>
                                        </td>
                                    @else
                                        <td><p class="alert alert-warning">No resume uploaded</p></td>
                                    @endif
                                    </tbody>

                            @endforeach
                            </table>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
