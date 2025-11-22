@extends('front.layout.app')
@section('content')
    <section class="page-banner-outr" style="background: url('{{ URL::asset($category->image) }}') no-repeat center center;">
        <div class="overlay">
            <div class="page-banner-caption-outr">
                <div class="container text-center" data-aos="fade-up">
                    <h1>{{ $category->title }}</h1>
                    <p>{{ $category->manufactured }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="product-content-sec-outr">
        <div class="container text-center pt-4 pb-4 infrastructure-box-text" data-aos="fade-up">
            <div class="heading prdct-heading">
                <h2>{{ $category->title }}</h2>

            </div>
            {!! $category->description !!}
        </div>
    </section>
    <section class="product-box-sec-outr product-page-outr">
        <div class="container text-center">
            <div class="heading">
                <h2>Our Products</h2>

            </div>
            <div class="product-box-grid-sec-outr">
                <div class="row">
                    @if (isset($category->product) && count($category->product) > 0)
                        @foreach ($category->product as $key => $product)
                            <div class="col-sm-3 product-box-col mt-5" data-aos="fade-left">
                                <a href="{{ route('products', [$category->slug, createSlug($product->title)]) }}">
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
                            <h4>No Products Found</h4>
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
