@extends('front.layout.app')
@section('content')
    <section class="page-banner-outr" style="background: url('{{ URL::asset('uploads/products/category/1745151308.jpg') }}') no-repeat center center;">
        <div class="overlay">
            <div class="page-banner-caption-outr">
                <div class="container text-center" data-aos="fade-up">
                    <h1>{{ $search }}</h1>
                    <p>{{ count($products) }} results found</p>
                </div>
            </div>
        </div>
    </section>
    <section class="product-box-sec-outr product-page-outr">
        <div class="container text-center">
            <div class="heading">
                <h2>Seacrh results  for : {{ $search }}</h2>

            </div>
            <div class="product-box-grid-sec-outr">
                <div class="row">
                    @if (isset($products) && count($products) > 0)
                        @foreach ($products as $key => $product)
                            <div class="col-sm-3 product-box-col mt-5" data-aos="fade-left">
                                <a href="{{ route('products', [$product->category->slug, createSlug($product->title)]) }}">
                                    <div
                                        class="product-box-outr d-flex justify-content-center align-items-center flex-column">
                                        <i class="mb-3"><img src="{{ URL::asset($product->image) }}"
                                                alt="{{ $product->title }}" /></i>
                                        <h4>{{ $product->title }}</h4>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-sm-12">
                            <h4>Sorry!! Your search keyword retuns 0 result</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="product-box-view-outr">
        <div class="container text-center">
            <div class="heading prdct-heading">
                <h2>View Products by Color</h2>
            </div>
            <div class="row">
                <div class="col-sm-3 product-box-grid-col mt-4" data-aos="fade-up">
                    <a href="#">
                        <div class="product-box-grid-outr">
                            <h5>Antique Colour</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 product-box-grid-col mt-4" data-aos="fade-up">
                    <a href="#">
                        <div class="product-box-grid-outr">
                            <h5>Tiger Eye Colour</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 product-box-grid-col mt-4" data-aos="fade-up">
                    <a href="#">
                        <div class="product-box-grid-outr">
                            <h5>Brown Colour</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 product-box-grid-col mt-4" data-aos="fade-up">
                    <a href="#">
                        <div class="product-box-grid-outr">
                            <h5>Black Antick Colour</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 product-box-grid-col mt-4" data-aos="fade-up">
                    <a href="#">
                        <div class="product-box-grid-outr">
                            <h5>Black & Gold Colour</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 product-box-grid-col mt-4" data-aos="fade-up">
                    <a href="#">
                        <div class="product-box-grid-outr">
                            <h5>Matt Finishing</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 product-box-grid-col mt-4" data-aos="fade-up">
                    <a href="#">
                        <div class="product-box-grid-outr">
                            <h5>Shinning Gold</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 product-box-grid-col mt-4" data-aos="fade-up">
                    <a href="#">
                        <div class="product-box-grid-outr">
                            <h5>Light Tiger Eye Colour</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section> --}}
@endsection
@section('script')
@endsection
