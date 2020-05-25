@extends('layouts.main')
@section('content')
    <div style="height: 113px;"></div>

    <div class="unit-5 overlay" style="background-image: url('../../../external/images/hero_1.jpg');">
        <div class="container text-center">
            <h2 class="mb-0">Company</h2>
            <p class="mb-0 unit-6"><a href="javascript:;">Home</a> <span class="sep">></span>
                <span>Registered Companies</span></p>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                @foreach($company as $companies)
                    <div class="col-md-6 mb-5 mb-lg-4 col-lg-3" data-aos="fade">
                        <div class="position-relative unit-8">
                            <a href="{{route('company.index',[$companies->id,$companies->slug])}}" class="mb-3 d-block img-a">  @if($companies->logo == "images/logo/logo.png" || empty($companies->logo))
                                    <img src="{{asset('images/logo/logo.png')}}"  width="100"
                                         alt="Company Logo">
                                @else
                                    <img src="{{asset('logo/'.$companies->logo)}}" style="border-radius: 0%" width="100"
                                         alt="Company Logo">
                                    @endif
                                    </td></a>
                            <span
                                class="d-block text-gray-500 text-normal small mb-3">Register on :   {{date("F d, Y", strtotime($companies->created_at))}}</span>
                            <h2 class="h5 font-weihgt-normal line-height-sm mb-3"><a href="{{route('company.index',[$companies->id,$companies->slug])}}" class="text-black">{{$companies->company_name}}</a></h2>
                            <p>{{substr($companies->description,0,20)}}...</p>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row mt-5">
                <div class="col-md-12 text-center">


                           {{$company->links()}}


                </div>
            </div>


        </div>
    </div>
@endsection
