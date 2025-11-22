<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ metaTag()->title }}</title>
    <meta name="description" content="{{ metaTag()->description }}" />
    <meta name="keywords" content="{{ metaTag()->keyword }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ URL::asset('assets/images/logo.png') }}">
    <!-- link section -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/opensause-font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/all.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/fontawesome.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.theme.default.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/fancybox/fancybox.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/responsive.css') }}" type="text/css" />
    <link rel='stylesheet' href='https://unpkg.com/atropos@1.0.2/atropos.min.css'>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link href="{{ URL::asset('assets/css/cloudzoom.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/new-style.css') }}" type="text/css" />
    <script type="application/ld+json">
		{
			"@context": "http://www.schema.org",
			"@type": "ProfessionalService",
			"@id": "",
			"name": "RANA SINGING BOWL CENTRE",
			"url": "http://www.ranasingingbowlcentre.com/",
			"logo": "http://www.ranasingingbowlcentre.com/images/logo.png",
			"image": "http://www.ranasingingbowlcentre.com/uploads/1599551734ft.png",
			"description": "Rana singing bowl centre is a renowned singing bowl instrument manufacturer , Supplier and Exporters company established in 1999, Offering Handmade Bengali, Nepal and Tibetan singing bowl and Accessories Online, as well as Wholesale Supply, Singing Bowls Dealers in India and surrounding areas.",
			"telephone": " +91-8145214918",
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "63,Brindaban Bazar, Word No.-1",
				"addressLocality": "Ramjibanpur",
				"addressRegion": "Paschim Medinipur",
				"postalCode": "721242",
				"addressCountry": "IN-WB"
			},
			"geo": {
				"@type": "GeoCoordinates",
				"latitude": "22.351115",
				"longitude": "78.667743"
			},
			"address": {
				"@type": "PostalAddress",
				"streetAddress": "18 Raja Rammohan Roy Sarani,Near Saddhyananda Park (Bharat Sebashrawm) ",
				"addressLocality": "Kolkata",
				"addressRegion": "Kolkata",
				"postalCode": "700009",
				"addressCountry": "IN-WB"
			},
			"geo": {
				"@type": "GeoCoordinates",
				"latitude": "22.634293",
				"longitude": "88.286133"
			},
			"openingHours": "Mo, Tu, We, Th, Fr, Sa 10:00-6:30 Su off",
			"priceRange": "Indian Rupee symbol.svg",
			"aggregateRating": {
				"@type": "AggregateRating",
				"ratingValue": "5",
				"reviewCount": "5"
			}
		}
	</script>
    <script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "WebSite",
			"name": "RANA SINGING BOWL CENTRE",
			"alternateName": "singing bowl instrument manufacturer and Tibetan Handmade Singing Bowl Wholesale services",
			"url": "http://www.ranasingingbowlcentre.com/"
		}
	</script>
    <!-- End Schema.org -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DH51MMWEG3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-DH51MMWEG3');
    </script>
    <style>
        .h-650px {
            height: 100%;
        }

        .youtube-sec-outr:after {
            background-size: cover;
        }

        .product-view-slider-sec .slider-nav .slick-slide img {
            height: auto;
        }

        .page-banner-outr {
            background-size: cover !important;
        }

        .product-view-slider-sec .slider-nav .slick-slide img {
            height: 100% !important;
        }

        @media (min-width: 992px) {
            .navbar .btn {
                display: none;
            }
        }

        @media (max-width: 413px) {
            .product-grid-outr .product-grid-col {
                width: 50% !important;
            }

            .product-grid-img {
                width: 9rem;
                height: 9rem;
            }

            .product-grid-img img {
                max-width: 100px;
            }

        }

        @media (max-width: 480px) {
            .carousel-item img {
                aspect-ratio: auto !important;
            }
        }
    </style>
    <!-- link section -->
    {{-- site protection --}}
<script>
    // Disable Right Click
    document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
    });
    document.addEventListener("touchstart", function(e) {
        if (e.touches.length > 1) {
            e.preventDefault();
        }
    }, {
        passive: false
    });

    // Disable Common Keyboard Shortcuts
    document.addEventListener("keydown", function(e) {
        // Disable F12
        if (e.key === "F12") {
            e.preventDefault();
        }

        // Disable Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+U
        if ((e.ctrlKey && e.shiftKey && (e.key.toLowerCase() === "i" || e.key.toLowerCase() === "j")) ||
            (e.ctrlKey && e.key.toLowerCase() === "u")) {
            e.preventDefault();
        }

        // Disable PrintScreen (PrtSc)
        if (e.key === "PrintScreen") {
            e.preventDefault();
        }
    });

    // Basic DevTools Detection
    (function() {
        const element = new Image();
        Object.defineProperty(element, 'id', {
            get: function() {
                throw new Error("DevTools blocked");
            }
        });
        console.log(element);
    })();

    // Disable text selection & copying
    document.addEventListener("selectstart", function(e) {
        e.preventDefault();
    });
</script>

<style>
    /* Prevent text selection with CSS */
    body {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>
</head>

<!--<audio id="bgmusic" autoplay muted>
  <source src="{{ URL::asset('assets/singing-bowls.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>-->
<div id="proccedtologin"
    style="background: rgba(0, 0, 0, 0.4); display: none; position: fixed; width: 100%; height: 100%; overflow: hidden; z-index: 99999; left: 0; top: 0;">
    <div style="position: absolute; width: 100%; height: 100%">
        <div
            style="background: none repeat scroll 0 0 #ffffff; border: 2px solid #666666; border-radius: 5px; left: 50%; position: absolute; top: 50%; width: 280px; text-align: center; transform: translateX(-50%); transform: -webkit-translateX(-50%); -moz-transform: translateX(-50%); padding-top: 10px;">
            processing...<div
                style="color: #000000; font-size: 12px; font-weight: bold; padding: 5px; text-align: center;"
                id="loginmsg"></div>
        </div>
    </div>
</div>
<body>
    <p id="back-top">
        <a href="#top"><span class="totop"><i class="fa fa-chevron-up" aria-hidden="true"></i>
            </span></a>
    </p>
    <a class="whatsapp-sticky" target="_blank" href="https://wa.me/8145214918?text=Hi"><i
            class="fa-brands fa-2x fa-whatsapp"></i></a>
    <button type="button" class="btn btn-query" data-bs-toggle="modal" data-bs-target="#exampleModalquery">
        <i class="fa-solid fa-angle-left"></i> Any Query
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalquery" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Send Your Query</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body query-modal-body">
                    <form action="JavaScript:void(0)" method="post" name="enquiryFrm" id="enquiryFrm">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name" required
                                placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="Email ID">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="phone" name="phone" required
                                placeholder="Phone No">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" placeholder="Message" name="message" id="message" required rows="6"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn dwnld-btn">Submit</button>
                        </div>
                        <p class="text-danger" id="errorMsgEnquiry"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <header class="header-outr">
        <div class="top-header">
            <div class="container">
                <div class="d-flex align-items-center justify-content-end topheader-inr">
                    <div class="topbar-left">
                        <ul class="d-flex align-items-center">
                            <li class="phone-mnu"><i class="fa-solid fa-envelope"></i> <a
                                    href="mailto:info@ranasingingbowlcentre.com">info@ranasingingbowlcentre.com </a>
                                {{-- <span>/</span> <a
                                    href="tel:{{ siteSettings()->alt_ph_no }}">{{ siteSettings()->alt_ph_no }}</a> --}}
                            </li>
                            <li class="search-menu">
                                <button class="btn search-btn" id="search"><i
                                        class="fa-solid fa-magnifying-glass"></i> Search Any
                                    Product</button>
                                <div class="search_input" id="search_input_box">
                                    <form class="d-flex justify-content-between search-inner align-items-center"
                                        method="GET" action="{{ route('search') }}">
                                        <input type="text" class="form-control" id="search_input" name="keyword"
                                            value="{{ request()->input('search') }}" required
                                            placeholder="Search Here">
                                        <button type="submit" class="btn search-btn">Search</button>
                                        <span class="btn-close" id="close_search" title="Close Search"></span>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-right">
                        <ul class="d-flex align-items-center">
                            <li><a class="dwnld-btn btn" href="{{ URL::asset('uploads/rana-catalog.pdf') }}"
                                    title="Download Catalouge">Download Catalouge</a></li>
                            <li>
                                <div class="shop-link btn">For Online Shopping : <a
                                        href="https://www.indiancraftcentre.com/" target="_blank"
                                        title="indiancraftcentre">www.indiancraftcentre.com</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="menubar-outr">
            <div class="container">
                <nav class="navbar navbar-expand-lg row">
                    <div class="container-fluid">
                        <a class="navbar-brand logo" href="{{ route('home') }}" title="home"><img
                                src="{{ URL::asset('assets/images/logo.png') }}" alt="" /></a>
                        <button class="btn" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">

                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-start text-bg-dark" id="offcanvasExample"
                            aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasDarkLabel"><img
                                        src="{{ URL::asset('assets/images/logo.png') }}" alt="" /></h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 menubar">
                                    <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                                        <a class="nav-link" aria-current="page"
                                            href="{{ route('home') }}"><span>Home</span></a>
                                    </li>
                                    <li class="nav-item {{ Route::currentRouteName() == 'aboutUs' ? 'active' : '' }}">
                                        <a class="nav-link" aria-current="page"
                                            href="{{ route('aboutUs') }}"><span>ABOUT US </span></a>
                                    </li>
                                    <li class="nav-item dropdown {{ Route::currentRouteName() == 'category' ? 'active' : '' }}">
                                        <a class="nav-link" href="#" role="button">
                                            <span>OUR PRODUCTS</span>
                                        </a>
                                        <i class="dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"></i>
                                        <div class="dropdown-menu">
                                            <div class="container">
                                                <div class="tab-outr d-flex vertical-tab-outr row">
                                                    <ul class="nav nav-tabs d-none d-lg-flex col-lg-2" id="myTab"
                                                        role="tablist">
                                                        @php
                                                            $menuCategory = headerMenuCategory();
                                                        @endphp
                                                        @if (isset($menuCategory) && count($menuCategory) > 0)
                                                            @foreach ($menuCategory as $keyMenu => $valMenu)
                                                                @php
                                                                    $currentSlug = request()->route('slug');
                                                                    $isActive =
                                                                        $currentSlug === $valMenu->slug ? 'active' : '';
                                                                @endphp
                                                                <li class="nav-item" role="presentation">
                                                                    <a class="nav-link {{ $keyMenu == 0 ? 'active' : '' }}"
                                                                        id="home-tab-{{ $valMenu->id }}"
                                                                        data-href="{{ route('category', ['slug' => $valMenu->slug]) }}"
                                                                        data-bs-toggle="tab"
                                                                        data-bs-target="#home-tab-pane-{{ $valMenu->id }}"
                                                                        type="button" role="tab"
                                                                        aria-controls="home-tab-pane-{{ $valMenu->id }}"
                                                                        aria-selected="true"
                                                                        target="_blank">{{ $valMenu->title }}</a>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                    <div class="tab-content accordion col-lg-10" id="myTabContent">
                                                        @if (isset($menuCategory) && count($menuCategory) > 0)
                                                            @foreach ($menuCategory as $keyMenu => $valMenu)
                                                                <div class="tab-pane fade {{ $keyMenu == 0 ? 'show active' : '' }} accordion-item"
                                                                    id="home-tab-pane-{{ $valMenu->id }}"
                                                                    role="tabpanel"
                                                                    aria-labelledby="home-tab-{{ $valMenu->id }}"
                                                                    tabindex="0">

                                                                    <h2 class="accordion-header d-lg-none"
                                                                        id="headingOne_{{ $valMenu->id }}">
                                                                        <a class="accordion-button"
                                                                            href="{{ route('category', ['slug' => $valMenu->slug]) }}"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseOne_{{ $valMenu->id }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapseOne_{{ $valMenu->id }}">{{ $valMenu->title }}</a>
                                                                    </h2>
                                                                    <div id="collapseOne_{{ $valMenu->id }}"
                                                                        class="accordion-collapse collapse show d-lg-block"
                                                                        aria-labelledby="headingOne_{{ $valMenu->id }}"
                                                                        data-bs-parent="#myTabContent">
                                                                        <div class="accordion-body">
                                                                            <h3>{{ $valMenu->title }}</h3>
                                                                            <div class="menu-product-outr">
                                                                                <div class="row">
                                                                                    @if ($valMenu->product->count() > 0)
                                                                                        @foreach ($valMenu->product as $product)
                                                                                            <div class="col-lg-3">
                                                                                                <a
                                                                                                    href="{{ route('products', [$valMenu->slug, createSlug($product->title)]) }}">
                                                                                                    <div
                                                                                                        class="header-item">
                                                                                                        <div
                                                                                                            class="header-item-img">
                                                                                                            <img src="{{ URL::asset($product->image) }}"
                                                                                                                alt="{{ $product->title }}">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="header-item-text">
                                                                                                            <h6>{{ $product->title }}
                                                                                                            </h6>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="menu-product-footer d-flex">
                                                                                <p>Tradition. Craftsmanship. Sound
                                                                                    Healing.</p>
                                                                                <a class="shop-link btn"
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">VIEW
                                                                                    aLL</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <div class="tab-pane fade accordion-item"
                                                            id="profile-tab-pane" role="tabpanel"
                                                            aria-labelledby="profile-tab" tabindex="0">
                                                            <h2 class="accordion-header d-lg-none" id="headingTwo">
                                                                <a class="accordion-button collapsed" href="#"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwo"
                                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                                    Therapy Gongs
                                                                </a>
                                                            </h2>
                                                            <div id="collapseTwo"
                                                                class="accordion-collapse collapse d-lg-block"
                                                                aria-labelledby="headingTwo"
                                                                data-bs-parent="#myTabContent">
                                                                <div class="accordion-body">
                                                                    <h3>Therapy Gongs</h3>
                                                                    <div class="menu-product-outr">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="menu-product-footer d-flex">
                                                                        <p>Tradition. Craftsmanship. Sound
                                                                            Healing.</p>
                                                                        <a class="shop-link btn" href="#">VIEW
                                                                            aLL</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade accordion-item"
                                                            id="contact-tab-pane" role="tabpanel"
                                                            aria-labelledby="contact-tab" tabindex="0">
                                                            <h2 class="accordion-header d-lg-none" id="headingThree">
                                                                <a class="accordion-button collapsed" href="#"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseThree"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseThree">
                                                                    Singing Bells & Dorji
                                                                </a>
                                                            </h2>
                                                            <div id="collapseThree"
                                                                class="accordion-collapse collapse d-lg-block"
                                                                aria-labelledby="headingThree"
                                                                data-bs-parent="#myTabContent">
                                                                <div class="accordion-body">
                                                                    <h3>Singing Bells & Dorji</h3>
                                                                    <div class="menu-product-outr">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <a
                                                                                    href="{{ route('category', ['slug' => $valMenu->slug]) }}">
                                                                                    <div class="header-item">
                                                                                        <div class="header-item-img">
                                                                                            <img src="https://www.ranasingingbowlcentre.com/uploads/products/products/1598793205ex_largee.png"
                                                                                                alt="DEEP RESONANCE BOWL (JAMBATI)">
                                                                                        </div>
                                                                                        <div class="header-item-text">
                                                                                            <h6>RAMGANDI
                                                                                                SINGING BOWL
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="menu-product-footer d-flex">
                                                                        <p>Tradition. Craftsmanship. Sound
                                                                            Healing.</p>
                                                                        <a class="shop-link btn" href="#">VIEW
                                                                            aLL</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="nav-item {{ Route::currentRouteName() == 'exhibition' ? 'active' : '' }}">
                                        <a class="nav-link" aria-current="page"
                                            href="{{ route('exhibition') }}"><span>EXHIBITION</span></a>
                                    </li>
                                    <li
                                        class="nav-item {{ Route::currentRouteName() == 'franchise' ? 'active' : '' }}">
                                        <a class="nav-link" aria-current="page"
                                            href="{{ route('franchise') }}"><span>FRANCHISE</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="/blog"><span>BLOG</span></a>
                                    </li>
                                    <li
                                        class="nav-item {{ Route::currentRouteName() == 'contactUs' ? 'active' : '' }}">
                                        <a class="nav-link" aria-current="page"
                                            href="{{ route('contactUs') }}"><span>CONTACT US</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
