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
    <section class="gallery-grid-outr laser-grid-text-outr">
        <div class="container">
            <div class="gallery-grid-heading">
                <h2>{{ $cms[0]->title }}</h2>
                {!! $cms[0]->description !!}
            </div>
            <div class="laser-mnu-outr">
                <div class="row">
                    <div class="col-md-6 laser-box-col" data-aos="fade-right">
                        <div class="laser-box-outr">
                            <h4>{{ $cms[1]->title }}</h4>
                            <div class="benifits-text-outr glance-mnu-outr make-mnu-outr">
                                {!! $cms[1]->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 laser-box-col" data-aos="fade-left">
                        <div class="laser-box-outr">
                            <h4>{{ $cms[2]->title }}</h4>
                            <div class="benifits-text-outr glance-mnu-outr make-mnu-outr">
                                {!! $cms[2]->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! $cms[3]->description !!}
            </div>

        </div>
    </section>
    <section class="gallery-grid-outr laser-grid-outr">
        <div class="container">

            <div class="gallery-box-sec-outr">
                <h3>Laser Photo Samples</h3>
                <div class="gallery-box-row-outr attraction-box-col mb-4 mt-3">
                    <div class="row">
                        @if (isset($laser) && count($laser) > 0)
                            @foreach ($laser as $key => $val)
                                <div class="col-sm-2 gallery-box-col" data-aos="fade-up">
                                    <div class="attraction-box-col">
                                        <a data-fancybox="gallery1" data-caption="{{ $val->title }}" href="{{ URL::asset($val->image) }}">
                                            <div class="attraction-box-outr">
                                                <div class="attraction-box-pic">
                                                    <img src="{{ URL::asset($val->image) }}" alt="{{ $val->title }}" />
                                                    <div class="post-img-detail">
                                                        <i class="fa-solid fa-lg fa-magnifying-glass-plus"></i>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
@section('script')
@endsection
