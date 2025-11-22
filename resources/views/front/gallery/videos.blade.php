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
                <h3 data-aos="fade-up">Rana Singing Bowl Centre Videos</h3>
                <div class="gallery-box-row-outr attraction-box-col mb-4 mt-3">
                    <div class="row">
                        @if (isset($videos) && count($videos) > 0)
                            @foreach ($videos as $key => $val)
                                <div class="col-sm-4 mt-5" data-aos="fade-left">
                                    <div class="videos">
                                        <iframe width="100%" height="400" src="{{ $val->video }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen=""></iframe>
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
