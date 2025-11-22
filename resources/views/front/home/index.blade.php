@extends('front.layout.app')
@section('content')
<audio id="bgmusic" autoplay muted>
<source src="{{ URL::asset(siteSettings()->sound) }}" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<script>
  const audio = document.getElementById('bgmusic');

  // Unmute and play on first interaction
  const startAudio = () => {
    audio.muted = false;
    audio.play().catch(e => console.log("Playback failed:", e));
    document.removeEventListener('click', startAudio);
    document.removeEventListener('mousemove', startAudio);
    document.removeEventListener('touchstart', startAudio);
  };

  document.addEventListener('click', startAudio);
  document.addEventListener('mousemove', startAudio);
  document.addEventListener('touchstart', startAudio);
</script>
    <div id="animated-carousel">
        <div id="carousel-animated" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (isset($banner) && count($banner))
                    @foreach ($banner as $key => $value)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ URL::asset($value->image) }}" class="d-block w-100" alt="Rana Singin Bowl">
                            <div class="carousel-caption">
                                <h4 data-animation="animated zoomInLeft">{{ $value->title }}</h4>
                                <h2 data-animation="animated fadeInDownBig">{{ strip_tags($value->description) }}</h2>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-animated" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-animated" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
		<a href="#section02"><span><i class="fa fa-lg fa-chevron-down" aria-hidden="true"></i></span></a>
    </div>

    <section class="welcome-outr" id="section02">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 welcome-text-col">
                    <div class="welcome-heading">
                        <h1 data-aos="fade-up">Welcome</h1>
                        <h3 data-aos="fade-up">{{ $cms[0]->title }}</h3>
                    </div>
                    <div data-aos="fade-up">
                        {!! $cms[0]->description !!}
                    </div>
                    <a class="btn explore-btn" data-aos="fade-up" href="{{ route('aboutUs') }}">Explore Us <i
                            class="fa-solid fa-chevron-right"></i></a>
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
                <div class="col-lg-7 welcome-img-col">
                    <div class="welcome-img-outr">
                        <div class="welcome-img-one" data-aos="fade-down">
                            <img src="{{ URL::asset($cms[0]->image) }}" alt="{{ $cms[0]->title }}" />
                            <div class="welcome-img-txt">
                                {!! $cms[1]->description !!}
                            </div>
                        </div>
                        <div class="welcome-img-two" data-aos="fade-up">
                            <img src="{{ URL::asset($cms[1]->image) }}" alt="{{ $cms[1]->title }}" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-outr index-prodct-outr">
        {{-- <div class="index-prodct-bg bg-top" data-aos="fade-down">
            <img src="{{ URL::asset('assets/images/index-prdct-bg-top.png') }}" alt="rana singing bowl" />
        </div>
        <div class="index-prodct-bg bg-bottom" data-aos="fade-up">
            <img src="{{ URL::asset('assets/images/index-prdct-bg-bottom.png') }}" alt="rana singing bowl" />
        </div> --}}
        <div class="container">
            <div class="product-heading d-flex justify-content-center">
                <h3 class="section-heading half-border">Our <span>Products</span></h3>
            </div>
            <div class="product-grid-outr">
                <div class="row justify-content-center">
                    @if (isset($category) && count($category) > 0)
                        @foreach ($category as $key => $value)
                            <div class="col-lg-3 col-md-6 col-sm-6 product-grid-col mt-5" data-aos="fade-left">
                                <a href="{{ route('category', ['slug' => $value->slug]) }}">
                                    <div class="product-grid-img d-flex justify-content-center align-items-center">
                                        <img src="{{ URL::asset($value->product_image) }}" alt="{{ $value->title }}" />
                                    </div>
                                    <div class="product-grid-text text-center">
                                        <h4>{{ $value->title }}</h4>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="customer-sec-outr">
        <div class="container">
            <div class="product-heading d-flex justify-content-center" data-aos="fade-up">
                <h3 class="section-heading half-border">Satisfied <span>Customers</span></h3>
            </div>
			
            <div class="customer-slidr-outr mt-2" data-aos="zoom-in">
			    <div class="rating-mnu d-flex justify-content-center">
			    <ul class="d-flex justify-content-center customer-star-menu">
				    <li><i class="fa-solid fa-star"></i></li>
					<li><i class="fa-solid fa-star"></i></li>
					<li><i class="fa-solid fa-star"></i></li>
					<li><i class="fa-solid fa-star"></i></li>
					<li><i class="fa-solid fa-star"></i></li>
				</ul>
			</div>
                <div class="owl-carousel owl-theme owl-carousel1">
                    @if (isset($testimonials) && count($testimonials) > 0)
                        @foreach ($testimonials as $key => $value)
                            <div class="item">
                                <i class="fa-solid fa-2x fa-quote-left"></i>
                                {!! $value->description !!}
                                <h3>{{ $value->name }}</h3>
                                <i class="fa-solid fa-2x fa-quote-right"></i>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
    <section class="youtube-sec-outr">
        <div class="container">
            <div class="youtube-sec-inr">
                <atropos-component>
                    <div class="atropos">
                        <div class="atropos-scale">
                            <div class="atropos-rotate">
                                <div class="atropos-inner">
                                    <div class="border-radius-6px h-650px md-h-450px sm-h-350px d-flex align-items-end justify-content-center overflow-hidden cover-background"
                                        style="background-image: url('{{ URL::asset($cms[6]->image) }}')"
                                        data-atropos-offset="-2">
                                        <div class="opacity-very-light bg-dark-gray"></div>
                                    </div>
                                </div>
                                <div class="atropos-shadow"></div>
                            </div>
                        </div>
                    </div>
                </atropos-component>
                <a href=""
                    class="absolute-middle-center text-center border border-1 border-color-transparent-white-very-light rounded-circle video-icon-box video-icon-extra-large popup-youtube video-btn2"
                    data-bs-toggle="modal" data-bs-target="#exampleModalvideo" data-src="{{ $cms[6]->page_link }}">
                    <span>
                        <span class="video-icon text-white text-uppercase ls-1px">Play</span>
                    </span>
                </a>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModalvideo" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9 mfp-content">
                        <iframe class="embed-responsive-item" width="100%" height="500" src=""
                            id="video2" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section class="feature-box-sec-outr product-outr">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 feature-box-col text-center" data-aos="fade-up">
                    <div>
                        <i class="mb-4 "><img src="{{ URL::asset($cms[2]->image) }}" alt="{{ $cms[2]->title }}" /></i>
                        <h3>{{ $cms[2]->title }}</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 feature-box-col text-center" data-aos="fade-up">
                    <div>
                        <i class="mb-4 "><img src="{{ URL::asset($cms[3]->image) }}" alt="{{ $cms[3]->title }}" /></i>
                        <h3>{{ $cms[3]->title }}</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 feature-box-col text-center" data-aos="fade-up">
                    <div>
                        <i class="mb-4 "><img src="{{ URL::asset($cms[4]->image) }}" alt="{{ $cms[4]->title }}" /></i>
                        <h3>{{ $cms[4]->title }}</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 feature-box-col text-center" data-aos="fade-up">
                    <div>
                        <i class="mb-4 "><img src="{{ URL::asset($cms[5]->image) }}" alt="{{ $cms[5]->title }}" /></i>
                        <h3>{{ $cms[5]->title }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-sec-outr">
        <div class="container">
            <div class="product-heading d-flex justify-content-center">
                <h3 class="section-heading">We Made Your Brand Or Any Symbol In Your Product.</h3>
            </div>
            <div class="product-slidr-outr mt-4 mb-4" data-aos="fade-left">
                <div class="owl-carousel owl-theme owl-fancy-carousel">
                    @if (isset($laserImages) && count($laserImages) > 0)
                        @foreach ($laserImages as $key => $value)
                            <a class="produc-item-img" href="{{ URL::asset($value->image) }}" data-fancybox="images"
                                data-caption="{{ $value->title }}">
                                <img src="{{ URL::asset($value->image) }}" alt="{{ $value->title }}" />
                                <button class="btn">
                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                </button>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="text-center product-text">
                <p>We Engraved Company Logo , Branding, And Any Types Of Symble In Products as per customer Order Basis </p>
            </div>
        </div>
    </section>
    <section class="google-map-outr" style="">
        <div class="contact_map">
            <iframe width="100%" height="550" frameborder="0" allowfullscreen="" style="border:0"
                src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d58837.69865524157!2d87.57461963188597!3d22.826308760286203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x39f81c9b03542393%3A0xb13d60d2c92d5c14!2sRana+Villa%2C+Singing+Bowl+Centre%2C%2C+Rana%2C+West+Bengal+721242!3m2!1d22.8262339!2d87.6115277!5e0!3m2!1sen!2sin!4v1440485038702"></iframe>
        </div>
        <div class="container">
            <div class="d-flex justify-content-end align-items-center">
                <div class="google-map-box-outr" data-aos="fade-left">
                    <h3>Contact us</h3>
                    <div class="google-map-content">
                        <div class="map-box-content">
                            {{-- <h5>Location</h5>
                            {!! siteSettings()->address !!} --}}
                        </div>
                        <div class="map-box-content">
                            <h5>Phone</h5>
                            <ul class="d-flex phone-mnu flex-wrap">
                                <li><a href="tel:{{ siteSettings()->ph_no }}">{{ siteSettings()->ph_no }} </a></li>
                                <li><a href="tel:{{ siteSettings()->alt_ph_no }}">{{ siteSettings()->alt_ph_no }} </a>
                                </li>
                            </ul>
                        </div>
                        <div class="map-box-content">
                            <h5>Email</h5>
                            <p><a href="mailto:{{ siteSettings()->email }}">{{ siteSettings()->email }}</a></p>
                        </div>

                    </div>
                    <div class="show-map text-center mt-3">
                        <a href="https://maps.google.com/maps?ll=22.826309,87.57462&z=13&t=m&hl=en-US&gl=US&mapclient=embed&saddr=&daddr=Rana%20Singing%20Bowl%20centre%2C%20Ramjibanpur%2C%20West%20Bengal%20721242&dirflg=d"
                            target="_blank"><i class="fa-solid fa-location-dot"></i> Show On Google Maps</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
	
@endsection
@section('script')
@endsection