@extends('front.layout.app')
@section('content')
    <section class="page-banner-outr"
        style="background: url('https://www.ranasingingbowlcentre.com/uploads/banner/1745141993.jpg')">
        <div class="overlay">
            <div class="page-banner-caption-outr">
                <div class="container text-center" data-aos="fade-up">
                    <h1>Exhibition</h1>
                    <p>Exhibitions That Inspire Every Walk of Life</p>
                </div>
            </div>
        </div>
    </section>
    <section class="exhibition-outr py-5">
        <div class="container">
            <div class="accordion" id="accordionExample">
                @if (isset($exhibitions) && count($exhibitions) > 0)
                    @foreach ($exhibitions as $exhibition)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button  justify-content-between align-items-center {{ !$loop->first ? 'collapsed' : ''}}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne{{$exhibition->id}}" aria-expanded="true"
                                    aria-controls="collapseOne{{$exhibition->id}}">
                                    <h3>{{ $exhibition->title }}</h3>
                                    <h6>Date: {{ date('d F, Y', strtotime($exhibition->exhibition_date)) }}</h6>
                                </button>
                            </h2>
                            <div id="collapseOne{{$exhibition->id}}" class="accordion-collapse collapse {{$loop->first ? 'show' : ''}}">
                                <div class="accordion-body">
                                    {!! $exhibition->description !!}
                                    <div class="gallery-box-sec-outr">

                                        <div class="gallery-box-row-outr attraction-box-col  mt-3">
                                            <div class="row">
                                                @if (isset($exhibition->images) && count($exhibition->images) > 0)
                                                    @foreach ($exhibition->images as $image)
                                                        <div class="col-sm-2 gallery-box-col" data-aos="fade-left">
                                                            <div class="attraction-box-col">
                                                                <a data-fancybox="gallery1" data-caption="{{$image->title}}"
                                                                    href="{{URL::asset($image->image)}}">
                                                                    <div class="attraction-box-outr">
                                                                        <div class="attraction-box-pic">
                                                                            <img src="{{URL::asset($image->image)}}"
                                                                                alt="{{$image->title}}" />
                                                                            <div class="post-img-detail">
                                                                                <i
                                                                                    class="fa-solid fa-lg fa-magnifying-glass-plus"></i>
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
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
