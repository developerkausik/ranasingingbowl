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
    <section class="gallery-grid-outr">
        <div class="container">
            <div class="gallery-grid-heading" data-aos="fade-up">
                <h2>{{ $cms[0]->title }}</h2>
                {!! $cms[0]->description !!}
            </div>
            <div class="gallery-box-sec-outr">
                <h3 data-aos="fade-up">Rana Singing Bowl Centre Gallery Photos</h3>
                <div class="gallery-box-row-outr attraction-box-col mb-4 mt-3">
                    <div class="row">
                        @if (isset($images) && count($images) > 0)
                            @foreach ($images as $key => $val)
                                <div class="col-sm-2 gallery-box-col" data-aos="fade-left">
                                    <div class="attraction-box-col">
                                        <a data-fancybox="gallery1" data-caption="{{ $val->title }}"
                                            href="{{ URL::asset($val->image) }}">
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
                {!! $cms[1]->description !!}
            </div>

        </div>
    </section>
@endsection
@section('script')
@endsection
