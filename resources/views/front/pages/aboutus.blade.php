@extends('front.layout.app')
@section('content')
    <section class="page-banner-outr" style="background-image: url('{{ URL::asset($banner->image) }}')">
        <div class="overlay">
            <div class="page-banner-caption-outr">
                <div class="container text-center" data-aos="fade-up">
                    <h1>{{ $banner->title }}</h1>
                    {!! $banner->description !!}
                </div>
            </div>
        </div>
    </section>
    <section class="company-profile-sec-outr">
        <div class="container">
            <div class="company-profile-innr row align-items-center">
                <div class="col-lg-6 moto-content-col">
                    <div class="moto-content-outr">
                        <div class="moto-pic-outr" data-aos="fade-up">
                            <img src="{{ URL::asset($cms[1]->image) }}" alt="" />
                        </div>
                        <div class="moto-pic-text text-center mt-4" data-aos="fade-up">
                            <h4>{{ $cms[1]->title }}</h4>
                            {!! $cms[1]->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 company-profile-text-col welcome-text-col" data-aos="fade-right">
                    <div class="welcome-heading">
                        <h2>Company Profile</h2>
                        <h3>{{ $cms[0]->title }}</h3>
                    </div>
                    <div class="company-profile-text">
                        {!! $cms[0]->description !!}
                    </div>
					<div class="row">
					   <div class="col-sm-3 mt-1 text-center">
					     <img src="{{ URL::asset('assets/images/9001Png.png') }}" alt="" />
					   </div>
					   <div class="col-sm-3 mt-1 text-center">
					     <img src="{{ URL::asset('assets/images/14001png.png') }}" alt="" />
					   </div>
					   <div class="col-sm-3 mt-1 text-center">
					     <img src="{{ URL::asset('assets/images/Msmepng.png') }}" alt="" />
					   </div>
					   <div class="col-sm-3 mt-1 text-center">
					     <img src="{{ URL::asset('assets/images/SedexPNG.png') }}" alt="" />
					   </div>
					</div>
                </div>
            </div>
            <div class="company-factsheet-innr row mt-3">
                <div class="col-lg-6 company-factsheet-col">
                    <div class="company-factsheet-text-outr text-center">
                        <div class="welcome-heading">
                            <h2>Company Factsheet</h2>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-6 company-box-col mb-4" data-aos="fade-up">
                                <div class="company-box-outr">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <i class="mb-3"><img src="{{ URL::asset($cms[2]->image) }}" alt="" /></i>
                                        <div class="company-box-text d-flex justify-content-center align-items-center">
                                            <h3>{{ $cms[2]->title }}</h3>
                                        </div>
                                    </a>


                                </div>
                            </div>
                            <div class="col-sm-6 company-box-col mb-4" data-aos="fade-up">
                                <div class="company-box-outr">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                        <i class="mb-3"><img src="{{ URL::asset($cms[3]->image) }}" alt="" /></i>
                                        <div class="company-box-text d-flex justify-content-center align-items-center">
                                            <h3>{{ $cms[3]->title }}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 company-box-col mb-4" data-aos="fade-up">
                                <div class="company-box-outr">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                                        <i class="mb-3"><img src="{{ URL::asset($cms[4]->image) }}" alt="" /></i>
                                        <div class="company-box-text d-flex justify-content-center align-items-center">
                                            <h3>{{ $cms[4]->title }}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center company-fact-box-bottom">
                            <p>Where Tradition Meets Innovation in Sound Healing</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 company-factsheet-img-outr" data-aos="fade-left">
                    <div class="company-factsheet-img">
                        <img src="{{ URL::asset($cms[0]->image) }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header company-modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">{{ $cms[2]->title }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! $cms[2]->description !!}
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header company-modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">{{ $cms[3]->title }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="company-profile-text">
                        {!! $cms[3]->description !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header company-modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">{{ $cms[4]->title }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! $cms[4]->description !!}
                </div>

            </div>
        </div>
    </div>
    <section class="trusted-outr">
        <div class="container">
            <div class="trusted-inr text-center" data-aos="fade-up">
                <div class="trusted-heading">
                    <h3>Trusted Across Borders
                        Serving Clients Nationwide & Worldwide</h3>
                </div>
                <div class="trusted-map mb-3">
                    <img src="{{ URL::asset('assets/images/map.png') }}" alt="" />
                </div>
                <p>Our valued clients span the nation and beyond, with a strong presence in key regions such as</p>
                <ul class="d-flex justify-content-center flex-wrap">
                    <li><a href="#">Europe</a></li>
                    <li><a href="#">USA</a></li>
                    <li><a href="#">Au</a></li>
                    <li><a href="#">Nz</a></li>
                    <li><a href="#">East Asia</a></li>
                    <li><a href="#">Middle East & South East Asia</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="product-glance-outr">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 product-glance-text-col" data-aos="fade-right">
                    <div class="product-glance-text-outr">
                        <div class="welcome-heading border-zero">
                            <h2>Products at a Glance</h2>
                            <p>{{ $cms[5]->title }}</p>
                        </div>
                        {!! $cms[5]->description !!}
                    </div>
                </div>
                <div class="col-lg-6 glance-pic-col" data-aos="fade-left">
                    <div class="glance-pic-outr">
                        <img src="{{ URL::asset($cms[5]->image) }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="benifits-sec-outr">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 benifits-img-col">
                    <div class="benifits-img-outr" data-aos="fade-up">
                        <img src="{{ URL::asset($cms[6]->image) }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 benifits-text-col">
                    <div class="benifits-text-outr glance-mnu-outr" data-aos="fade-left">
                        <h2>{{ $cms[6]->title }}</h2>
                        {!! $cms[6]->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-glance-outr">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 product-glance-text-col" data-aos="fade-right">
                    <div class="product-glance-text-outr">
                        <div class="welcome-heading border-zero">
                            <h2>{{ $cms[7]->title }}</h2>
                            {!! $cms[7]->description !!}
                        </div>
                        <div class="benifits-text-outr glance-mnu-outr make-mnu-outr">
                            {!! $cms[8]->description !!}
                        </div>


                    </div>
                </div>
                <div class="col-lg-6 glance-pic-col" data-aos="fade-left">
                    <div class="glance-pic-outr">
                        <img src="{{ URL::asset($cms[7]->image) }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-play-sec-outr product-outr">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 how-play-pic-col">
                    <div class="how-play-pic-outr">
                        <div class="d-flex align-items-center how-play-box-outr" data-aos="fade-up">
                            <div class="how-play-pic">
                                <img src="{{ URL::asset('assets/images/how-play-pic1.png') }}" alt="" />
                            </div>
                            <div class="how-play-text">
                                <h3>Step<span>1</span></h3>
                            </div>
                        </div>
                        <div class="d-flex align-items-center how-play-box-outr" data-aos="fade-up">
                            <div class="how-play-pic">
                                <img src="{{ URL::asset('assets/images/how-play-pic2.png') }}" alt="" />
                            </div>
                            <div class="how-play-text">
                                <h3>Step<span>2</span></h3>
                            </div>
                        </div>
                        <div class="d-flex align-items-center how-play-box-outr" data-aos="fade-up">
                            <div class="how-play-pic">
                                <img src="{{ URL::asset('assets/images/how-play-pic3.png') }}" alt="" />
                            </div>
                            <div class="how-play-text">
                                <h3>Step<span>3</span></h3>
                            </div>
                        </div>
                        <div class="d-flex align-items-center how-play-box-outr" data-aos="fade-up">
                            <div class="how-play-pic">
                                <img src="{{ URL::asset('assets/images/how-play-pic4.png') }}" alt="" />
                            </div>
                            <div class="how-play-text">
                                <h3>Step<span>4</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 how-play-text-col">
                    <div class="how-play-text-outr benifits-text-outr glance-mnu-outr make-mnu-outr" data-aos="fade-left">
                        <h2>{{ $cms[9]->title }}</h2>
                        {!! $cms[9]->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-glance-outr">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 product-glance-text-col" data-aos="fade-right">
                    <div class="product-glance-text-outr">
                        <div class="welcome-heading border-zero">
                            <h2>Usage of Singing Bowl</h2>
                            <p>{{ $cms[10]->title }}</p>
                        </div>
                        <div class="benifits-text-outr glance-mnu-outr make-mnu-outr">
                            {!! $cms[10]->description !!}
                        </div>


                    </div>
                </div>
                <div class="col-lg-6 glance-pic-col" data-aos="fade-left">
                    <div class="glance-pic-outr">
                        <img src="{{ URL::asset($cms[10]->image) }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vendor-sec-outr">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 vendor-text-col" data-aos="fade-right">
                    <div class="vendor-text-outr text-center">
                        <h2>{{ $cms[11]->title }}</h2>
                        {!! $cms[11]->description !!}
                    </div>
                </div>
                <div class="col-lg-6 team-text-col" data-aos="fade-left">
                    <div class="vendor-text-outr text-center">
                        <h2>{{ $cms[12]->title }}</h2>
                        {!! $cms[12]->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="strength-grid-outr">
        <div class="container">
            <div class="welcome-heading border-zero text-center bor-none heading-color-one">
                <h2>{{ $cms[13]->title }}</h2>
                <p>{!! $cms[13]->description !!}</p>
            </div>
            <div class="strength-grid-col-outr">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 strength-box-col text-center mb-3" data-aos="fade-left">
                        <i class="mb-3"><img src="{{ URL::asset($cms[14]->image) }}" alt="" /></i>
                        <h4>{{ $cms[14]->title }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 strength-box-col text-center mb-3" data-aos="fade-left">
                        <i class="mb-3"><img src="{{ URL::asset($cms[15]->image) }}" alt="" /></i>
                        <h4>{{ $cms[15]->title }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 strength-box-col text-center mb-3" data-aos="fade-left">
                        <i class="mb-3"><img src="{{ URL::asset($cms[16]->image) }}" alt="" /></i>
                        <h4>{{ $cms[16]->title }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 strength-box-col text-center mb-3" data-aos="fade-left">
                        <i class="mb-3"><img src="{{ URL::asset($cms[17]->image) }}" alt="" /></i>
                        <h4>{{ $cms[17]->title }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 strength-box-col text-center mb-3" data-aos="fade-left">
                        <i class="mb-3"><img src="{{ URL::asset($cms[18]->image) }}" alt="" /></i>
                        <h4>{{ $cms[18]->title }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 strength-box-col text-center mb-3" data-aos="fade-left">
                        <i class="mb-3"><img src="{{ URL::asset($cms[19]->image) }}" alt="" /></i>
                        <h4>{{ $cms[19]->title }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 strength-box-col text-center mb-3" data-aos="fade-left">
                        <i class="mb-3"><img src="{{ URL::asset($cms[20]->image) }}" alt="" /></i>
                        <h4>{{ $cms[20]->title }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 strength-box-col text-center mb-3" data-aos="fade-left">
                        <i class="mb-3"><img src="{{ URL::asset($cms[21]->image) }}" alt="" /></i>
                        <h4>{{ $cms[21]->title }}</h4>
                    </div>

                </div>
                <div class="text-center sup-text">
                    {!! $cms[22]->description !!}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
