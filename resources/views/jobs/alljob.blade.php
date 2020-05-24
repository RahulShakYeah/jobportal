@extends('layouts.main')

@section('content')
    <div class="container" >
        <div class="row" >
            <form action="{{route('all.jobs')}}" method="GET" >
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
                        <br><br><button class="btn btn-outline-success pl-2" type="submit">Submit</button>
                    </div>
                </div>
            </form>

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
