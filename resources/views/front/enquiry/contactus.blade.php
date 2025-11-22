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
    <section class="contact-grid-outr">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 contact-box-col" data-aos="fade-up">
                    <div class="contact-box-outr text-center">
                        <i class="mb-3"><img src="{{ URL::asset('assets/images/contact-box-icon1.png') }}"
                                alt="" /></i>
                        <h3>Registered Office</h3>
                        {!! siteSettings()->address !!}
                    </div>
                </div>
                <div class="col-sm-3 contact-box-col" data-aos="fade-up">
                    <div class="contact-box-outr text-center">
                        <i class="mb-3"><img src="{{ URL::asset('assets/images/contact-box-icon1.png') }}"
                                alt="" /></i>
                        <h3>Corporate Office</h3>
                        {!! siteSettings()->head_address !!}
                    </div>
                </div>
                <div class="col-sm-3 contact-box-col" data-aos="fade-up">
                    <div class="contact-box-outr text-center">
                        <i class="mb-3"><img src="{{ URL::asset('assets/images/contact-box-icon4.png') }}"
                                alt="" /></i>
                        <h3>Lets Talk With Us</h3>
                        <ul>
                            <li><a href="tel:{{ siteSettings()->ph_no }}">{{ siteSettings()->ph_no }} </a></li>
                            <li><a href="tel:{{ siteSettings()->alt_ph_no }}">{{ siteSettings()->alt_ph_no }} </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 contact-box-col" data-aos="fade-up">
                    <div class="contact-box-outr text-center">
                        <i class="mb-3"><img src="{{ URL::asset('assets/images/contact-box-icon3.png') }}"
                                alt="" /></i>
                        <h3>Mail us for query</h3>
                        <ul>
                            <li><a href="mailto:{{ siteSettings()->email }}">{{ siteSettings()->email }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-form-sec-outr">
        <div class="container">
            <div class="contact-form-grid-outr mt-5 mb-5" data-aos="fade-left">
                <div class="text-center contact-form-heading mb-3">
                    <p>Feel free to get in touch!</p>
                    <h3>How we can help you?</h3>
                </div>
                <div class="contact-form-box-col">
                    <form action="JavaScript:void(0)" method="post" name="contactFrm" id="contactFrm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                        placeholder="Your Phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <input type="text" class="form-control" name="country" id="country"
                                        placeholder="Country" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" name="message" id="message" rows="6" placeholder="Your Message"></textarea>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <p>We are committed to protecting your privacy. We will never
                                collect information about you without your explicit consent.</p>
                            <button type="submit" class="btn shop-link">Send Message</button>
                        </div>
                        <p class="text-danger" id="errorMsg"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-map-outr">
        <div class="container pb-5" data-aos="fade-right">
            <iframe width="100%" height="550" frameborder="0" allowfullscreen="" style="border:0"
                src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d58837.69865524157!2d87.57461963188597!3d22.826308760286203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x39f81c9b03542393%3A0xb13d60d2c92d5c14!2sRana+Villa%2C+Singing+Bowl+Centre%2C%2C+Rana%2C+West+Bengal+721242!3m2!1d22.8262339!2d87.6115277!5e0!3m2!1sen!2sin!4v1440485038702"></iframe>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#contactFrm').on('submit', function(e) {
                e.preventDefault();
                $('#errorMsg').html('');

                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'contact' }).then(function(token) {
                        // Append token to form
                        $('#contactFrm').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');

                        var formData = $('#contactFrm').serialize();
                        $('#proccedtologin').show();

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('contactUsSubmit') }}',
                            data: formData,
                            success: function(response) {
                                if (response.status == 'success') {
                                    $('#loginmsg').html(response.message);
                                    setTimeout(() => {
                                        $('#proccedtologin').hide();
                                    }, 4000);
                                    $('#contactFrm')[0].reset();
                                } else {
                                    $('#errorMsg').html('There was an error sending your message. Please try again.');
                                    $('#proccedtologin').hide();
                                }
                            },
                            error: function() {
                                $('#errorMsg').html('There was an error sending your message. Please try again.');
                                $('#proccedtologin').hide();
                            }
                        });
                    });
                });
            });
        });

    </script>
@endsection
