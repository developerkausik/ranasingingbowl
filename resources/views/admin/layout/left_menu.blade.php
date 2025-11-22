<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminDashboard') }}">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li
                class="nav-item @php echo (Route::currentRouteName() == 'adminBanner'
                || Route::currentRouteName() == 'adminBannerAdd'
                || Route::currentRouteName() == 'adminBannerUpdate'
                || Route::currentRouteName() == 'adminCms'
                || Route::currentRouteName() == 'adminCmsAdd'
                || Route::currentRouteName() == 'adminCmsUpdate'
                || Route::currentRouteName() == 'adminLaserImage'
                || Route::currentRouteName() == 'adminLaserImageAdd'
                || Route::currentRouteName() == 'adminLaserImageUpdate') ? 'active' : ''; @endphp">
                <a class="nav-link" data-bs-toggle="collapse" href="#cms" aria-expanded="false" aria-controls="cms">
                    <i class="menu-icon mdi mdi-file-document "></i>
                    <span class="menu-title">CMS</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse @php echo (Route::currentRouteName() == 'adminBanner'
                || Route::currentRouteName() == 'adminBannerAdd'
                || Route::currentRouteName() == 'adminBannerUpdate'
                || Route::currentRouteName() == 'adminCms'
                || Route::currentRouteName() == 'adminCmsAdd'
                || Route::currentRouteName() == 'adminCmsUpdate'
                || Route::currentRouteName() == 'adminLaserImage'
                || Route::currentRouteName() == 'adminLaserImageAdd'
                || Route::currentRouteName() == 'adminLaserImageUpdate') ? 'show' : ''; @endphp"
                    id="cms">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminBanner' || Route::currentRouteName() == 'adminBannerUpdate' || Route::currentRouteName() == 'adminBannerAdd') ? 'active' : ''; @endphp"
                                href="{{ route('adminBanner') }}">Banner Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminCms' || Route::currentRouteName() == 'adminCmsUpdate' || Route::currentRouteName() == 'adminCmsAdd') ? 'active' : ''; @endphp"
                                href="{{ route('adminCms') }}">Page Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminLaserImage' || Route::currentRouteName() == 'adminLaserImageUpdate' || Route::currentRouteName() == 'adminLaserImageAdd') ? 'active' : ''; @endphp"
                                href="{{ route('adminLaserImage') }}">Laser Image</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item @php echo (Route::currentRouteName() == 'adminGalleryPicture'
                || Route::currentRouteName() == 'adminGalleryPictureAdd'
                || Route::currentRouteName() == 'adminGalleryPictureUpdate'
                || Route::currentRouteName() == 'adminGalleryVideo'
                || Route::currentRouteName() == 'adminGalleryVideoAdd'
                || Route::currentRouteName() == 'adminGalleryVideoUpdate') ? 'active' : ''; @endphp">
                <a class="nav-link" data-bs-toggle="collapse" href="#gallery" aria-expanded="false"
                    aria-controls="gallery">
                    <i class="menu-icon mdi mdi-file-document "></i>
                    <span class="menu-title">Gallery</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse @php echo (Route::currentRouteName() == 'adminGalleryPicture'
                || Route::currentRouteName() == 'adminGalleryPictureAdd'
                || Route::currentRouteName() == 'adminGalleryPictureUpdate'
                || Route::currentRouteName() == 'adminGalleryVideo'
                || Route::currentRouteName() == 'adminGalleryVideoAdd'
                || Route::currentRouteName() == 'adminGalleryVideoUpdate') ? 'show' : ''; @endphp"
                    id="gallery">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminGalleryPicture' || Route::currentRouteName() == 'adminGalleryPictureUpdate' || Route::currentRouteName() == 'adminGalleryPictureAdd') ? 'active' : ''; @endphp"
                                href="{{ route('adminGalleryPicture') }}">Picture</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminGalleryVideo' || Route::currentRouteName() == 'adminGalleryVideoUpdate' || Route::currentRouteName() == 'adminGalleryVideoAdd') ? 'active' : ''; @endphp"
                                href="{{ route('adminGalleryVideo') }}">Video</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item @php echo (Route::currentRouteName() == 'adminProductCategory'
                || Route::currentRouteName() == 'adminProductCategoryAdd'
                || Route::currentRouteName() == 'adminProductCategoryUpdate'
                || Route::currentRouteName() == 'adminProduct'
                || Route::currentRouteName() == 'adminProductAdd'
                || Route::currentRouteName() == 'adminProductUpdate') ? 'active' : ''; @endphp">
                <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false"
                    aria-controls="product">
                    <i class="menu-icon mdi mdi-file-document "></i>
                    <span class="menu-title">Products</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse @php echo (Route::currentRouteName() == 'adminProductCategory'
                || Route::currentRouteName() == 'adminProductCategoryAdd'
                || Route::currentRouteName() == 'adminProductCategoryUpdate'
                || Route::currentRouteName() == 'adminProduct'
                || Route::currentRouteName() == 'adminProductAdd'
                || Route::currentRouteName() == 'adminProductUpdate') ? 'show' : ''; @endphp"
                    id="product">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminProductCategory' || Route::currentRouteName() == 'adminProductCategoryUpdate' || Route::currentRouteName() == 'adminProductCategoryAdd') ? 'active' : ''; @endphp"
                                href="{{ route('adminProductCategory') }}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminProduct' || Route::currentRouteName() == 'adminProductUpdate' || Route::currentRouteName() == 'adminProductAdd') ? 'active' : ''; @endphp"
                                href="{{ route('adminProduct') }}">Product</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item @php echo (Route::currentRouteName() == 'adminExhibitions' || Route::currentRouteName() == 'adminExhibitionsAdd' || Route::currentRouteName() == 'adminExhibitionsUpdate') ? 'active' : ''; @endphp">
                <a class="nav-link" href="{{ route('adminExhibitions') }}">
                    <i class="mdi mdi-mail menu-icon"></i>
                    <span class="menu-title">Exhibitions</span>
                </a>
            </li>
            <li
                class="nav-item @php echo (Route::currentRouteName() == 'adminProductEnquiry'
                || Route::currentRouteName() == 'adminContactEnquiry'
                || Route::currentRouteName() == 'adminEnquiry') ? 'active' : ''; @endphp">
                <a class="nav-link" data-bs-toggle="collapse" href="#enquiry" aria-expanded="false"
                    aria-controls="enquiry">
                    <i class="menu-icon mdi mdi-file-document "></i>
                    <span class="menu-title">Enquiry</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse @php echo (Route::currentRouteName() == 'adminProductEnquiry'
                || Route::currentRouteName() == 'adminContactEnquiry'
                || Route::currentRouteName() == 'adminEnquiry') ? 'show' : ''; @endphp"
                    id="enquiry">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminProductEnquiry') ? 'active' : ''; @endphp"
                                href="{{ route('adminProductEnquiry') }}">Product Enquiry</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminContactEnquiry') ? 'active' : ''; @endphp"
                                href="{{ route('adminContactEnquiry') }}">Contact Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminEnquiry') ? 'active' : ''; @endphp"
                                href="{{ route('adminEnquiry') }}">Enquiry Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminFranchiseEnquiry') ? 'active' : ''; @endphp"
                                href="{{ route('adminFranchiseEnquiry') }}">Franchise Request</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item @php echo (Route::currentRouteName() == 'adminTestimonials' || Route::currentRouteName() == 'adminTestimonialsAdd' || Route::currentRouteName() == 'adminTestimonialsUpdate') ? 'active' : ''; @endphp">
                <a class="nav-link" href="{{ route('adminTestimonials') }}">
                    <i class="mdi mdi-mail menu-icon"></i>
                    <span class="menu-title">Testimonials</span>
                </a>
            </li>
            <li
                class="nav-item @php echo (Route::currentRouteName() == 'adminSeo' || Route::currentRouteName() == 'adminSeoAdd' || Route::currentRouteName() == 'adminSeoUpdate') ? 'active' : ''; @endphp">
                <a class="nav-link" href="{{ route('adminSeo') }}">
                    <i class="mdi mdi-mail menu-icon"></i>
                    <span class="menu-title">Seo</span>
                </a>
            </li>
            <li
                class="nav-item  @php echo (Route::currentRouteName() == 'adminSettings'
                || Route::currentRouteName() == 'profilePassword')  ? 'active' : ''; @endphp">
                <a class="nav-link" data-bs-toggle="collapse" href="#settings" aria-expanded="false"
                    aria-controls="settings">
                    <i class="menu-icon mdi mdi-settings "></i>
                    <span class="menu-title">Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse @php echo (Route::currentRouteName() == 'adminSettings'
                || Route::currentRouteName() == 'profilePassword') ? 'show' : ''; @endphp"
                    id="settings">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'adminSettings') ? 'active' : ''; @endphp"
                                href="{{ route('adminSettings') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @php echo (Route::currentRouteName() == 'profilePassword') ? 'active' : ''; @endphp"
                                href="{{ route('profilePassword') }}">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminLogout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <div class="main-panel">
