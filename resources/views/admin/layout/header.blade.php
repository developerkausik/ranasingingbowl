<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Rana Singing Bowl Admin</title>

    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('adminassets/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('adminassets/assets/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
<style>
    .navbar .navbar-brand-wrapper .navbar-brand img {
	height: auto !important;
}
</style>

</head>

<body>
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
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start"
                style="background: #020202">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu" style="color: #f1f1f1"></span>
                    </button>
                </div>
                <a class="navbar-brand brand-logo" href="{{ route('adminDashboard') }}">
                    <img src="{{ URL::asset('assets/images/logo.png') }}" alt="logo" width="75" /> </a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('adminDashboard') }}">
                    <img src="{{ URL::asset('assets/images/logo.png') }}" alt="logo" width="75"  /> </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Welcome, <span
                                class="text-black fw-bold">{{ currentUser()->name }}</span></h1>
                        <h3 class="welcome-sub-text">Date : {{ date('l, dS, F Y ') }}</h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle"
                                src="{{ URL::asset('adminassets/assets/images/user.png') }}" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle"
                                    src="{{ URL::asset('adminassets/assets/images/user.png') }}" alt="Profile image"
                                    width="100">
                                <p class="mb-1 mt-3 font-weight-semibold">{{ currentUser()->name }}</p>
                                <p class="fw-light text-muted mb-0">{{ currentUser()->email }}</p>
                            </div>
                            <a class="dropdown-item" href="{{ route('adminSettings') }}"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profile </a>
                            <a class="dropdown-item" href="{{ route('profilePassword') }}"><i
                                    class="dropdown-item-icon mdi mdi-key-variant text-primary me-2"></i> Change
                                Password </a>
                            <a class="dropdown-item" href="{{ route('adminLogout') }}"><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
