@extends('layouts.main')
@section('content')
    <div style="height: 113px;"></div>

    <div class="unit-5 overlay" style="background-image: url('../../external/images/hero_2.jpg');">
        <div class="container text-center">
            <h2 class="mb-0">{{$job->position}}</h2>
            <p class="mb-0 unit-6"><a href="javascript:;">Home</a> <span class="sep">></span> <span>Job Item</span></p>
        </div>
    </div>




    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">


                    <div class="p-5 bg-white">

                        <div class="mb-4 mb-md-5 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4">{{$job->position}}</h2>

                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a
                                        href="#">{{$job->address}}</a></div>
                            </div>
                            <div class="mr-3"><span class="icon-building mr-1"></span>{{$job->company->company_name}}
                                &nbsp;&nbsp;<span class="icon-money mr-1"></span> {{$job->salary}}</div>
                            <br>
                            <div class="badge-wrap">
                                @if($job->type == "fulltime")
                                    <div>
                                        <span class="text-info p-2 rounded border border-info">Full Time</span>
                                    </div>
                                @elseif($job->type == "parttime")
                                    <div>
                                        <span class="text-danger p-2 rounded border border-danger">Part Time</span>
                                    </div>
                                @else
                                    <div>
                                        <span class="text-warning p-2 rounded border border-warning">Casual</span>
                                    </div>
                                @endif
                            </div>

                        </div>

                        <h2>Description</h2>
                        <p>{{$job->description}}</p><br>
                        <h2>Roles and Responsibilities</h2>
                        <p>{{$job->roles}}</p><br>
                        <h2>Number of Vacancy</h2>
                        <p>The total number of staff currently required by this organization
                            is {{$job->number_of_vacancy}}.</p><br>
                        <h2>Years of Experience</h2>
                        <p>The total years of experience that this organization seeks in their staff
                            is {{$job->year_of_experience}} years.</p>


                        <p class="mt-5">
                        @if(Auth::check() && Auth::user()->user_type == 'seeker')
                            @if(!$job->checkApplication())
                                <form method="POST" action="{{route('job.apply',[$job->id])}}">
                                    @csrf
                                    <button class="btn btn-success">Apply</button>
                                </form>
                            @else
                                <button type="button" class="btn btn-outline-dark" disabled>Already applied</button>
                            @endif
                        @elseif(!Auth::check())
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                You must login to apply
                            </button>

                            @endif

                            </p>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                                   required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">


                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Company Info</h3>
                        <div><span class="icon-building mr-1"></span>Name : {{$job->company->company_name}}</div>
                        <div><span class="icon-address-book mr-1"></span>Address : {{$job->company->address}}</div>
                        <div><span class="icon-people mr-1"></span>Type
                            : {{( $job->type == "fulltime" ) ? "Full time" : (( $job->type == "parttime" ) ? "Part time" : "Casual")}}
                        </div>
                        <div><span class="icon-sitemap mr-1"></span>Position : {{ $job->position }}</div>
                        <div><span class="icon-date_range mr-1"></span>Posted on : {{$job->created_at->diffForHumans()}}
                        </div>
                        <div><span class="icon-date_range mr-1"></span>Last date to apply
                            : {{date("F d, Y", strtotime($job->last_date))}}</div>
                        <br>
                        <p><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}"
                              class="btn btn-primary  py-2 px-4">Visit Company Page</a></p>
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
