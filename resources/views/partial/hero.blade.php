<div style="height: 113px;"></div>

<div class="site-blocks-cover overlay" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade"
     data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12" data-aos="fade">
                <h1>Find Job</h1>
                <form action="{{route('all.jobs')}}">
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <input type="text" class="mr-3 form-control border-0 px-4"
                                           placeholder="job title, keywords or company name " name="search" required>
                                </div>
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="input-wrap">
                                        <span class="icon icon-room"></span>
                                        <input type="text" class="form-control form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="city, province or region" name="address" onFocus="geolocate()" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="small">or browse by category:
                                @foreach(\App\Category::get()->random(5) as $category)
                                    <a href="{{route('category.index',[$category->id])}}"
                                       class="category">{{$category->name}}</a>
                                @endforeach
                            </p>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
