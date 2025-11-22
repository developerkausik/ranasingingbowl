<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rana Singing Bowl Admin | Login</title>

    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('adminassets/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/css/vertical-layout-light/style.css') }}">
</head>

<body>
    <div id="proccedtologin"
        style="background: rgba(0, 0, 0, 0.4); display: none; position: fixed; width: 100%; height: 100%; overflow: hidden; z-index: 999; left: 0; top: 0;">
        <div style="position: absolute; width: 100%; height: 100%">
            <div
                style="background: none repeat scroll 0 0 #ffffff; border: 2px solid #666666; border-radius: 5px; left: 50%; position: absolute; top: 50%; width: 280px; text-align: center; transform: translateX(-50%); transform: -webkit-translateX(-50%); -moz-transform: translateX(-50%); padding-top: 10px;">
                processing...<div
                    style="color: #000000; font-size: 12px; font-weight: bold; padding: 5px; text-align: center;"
                    id="loginmsg"></div>
            </div>
        </div>
    </div>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <center><img src="{{URL::asset('assets/images/logo.png')}}" alt="" style="margin-bottom: 50px"></center>
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <h4>Hello! let's get started</h4>
                            <h6 class="fw-light">Sign in to continue.</h6>
                            <form action="#" name="loginFrm" id="loginFrm" method="post">
                                <div class="form-group">
                                    <label class="label">Email ID</label>
                                    <div class="input-group">
                                        <input type="email" id="login-email" name="email" class="form-control"
                                            placeholder="Email ID" required style="height: 35px;">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-email-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="login-password" name="password" class="form-control"
                                            placeholder="*********" required style="height: 35px;">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-security"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-2"><i class="ti-lock btn-icon-prepend"></i> Login</button>
                                </div>
                                <div id="msg"></div>
                                <div class="text-block text-center my-3">
                                    <span class="text-small font-weight-semibold">copyright <?php echo date('Y'); ?>. All rights reserved.</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script src="{{ URL::asset('adminassets/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ URL::asset('adminassets/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ URL::asset('adminassets/assets/js/off-canvas.js') }}"></script>
    <script src="{{ URL::asset('adminassets/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ URL::asset('adminassets/assets/js/template.js') }}"></script>
    <script src="{{ URL::asset('adminassets/assets/js/settings.js') }}"></script>
    <script src="{{ URL::asset('adminassets/assets/js/todolist.js') }}"></script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            $('#loginFrm').submit(function() {
                $('#msg').removeClass('text-danger');
                $('#msg').html('');
                $('#proccedtologin').show();
                $.ajax({
                    url: "{{ route('adminLoginPost') }}",
                    data: $('#loginFrm').serialize(),
                    type: 'post',
                    error: function(xhr, textStatus, errorThrown) {
                        var err = JSON.parse(xhr.responseText);
                        $('#msg').addClass('text-danger');
                        $('#msg').html(err.message);
                        $('#proccedtologin').hide();
                    },
                    success: function(data) {
                        $('#loginmsg').html('Successfully Loged in!!<br> Please wait...');
                        setTimeout(function() {
                            window.location.href =
                                "{{ route('adminDashboard') }}";
                        }, 1000);
                    }
                });
                return false;
            });
        });
    </script>
</body>
<style>
    .auth.auth-bg-1 {
        background: linear-gradient(180deg, rgb(255, 255, 255) 0%, rgb(0, 0, 0) 100%);
    }
</style>
</html>
