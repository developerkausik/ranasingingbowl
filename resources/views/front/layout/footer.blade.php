<footer class="footer">
    <div class="footer-inr" style="background-image: url('{{ URL::asset('assets/images/footer-bg.png') }}');">
        <div class="container">
            <div class="footr-mnu-outr d-flex justify-content-center">
                <ul class="d-flex justify-content-center flex-wrap">
                    <li><a href="{{ route('home') }}">Home </a></li>
                    <li><a href="{{ route('laser') }}">laser </a></li>
                    <li><a href="{{ route('aboutUs') }}">company profile </a></li>
                    <li><a href="{{ route('gallery') }}">gallery </a></li>
                    <li><a href="{{ route('video') }}">videos </a></li>
                    <li><a href="{{ route('infrastructure') }}">Infrastructure</a></li>
                    <li><a href="{{ route('contactUs') }}">Contact us </a></li>
                    <li><a href="{{ route('franchise') }}">Franchise </a></li>
                    <li><a href="/blog" target="_blank">Blog</a></li>
                </ul>
            </div>
            <div class="footer-logo-outr d-flex justify-content-center">
                <a href="{{ route('home') }}"><img src="{{ URL::asset('assets/images/footer-logo.png') }}"
                        alt="logo" /></a>
            </div>
            <div class="footer-social-outr d-flex justify-content-center">
                <ul class="d-flex justify-content-center">
                    <li><a href="{{ siteSettings()->fb_link }}" target="_blank" title="facebook"><i
                                class="fa-brands fa-lg fa-facebook-f"></i></a></li>
                    <li><a href="{{ siteSettings()->insta_link }}" target="_blank" title="instagram"><i
                                class="fa-brands fa-lg fa-instagram"></i></a></li>
                    <li><a href="{{ siteSettings()->twitter_link }}" target="_blank" title="twitter"><i
                                class="fa-brands fa-lg fa-x-twitter"></i></a></li>
                </ul>
            </div>
            <div class="copyright-outr d-flex justify-content-center">
                <p>&copy; Copyright {{ date('Y') }} | All Right Reserved</p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ URL::asset('assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>


<script>
    $(document).ready(function() {
        $('#enquiryFrm').on('submit', function(e) {
            e.preventDefault();
            $('#errorMsgEnquiry').html('');

            // Run Google reCAPTCHA v3
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'enquiry' }).then(function(token) {
                    // Append the token to the form before serializing
                    if ($('#enquiryFrm input[name="g-recaptcha-response"]').length === 0) {
                        $('#enquiryFrm').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                    } else {
                        $('#enquiryFrm input[name="g-recaptcha-response"]').val(token);
                    }

                    var formData = $('#enquiryFrm').serialize();
                    $('#proccedtologin').show();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('enquirySubmit') }}',
                        data: formData,
                        success: function(response) {
                            if (response.status === 'success') {
                                $('#loginmsg').html(response.message);
                                setTimeout(() => {
                                    $('#proccedtologin').hide();
                                }, 4000);
                                $('#enquiryFrm')[0].reset();
                            } else {
                                $('#errorMsgEnquiry').html('There was an error sending your message. Please try again.');
                                $('#proccedtologin').hide();
                            }
                        },
                        error: function() {
                            $('#errorMsgEnquiry').html('There was an error sending your message. Please try again.');
                            $('#proccedtologin').hide();
                        }
                    });
                });
            });
        });
    });
</script>

<script src="{{ URL::asset('assets/js/bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/owl.carousel.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/cloudzoom.js') }}"></script>
<script src="{{ URL::asset('assets/js/custom.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/fancybox/fancybox.umd.js') }}"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        // Transition effect when changing gallery items
        Carousel: {
            transition: "slide",
        },
        // Disable image zoom animation on opening and closing
        Images: {
            zoom: false,
        },
        // Custom CSS transition on opening
        showClass: "f-fadeIn",
    });
</script>
<script src="{{ URL::asset('assets/js/script.js') }}" type="text/javascript"></script>

<script src='https://unpkg.com/atropos@1.0.2/atropos.min.js'></script>
<script src="{{ URL::asset('assets/js/atrposscript.js') }}"></script>

<script>
    $(document).ready(function() {
        // get video source from data-src button
        var $videoSrc;
        $('.video-btn2').click(function() {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);
        // autoplay video on modal load
        $('#exampleModalvideo').on('shown.bs.modal', function(e) {
            // youtube iframe configuration and settings
            $("#video2").attr('src', $videoSrc +
                "?autoplay=1&rel=0&controls=1&loop=1&modestbranding=1");
        })
        // stop playing the youtube video when modal closed
        $('#exampleModalvideo').on('hide.bs.modal', function(e) {
            // stop video
            $("#video2").attr('src', $videoSrc);
        })
    });
</script>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        easing: 'ease-out-back',
        duration: 500,
        delay: 500,
        offset: 80,
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.innerWidth >= 992) {
            document.querySelectorAll('.dropdown').forEach(function(dropdown) {
                dropdown.addEventListener('mouseover', function() {
                    let menu = dropdown.querySelector('.dropdown-menu');
                    menu.classList.add('show');
                });
                dropdown.addEventListener('mouseleave', function() {
                    let menu = dropdown.querySelector('.dropdown-menu');
                    menu.classList.remove('show');
                });
            });
        }
    });
	document.querySelector('.dropdown-menu').addEventListener('click', function(event) {
        event.stopPropagation();
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const offcanvasElements = document.querySelectorAll('.offcanvas');

    offcanvasElements.forEach(offcanvas => {
        // When Offcanvas is about to show
        offcanvas.addEventListener('show.bs.offcanvas', () => {
            // Disable scrolling
            document.documentElement.style.overflow = 'hidden'; // html
            document.body.style.overflow = 'hidden';           // body

            // Remove Bootstrap padding compensation
            document.body.style.paddingRight = '0';

            // Remove any transform
            document.documentElement.style.transform = 'none';
            document.body.style.transform = 'none';
        });

        // When Offcanvas is fully hidden
        offcanvas.addEventListener('hidden.bs.offcanvas', () => {
            // Reset everything
            document.documentElement.style.overflow = '';
            document.body.style.overflow = '';
            document.body.style.paddingRight = '';
            document.documentElement.style.removeProperty('transform');
            document.body.style.removeProperty('transform');
        });
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-tabs .nav-link");

    // Enable tab switching on hover for desktop
    function enableHoverTabs() {
        if (window.innerWidth >= 992) { // Desktop
            navLinks.forEach(link => {
                link.addEventListener("mouseenter", function () {
                    const tabTrigger = new bootstrap.Tab(this);
                    tabTrigger.show();
                });
            });
        } else {
            navLinks.forEach(link => {
                link.removeEventListener("mouseenter", function () {});
            });
        }
    }

    enableHoverTabs();
    window.addEventListener("resize", enableHoverTabs);

    // Single click = go to data-href page
    navLinks.forEach(link => {
        const href = link.getAttribute("data-href");
        if (href) {
            link.addEventListener("click", function (e) {
                e.preventDefault(); // stop Bootstrap default tab-only behavior
                window.location.href = href; // open page directly
            });
        }
    });
});
</script>



<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
</body>

</html>
