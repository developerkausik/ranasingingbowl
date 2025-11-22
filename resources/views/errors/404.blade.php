@extends('front.layout.app')
@section('content')
    <section class="page-banner-outr"
        style="background: url('{{ URL::asset('uploads/products/category/1745151308.jpg') }}') no-repeat center center;">
        <div class="overlay">
            <div class="page-banner-caption-outr">
                <div class="container text-center" data-aos="fade-up">
                    <h1>Something went wrong!</h1>
                    {{-- <p>{{ count($products) }} results found</p> --}}
                </div>
            </div>
        </div>
    </section>
    <div class="text-center" style="margin-top: 100px; margin-bottom: 100px;">
        <h1 class="text-4xl font-bold text-red-600">404</h1>
        <p class="text-lg mt-2">Oops! The page you’re looking for doesn’t exist.</p>
        <a href="{{ route('home') }}" class="dwnld-btn btn">Go to Homepage</a>
    </div>
@endsection
@section('script')
@endsection
