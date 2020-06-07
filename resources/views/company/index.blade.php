@extends('layouts.main')
@section('content')
    <div style="height: 113px;"></div>

    <div class="unit-5 overlay" style="background-image: url('../../external/images/hero_2.jpg');">
        <div class="container text-center">
            <h2 class="mb-0">Company Page</h2>
            <p class="mb-0 unit-6"><a href="javascript:;">Home</a> <span class="sep">></span> <span>Company</span></p>
        </div>
    </div>

    <div class="col-12">
        <div class="company-profile" >
            @if($company->cover_photo == "images/coverphoto/cover-photo.jpg")
                <img src="{{asset('images/coverphoto/cover-photo.jpg')}}" style="margin-top: 100px;width:100%" alt="">
            @else
                <img src="{{asset('coverphoto/'.$company->cover_photo)}}" style="margin-top: 100px;width: 100%" alt="">
            @endif
            <div class="company-desc">
                @if($company->logo == "images/logo/logo.png")
                    <img src="{{asset('images/logo/logo.png')}}" style="border-radius: 50%;max-width: 200px;margin-top:-120px;margin-left:20px" alt="">
                @else
                    <img src="{{asset('logo/'.$company->logo)}}" style="border-radius: 50%;max-width: 200px;margin-top:-120px;margin-left:20px" alt="">
                @endif
            </div>
        </div>
    </div>




    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12">


                    <div class="p-5 bg-white" style="margin-top:-50px;">

                        <div class="mb-4 mb-md-5 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h1 class="mr-3 text-black h4">{{$company->company_name}}</h1><br>

                                    <span class="icon-web mr-1"></span>Website : <a href="http://{{$company->website}}">{{$company->website}}</a>


                            </div>

                        </div>

                        <h2>Description</h2>
                        <p>{{$company->description}}</p><br>
                        <h2>Phone Number</h2>
                        <p>{{$company->phone}}</p><br>
                        <h2>Address</h2>
                        <p>{{$company->address}}</p><br>
                        <h2>Slogan</h2>
                        <p>{{$company->slogan}}</p>



                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12 mb-5" style="margin-top:-100px">


                    <h2 class="mb-5 h3">Jobs posted by this company</h2>
                    <div class="rounded border jobs-wrap">

                        @foreach($company->jobs as $jobs)
                            <a href="{{route('show.jobs',[$jobs->id,$jobs->slug])}}"
                               class="job-item d-block d-md-flex align-items-center  border-bottom {{( $jobs->type == "fulltime" ) ? "fulltime" : (( $jobs->type == "parttime" ) ? "partime" : "freelance")}}">
                                <div class="company-logo blank-logo text-center text-md-left pl-3">
                                    <img src="../../../external/images/company_logo_blank.png" alt="Image" class="img-fluid mx-auto">
                                </div>
                                <div class="job-details h-100">
                                    <div class="p-3 align-self-center">
                                        <h3>{{$jobs->position}}</h3>
                                        <div class="d-block d-lg-flex">
                                            <div class="mr-3"><span class="icon-building mr-1"></span>{{$jobs->company->company_name}} </div>
                                            <div class="mr-3"><span class="icon-room mr-1"></span> {{substr($jobs->address,0,20)}}</div>
                                            <div><span class="icon-money mr-1"></span> {{$jobs->salary}}</div>
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
                                            <span class="text-warning p-2 rounded border border-warning">Casual</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6" data-aos="fade">
                    <h2>Frequently Ask Questions</h2>
                </div>
            </div>


            <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
                <div class="col-md-8">
                    <div class="accordion unit-8" id="accordion">
                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button"
                                   aria-expanded="true" aria-controls="collapseOne">What is the name of your
                                    company<span class="icon"></span></a>
                            </h3>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="body-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque
                                        perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis
                                        dolorum, est eum eligendi vero aut ad necessitatibus nulla sit labore doloremque
                                        magnam! Ex molestiae, dolor tempora, ad fuga minima enim mollitia consequuntur,
                                        necessitatibus praesentium eligendi officia recusandae culpa tempore eaque quasi
                                        ullam magnam modi quidem in amet. Quod debitis error placeat, tempore quasi
                                        aliquid eaque vel facilis culpa voluptate.</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button"
                                   aria-expanded="false" aria-controls="collapseTwo">How much pay for 3 months?<span
                                        class="icon"></span></a>
                            </h3>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="body-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum
                                        expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur
                                        aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus
                                        porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas
                                        dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button"
                                   aria-expanded="false" aria-controls="collapseThree">Do I need to register? <span
                                        class="icon"></span></a>
                            </h3>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="body-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum
                                        expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur
                                        aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus
                                        porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas
                                        dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button"
                                   aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of
                                    support.<span class="icon"></span></a>
                            </h3>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="body-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum
                                        expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur
                                        aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus
                                        porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas
                                        dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
