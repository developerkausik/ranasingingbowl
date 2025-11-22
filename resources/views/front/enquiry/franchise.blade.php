@extends('front.layout.app')
@section('content')
    <section class="page-banner-outr" style="background: url('{{ URL::asset($banner->image) }}')">
        <div class="overlay">
            <div class="page-banner-caption-outr">
                <div class="container text-center" data-aos="fade-up">
                    <h1>Franchise</h1>
                    <p>Become a Proud Franchise Partner of Rana Singing Bowl Centre</p>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-form-sec-outr">
        <div class="container">
            <div class="contact-form-grid-outr mt-5 mb-5" data-aos="fade-left">
                <div class="text-center contact-form-heading mb-3">
                    <h3>Franchise Application Form</h3>
                </div>
                <div class="contact-form-box-col">
                   <form action="JavaScript:Void(0);" method="POST" id="franchiseApplyFrm" name="franchiseApplyFrm">
                        @csrf
                        <p class="form-section-title"> Personal Details</p>
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone No</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob"
                                title="Date of Birth">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                title="Address">
                        </div>
                        <p class="form-section-title"> Business Information</p>
                        <div class="mb-3">
                            <label for="occupation">Current Occupation / Business</label>
                            <input type="text" class="form-control" id="occupation" name="occupation"
                                title="Current Occupation / Business">
                        </div>
                        <div class="mb-3">
                            <label for="business_name">Company Name (if applicable)</label>
                            <input type="text" class="form-control" id="business_name" name="business_name"
                                title="Business Name">
                        </div>
                        <div class="mb-3">
                            <label for="experience">Years of Business Experience</label>
                            <input type="text" class="form-control" id="experience" name="experience"  title="Years of Business Experience">
                        </div>
                        <p class="form-section-title"> Franchise Preference</p>
                        <div class="mb-3">
                            <label for="location">Preferred Location (City/State)</label>
                            <input type="text" class="form-control" id="location" name="location" title="Preferred Location" required>
                        </div>
                        <div class="mb-3">
                            <label for="investment">Investment Budget</label>
                            <input type="text" class="form-control" id="investment" name="investment" title="Investment Budget" required>
                        </div>
                        <div class="mb-3">
                            <label for="reason">Reason for Choosing Our Franchise</label>
                            <input type="text" class="form-control" id="reason" name="reason" title="Reason for Choosing Our Franchise" required>
                        </div>
                        <p class="form-section-title"> Financial Information</p>
                        <div class="mb-3">
                            <label for="capital">Available Capital for Investment</label>
                            <input type="text" class="form-control" id="capital" name="capital" title="Available Capital for Investment">
                        </div>
                        <div class="mb-3">
                            <label for="source_of_funds">Source of Funding (Self / Loan / Investors)</label>
                            <input type="text" class="form-control" id="source_of_funds" name="source_of_funds" title="Source of Funding">
                        </div>
                        <p class="form-section-title"> Other Information</p>
                        <div class="mb-3">
                            <label for="hear_about_us"> How did you hear about us?</label>
                            <input type="text" class="form-control" id="hear_about_us" name="hear_about_us" title="How did you hear about us?">
                        </div>
                        <div class="mb-3">
                            <label for="expected_start_date"> Expected Start Date</label>
                            <input type="date" class="form-control" id="expected_start_date" name="expected_start_date" title="Expected Start Date" required>
                        </div>
                        <div class="mb-3">
                            <label for="comments"> Any Additional Comments</label>
                            <textarea class="form-control" rows="6" id="comments" name="comments"></textarea>
                        </div>
                        <div class="mb-3">
                             <label for="tnc"><input type="checkbox" required name="tnc" id="tnc" value="1"> I hereby declare that all the information provided above is true and correct</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn dwnld-btn">Submit Application</button>
                        </div>
                        <p class="text-danger" id="errorMsg"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<style>
    .contact-form-box-col .form-control{
        height: auto !important;
    }
    .form-section-title {
        background: #682500;
        color: #fff;
        padding: 5px 10px;
    }
</style>
    <script>
        $(document).ready(function() {
            $('#franchiseApplyFrm').on('submit', function(e) {
                $('#errorMsg').html('');
                e.preventDefault();
                var formData = $(this).serialize();
                $('#proccedtologin').show();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('franchiseSubmit') }}',
                    data: formData,
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#loginmsg').html(response.message);
                            setTimeout(() => {
                                $('#proccedtologin').hide();
                            }, 4000);
                            $('#franchiseApplyFrm')[0].reset();
                        } else {
                            $('#errorMsg').html(
                                'There was an error sending your message. Please try again.'
                            );
                            $('#proccedtologin').hide();
                        }
                    },
                    error: function() {
                        $('#errorMsg').html(
                            'There was an error sending your message. Please try again.');
                        $('#proccedtologin').hide();
                    }
                });
            });
        });
    </script>
@endsection
