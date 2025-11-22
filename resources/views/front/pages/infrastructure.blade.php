@extends('front.layout.app')
@section('content')
    <section class="page-banner-outr" style="background: url('{{ URL::asset($banner->image) }}')">
        <div class="overlay">
            <div class="page-banner-caption-outr">
                <div class="container text-center" data-aos="fade-up">
                    <h1>{{ $banner->title }}</h1>
                    {!! $banner->description !!}
                </div>
            </div>
        </div>
    </section>
    <section class="company-profile-sec-outr infrastructure-first-sec-outr">
        <div class="container">
            <div class="company-profile-innr row align-items-center">
                <div class="col-lg-6 ifrastructure-pic-sec-col">
                    <div class="ifrastructure-pic-col" data-aos="fade-down">
                        <img src="{{ URL::asset($cms[0]->image) }}" alt="" />
                    </div>
                    <div class="ifrastructure-pic-col ifrastructure-pic-two" data-aos="fade-up">
                        <img src="{{ URL::asset($cms[1]->image) }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 company-profile-text-col" data-aos="fade-left">
                    <div class="welcome-heading">
                        <h2>{{ $cms[0]->title }}</h2>
                        {!! $cms[0]->description !!}
                    </div>
                    <div class="company-profile-text">
                        {!! $cms[1]->description !!}

                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="infrastructure-grid-outr">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 infrastructure-box-col" data-aos="fade-up">
                    <div class="infrastructure-box-outr text-center">
                        <div class="infrastructure-box-pic mb-4">
                            <img src="{{ URL::asset($cms[2]->image) }}" alt="" />
                        </div>
                        <div class="infrastructure-box-text">
                            <h4>{{ $cms[2]->title }}</h4>
                            {!! $cms[2]->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 infrastructure-box-col" data-aos="fade-up">
                    <div class="infrastructure-box-outr text-center">
                        <div class="infrastructure-box-pic mb-4">
                            <img src="{{ URL::asset($cms[3]->image) }}" alt="" />
                        </div>
                        <div class="infrastructure-box-text">
                            <h4>{{ $cms[3]->title }}</h4>
                            {!! $cms[3]->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 infrastructure-box-col" data-aos="fade-up">
                    <div class="infrastructure-box-outr text-center">
                        <div class="infrastructure-box-pic mb-4">
                            <img src="{{ URL::asset($cms[4]->image) }}" alt="" />
                        </div>
                        <div class="infrastructure-box-text">
                            <h4>{{ $cms[4]->title }}</h4>
                            {!! $cms[4]->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 infrastructure-box-col" data-aos="fade-up">
                    <div class="infrastructure-box-outr text-center">
                        <div class="infrastructure-box-pic mb-4">
                            <img src="{{ URL::asset($cms[5]->image) }}" alt="" />
                        </div>
                        <div class="infrastructure-box-text">
                            <h4>{{ $cms[5]->title }}</h4>
                            {!! $cms[5]->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="company-profile-sec-outr infrastructure-third-outr">
        <div class="container">
            <div class="company-profile-innr row align-items-center">

                <div class="col-lg-6 company-profile-text-col" data-aos="fade-right">
                    <div class="welcome-heading">
                        <h2>{{ $cms[6]->title }}</h2>
                        {!! $cms[6]->description !!}
                    </div>
                    <div class="company-profile-text">
                        {!! $cms[7]->description !!}


                    </div>
                </div>
                <div class="col-lg-6 ifrastructure-pic-sec-col d-flex justify-content-center" data-aos="fade-left">
                    <div class="ifrastructure-pic-col">
                        <img src="{{ URL::asset($cms[6]->image) }}" alt="" />
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
@section('script')
@endsection
