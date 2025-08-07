<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <title>@yield('title')</title>
    
      <meta name="description" content="@yield('description')">
  <meta name="keywords" content="@yield('tag')">
    
    <link rel="stylesheet" id="reusablec-block-css-css" href="{{ url('website') }}/aonecontent/aoneplugs/fint-toolkit/inc/reusablec-block/includes/css/reusablec-block.css" media="all" />
    <link rel="stylesheet" id="hfe-widgets-style-css" href="{{ url('website') }}/aonecontent/aoneplugs/header-footer-elementor/inc/widgets-css/frontend.css" media="all" />

    <link rel="stylesheet" href="{{ url('website') }}/aonecontent/themes/aone/style.css" />
    <link rel="stylesheet" id="contact-form-7-css" href="{{ url('website') }}/aonecontent/aoneplugs/contact-form-7/includes/css/styles.css" media="all" />
    <link rel="stylesheet" id="woocommerce-layout-css" href="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/css/woocommerce-layout.css" media="all" />
    <link rel="stylesheet" id="woocommerce-smallscreen-css" href="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/css/woocommerce-smallscreen.css" media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" id="woocommerce-general-css" href="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/css/woocommerce.css" media="all" />

    <link rel="stylesheet" id="hfe-style-css" href="{{ url('website') }}/aonecontent/aoneplugs/header-footer-elementor/assets/css/header-footer-elementor.css" media="all" />
    <link rel="stylesheet" id="elementor-frontend-css" href="{{ url('website') }}/aonecontent/aoneplugs/elementor/assets/css/frontend.min.css" media="all" />
    <link rel="stylesheet" id="swiper-css" href="{{ url('website') }}/aonecontent/aoneplugs/elementor/assets/lib/swiper/v8/css/swiper.min.css" media="all" />
    <link rel="stylesheet" id="e-swiper-css" href="{{ url('website') }}/aonecontent/aoneplugs/elementor/assets/css/conditionals/e-swiper.min.css" media="all" />
    <link rel="stylesheet" id="elementor-post-6-css" href="{{ url('website') }}/aonecontent/uploads/elementor/css/post-6.css" media="all" />
    <link rel="stylesheet" id="elementor-post-254-css" href="{{ url('website') }}/aonecontent/uploads/elementor/css/post-254.css" media="all" />
    <link rel="stylesheet" id="elementor-post-16-css" href="{{ url('website') }}/aonecontent/uploads/elementor/css/post-16.css" media="all" />
    <link rel="stylesheet" id="fint-style-css" href="{{ url('website') }}/aonecontent/themes/aone/style.css" media="all" />
    <link rel="stylesheet" id="bootstrap-css" href="{{ url('website') }}/aonecontent/themes/aone/assets/css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" id="remixicon-css" href="{{ url('website') }}/aonecontent/themes/aone/assets/css/remixicon.css" media="all" />
    <link rel="stylesheet" id="scrollcue-css" href="{{ url('website') }}/aonecontent/themes/aone/assets/css/scrollcue.min.css" media="all" />
    <link rel="stylesheet" id="fint-header-css" href="{{ url('website') }}/aonecontent/themes/aone/assets/css/fint-header.css" media="all" />
    <link rel="stylesheet" id="fint-footer-css" href="{{ url('website') }}/aonecontent/themes/aone/assets/css/fint-footer.css" media="all" />
    <link rel="stylesheet" id="fint-main-css" href="{{ url('website') }}/aonecontent/themes/aone/assets/css/fint-main.css?v233" media="all" />
    <link rel="stylesheet" id="fint-responsive-css" href="{{ url('website') }}/aonecontent/themes/aone/assets/css/fint-responsive.css" media="all" />
    <link rel="stylesheet" id="fint-blog-css" href="{{ url('website') }}/aonecontent/themes/aone/assets/css/fint-blog.css" media="all" />

    <link rel="stylesheet" id="fint-woocommerce-css" href="{{ url('website') }}/aonecontent/themes/aone/assets/css/fint-woocommerce.css" media="all" />
    <link rel="stylesheet" id="fint-manrope-css" href="//fonts.googleapis.com/css2?family=Mulish%3Awght%40300%3B400%3B500%3B600%3B700%3B800%3B900%3B1000&#038;display=swap&#038;ver=1.0.0" media="screen" />
    <link rel="stylesheet" id="hfe-icons-list-css" href="{{ url('website') }}/aonecontent/aoneplugs/elementor/assets/css/widget-icon-list.min.css" media="all" />
    <link rel="stylesheet" id="hfe-social-icons-css" href="{{ url('website') }}/aonecontent/aoneplugs/elementor/assets/css/widget-social-icons.min.css" media="all" />
    <link rel="stylesheet" id="hfe-social-share-icons-brands-css" href="{{ url('website') }}/aonecontent/aoneplugs/elementor/assets/lib/font-awesome/css/brands.css" media="all" />
    <link rel="stylesheet" id="hfe-social-share-icons-fontawesome-css" href="{{ url('website') }}/aonecontent/aoneplugs/elementor/assets/lib/font-awesome/css/fontawesome.css" media="all" />
    <link rel="stylesheet" id="hfe-nav-menu-icons-css" href="{{ url('website') }}/aonecontent/aoneplugs/elementor/assets/lib/font-awesome/css/solid.css" media="all" />
    <link rel="stylesheet" id="google-fonts-1-css" href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.6.1" media="all" />

    <script src="{{ url('website') }}/wp-includes/js/jquery/jquery.min.js" id="jquery-core-js"></script>
    <script src="{{ url('website') }}/wp-includes/js/jquery/jquery-migrate.min.js" id="jquery-migrate-js"></script>
    <script src="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js" id="jquery-blockui-js" defer data-wp-strategy="defer"></script>

    <script src="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/js/frontend/add-to-cart.min.js" id="wc-add-to-cart-js" defer data-wp-strategy="defer"></script>
    <script src="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/js/js-cookie/js.cookie.min.js" id="js-cookie-js" defer data-wp-strategy="defer"></script>

    <script src="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/js/frontend/woocommerce.min.js" id="woocommerce-js" defer data-wp-strategy="defer"></script>
    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/bootstrap.bundle.min.js" id="bootstrap-bundle-js"></script>
    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/swiper.bundle.min.js" id="swiper-bundle-js"></script>
    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/scrollcue.min.js" id="scrollcuee-js"></script>
    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/fslightbox.js" id="fslightbox-js"></script>
    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/ajaxchimp.min.js" id="ajaxchimp-js"></script>
    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/fint-main.js" id="fint-main-js"></script>

    <link rel="icon" href="{{ url('website') }}/favicon.png" sizes="32x32" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />


    @yield('header')


</head>

<body class="">
    
    <style>
    
    
    .responsive-navbar .offcanvas-body ul.responsive-menu .menu-item {
    height: auto !important;
        
    }
    
    .sidebar{
        padding-left: 0px !important;
    }
    
        .service-icon img {
    /*width: 35px;*/
}

.breadcrumb-wrapper .br-img{
        width: 340px;
    height: 340px;
    object-fit: contain;
}

.email_fixed_button{
        position: fixed;
    right: 0px;
    top: 40%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #0082a4;
    color: #fff;
        z-index: 1111;
    border-radius: 100px 0px 0px 100px;
}

.email_fixed_button a{
        background-color: #fff;
    color: #0082a4;
    width: 40px;
    height: 40px;
    border-radius: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.contact_fixed_button {
    position: fixed;
    right: 24px;
    top: 50%;
    z-index: 9999;
    transform: translateY(-50%);
}

.contact_fixed_button a{
        display: block;
    padding: 12px 20px;
    background: #0082a4;
    color: white;
    font-weight: bold;
    font-size: 16px;
    text-decoration: none;
    transform: rotate(-90deg);
    transform-origin: right center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    transition: background 0.3sease, box-shadow 0.3sease;
    border-radius: 10px 10px 0px 0px;
        text-transform: uppercase;
}

.jjultag{
    top:100% !important; 
    list-style:none !important;
        left: -100px !important;
}


.nifff_ul{
        top: 0px !important;
}

.bravo_button{
        font-size: 13px;
    display: flex;
    align-items: center;
    gap: 14px;
}

.topselectiondesktop ul{
        left: 0px !important;
}

    </style>
    
    <div class="email_fixed_button">
    <a href="mailto:<?= email() ?? '' ?>"><i class="fa-solid fa-envelope"></i></a>
</div>
<div class="contact_fixed_button">
    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#consultationModal">Contact Us</a>
</div>
    
    
    <style>
    @media(max-width:600px){
        .myrowsocail li span,.myrowsocail li a{
            font-size:11px;
        }
        .myrowsocail li svg{
            width:15px;
        }
        .navbar-area .navbar-top .navbar-contact li {
     margin-right: 5px;
}
    }        
    </style>

    
    
    
    <!-- Navbar Area Start -->
    <div class="navbar-area style-one" id="navbar">
        <div class="navbar-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-5">
                        <ul class="navbar-contact d-lg-flex align-items-lg-center list-unstyle myrowsocail">
                            <li class="fs-13 text_secondary fw-semibold">
                              <svg width="20" class="text-white me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829Z"></path></svg>
                                <a href="mailto:<?= email() ?? '' ?>" class="text_secondary">
                                    <span class="__cf_email__"><?= email() ?? "" ?></span>
                                </a>
                            </li>

                            <li class="fs-13 text_secondary fw-semibold">
                               <svg width="20" class="text-white me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path></svg>
                                <!--<span class="xs-none">Inquire about Tax Services:</span>-->
                                <a href="tel:<?= phone() ?? "" ?>" class="fw-bold text-white">
                                    <?= phone() ?? "" ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-7 col-lg-5">
                        <div class="navbar-right d-flex align-items-center justify-content-center justify-content-lg-end">
                           
                           <div class="countires_section d-none d-lg-block topselectiondesktop">
                               <div class="dropdown pt-1">
  <button class="btn dropdown-toggle btn-white me-3 px-0 rounded pe-2 p-2 bg-white bravo_button text-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6.23509 6.45329C4.85101 7.89148 4 9.84636 4 12C4 16.4183 7.58172 20 12 20C13.0808 20 14.1116 19.7857 15.0521 19.3972C15.1671 18.6467 14.9148 17.9266 14.8116 17.6746C14.582 17.115 13.8241 16.1582 12.5589 14.8308C12.2212 14.4758 12.2429 14.2035 12.3636 13.3943L12.3775 13.3029C12.4595 12.7486 12.5971 12.4209 14.4622 12.1248C15.4097 11.9746 15.6589 12.3533 16.0043 12.8777C16.0425 12.9358 16.0807 12.9928 16.1198 13.0499C16.4479 13.5297 16.691 13.6394 17.0582 13.8064C17.2227 13.881 17.428 13.9751 17.7031 14.1314C18.3551 14.504 18.3551 14.9247 18.3551 15.8472V15.9518C18.3551 16.3434 18.3168 16.6872 18.2566 16.9859C19.3478 15.6185 20 13.8854 20 12C20 8.70089 18.003 5.8682 15.1519 4.64482C14.5987 5.01813 13.8398 5.54726 13.575 5.91C13.4396 6.09538 13.2482 7.04166 12.6257 7.11976C12.4626 7.14023 12.2438 7.12589 12.012 7.11097C11.3905 7.07058 10.5402 7.01606 10.268 7.75495C10.0952 8.2232 10.0648 9.49445 10.6239 10.1543C10.7134 10.2597 10.7307 10.4547 10.6699 10.6735C10.59 10.9608 10.4286 11.1356 10.3783 11.1717C10.2819 11.1163 10.0896 10.8931 9.95938 10.7412C9.64554 10.3765 9.25405 9.92233 8.74797 9.78176C8.56395 9.73083 8.36166 9.68867 8.16548 9.64736C7.6164 9.53227 6.99443 9.40134 6.84992 9.09302C6.74442 8.8672 6.74488 8.55621 6.74529 8.22764C6.74529 7.8112 6.74529 7.34029 6.54129 6.88256C6.46246 6.70541 6.35689 6.56446 6.23509 6.45329ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22Z"></path></svg>
   Global Website
  </button>
  <ul class="dropdown-menu list-unstyled jjultag nifff_ul"  aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item text-dark" href="javascript:void(0)">Australia</a></li>
    <li><a class="dropdown-item text-dark" href="javascript:void(0)">USA</a></li>
    <li><a class="dropdown-item text-dark" href="javascript:void(0)">Canada</a></li>
    <li><a class="dropdown-item text-dark" href="javascript:void(0)">UK</a></li>
    <li><a class="dropdown-item text-dark" href="javascript:void(0)">Ireland</a></li>
  </ul>
</div>
                           </div>
                           
                            <div class="option-item">
                                <ul class="social-profile list-unstyle position-relative px-2">
                                    <li class="d-inline-block">
                                        <a class="twitter" target="_blank" href="<?= twitter() ?? "" ?>"><i class="ri-twitter-x-line"></i></a>
                                    </li class="ps-lg-3"> 
                                    <li class="d-inline-block">
                                        <a class="facebook" target="_blank" href="<?= facebook() ?? "" ?>"><i class="ri-facebook-fill"></i></a>
                                    </li>
                                    <li class="d-inline-block">
                                        <a class="instagram" target="_blank" href="<?= instagram() ?? "" ?>"><i class="ri-instagram-fill"></i></a>
                                    </li>
                                    <li class="d-inline-block">
                                        <a class="linkedin" target="_blank" href="<?= linkedin() ?? "" ?>"><i class="ri-linkedin-fill"></i></a>
                                    </li>
                                    {{-- <li class="d-inline-block">
                                        <a class="whatsapp" target="_blank" href="#"><i class="ri-whatsapp-fill"></i></a>
                                    </li> --}}
                                </ul>
                            </div>

                            <!--<div class="option-item">-->
                            <!--    <a href="/contact-us" class="btn fs-14 border-0 fw-semibold text_secondary rounded-0 trasnition">Tax Form</a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand me-0 logomain" href="/">
                    <img src="{{ url('website') }}/aonecontent/uploads/2024/01/logo.png" alt="Aone Outsourcing" />
                </a>

                <div class="other-options d-flex flex-wrap justify-content-end align-items-center d-lg-none">
                    
                   <div class="dropdown">
  <button class="btn dropdown-toggle btn-light me-3 px-0 rounded pe-2 p-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6.23509 6.45329C4.85101 7.89148 4 9.84636 4 12C4 16.4183 7.58172 20 12 20C13.0808 20 14.1116 19.7857 15.0521 19.3972C15.1671 18.6467 14.9148 17.9266 14.8116 17.6746C14.582 17.115 13.8241 16.1582 12.5589 14.8308C12.2212 14.4758 12.2429 14.2035 12.3636 13.3943L12.3775 13.3029C12.4595 12.7486 12.5971 12.4209 14.4622 12.1248C15.4097 11.9746 15.6589 12.3533 16.0043 12.8777C16.0425 12.9358 16.0807 12.9928 16.1198 13.0499C16.4479 13.5297 16.691 13.6394 17.0582 13.8064C17.2227 13.881 17.428 13.9751 17.7031 14.1314C18.3551 14.504 18.3551 14.9247 18.3551 15.8472V15.9518C18.3551 16.3434 18.3168 16.6872 18.2566 16.9859C19.3478 15.6185 20 13.8854 20 12C20 8.70089 18.003 5.8682 15.1519 4.64482C14.5987 5.01813 13.8398 5.54726 13.575 5.91C13.4396 6.09538 13.2482 7.04166 12.6257 7.11976C12.4626 7.14023 12.2438 7.12589 12.012 7.11097C11.3905 7.07058 10.5402 7.01606 10.268 7.75495C10.0952 8.2232 10.0648 9.49445 10.6239 10.1543C10.7134 10.2597 10.7307 10.4547 10.6699 10.6735C10.59 10.9608 10.4286 11.1356 10.3783 11.1717C10.2819 11.1163 10.0896 10.8931 9.95938 10.7412C9.64554 10.3765 9.25405 9.92233 8.74797 9.78176C8.56395 9.73083 8.36166 9.68867 8.16548 9.64736C7.6164 9.53227 6.99443 9.40134 6.84992 9.09302C6.74442 8.8672 6.74488 8.55621 6.74529 8.22764C6.74529 7.8112 6.74529 7.34029 6.54129 6.88256C6.46246 6.70541 6.35689 6.56446 6.23509 6.45329ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22Z"></path></svg>
  </button>
  <ul class="dropdown-menu list-unstyled jjultag"  aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="javascript:void(0)">Australia</a></li>
    <li><a class="dropdown-item" href="javascript:void(0)">USA</a></li>
    <li><a class="dropdown-item" href="javascript:void(0)">Canada</a></li>
    <li><a class="dropdown-item" href="javascript:void(0)">UK</a></li>
    <li><a class="dropdown-item" href="javascript:void(0)">Ireland</a></li>
  </ul>
</div>


                    <div class="option-item">
                        <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                            <span class="burger-menu">
                                <span class="top-bar"></span>
                                <span class="middle-bar"></span>
                                <span class="bottom-bar"></span>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="collapse navbar-collapse">
                  <ul id="menu-main-menu" class="navbar-nav mx-auto">
    <li class="menu-item nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a title="Home" href="/" class="nav-link">Home</a>
    </li>
    <li class="menu-item nav-item {{ request()->is('about-us') ? 'active' : '' }}">
        <a title="About Us" href="/about-us" class="nav-link">About Us</a>
    </li>
    <li class="menu-item nav-item dropdown {{ request()->is('services*') ? 'active' : '' }}">
        <a title="Services" href="/services" class="nav-link">Services</a>
        <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown" role="menu">
            @foreach(App\Models\Service::where('status', 'Y')->latest()->get(['id', 'title', 'slug']) as $value)
                <li class="menu-item nav-item {{ request()->is('service/' . $value->slug) ? 'active' : '' }}">
                    <a title="{{ $value->title }}" href="/service/{{ $value->slug }}" class="nav-link dropdown-item">{{ $value->title }}</a>
                </li>
            @endforeach
        </ul>
    </li>
    <li class="menu-item nav-item dropdown {{ request()->is('industries*') ? 'active' : '' }}">
        <a title="Industries" href="/industries" class="nav-link">Industries</a>
        <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown" role="menu">
            @foreach(App\Models\Industries::where('status', 'Y')->latest()->get(['id', 'title', 'slug']) as $value)
                <li class="menu-item nav-item {{ request()->is('industry/' . $value->slug) ? 'active' : '' }}">
                    <a title="{{ $value->title }}" href="/industry/{{ $value->slug }}" class="nav-link dropdown-item">{{ $value->title }}</a>
                </li>
            @endforeach
        </ul>
    </li>
    <li class="menu-item nav-item {{ request()->is('case-studies') ? 'active' : '' }}">
        <a title="Case Studies" href="/case-studies" class="nav-link">Case Studies</a>
    </li>
    <li class="menu-item nav-item {{ request()->is('our-team') ? 'active' : '' }}">
        <a title="Team" href="/our-team" class="nav-link">Team</a>
    </li>
    <li class="menu-item nav-item {{ request()->is('blog*') ? 'active' : '' }}">
        <a title="Blog" href="/blog" class="nav-link">Blog</a>
    </li>
    <li class="menu-item nav-item {{ request()->is('contact-us') ? 'active' : '' }}">
        <a title="Contact Us" href="/contact-us" class="nav-link">Contact Us</a>
    </li>
</ul>
  <div class="option-item">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#consultationModal" class="btn style-one">Get Free Consultation
                            <img src="{{ url('website') }}/aonecontent/themes/aone/assets/img/icons/right-long-arrow.svg" alt="Button Icon" />
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Start Responsive Navbar Area -->
    <div class="responsive-navbar offcanvas offcanvas-end border-0" data-bs-backdrop="static" tabindex="-1" id="navbarOffcanvas">
        <div class="offcanvas-header">
            <a class="logo d-inline-block" href="/">
                <img class="logo-light" src="{{ url('website') }}/aonecontent/uploads/2024/01/logo.png" alt="Aone Outsourcing" />
            </a>

            <button type="button" class="close-btn bg-transparent position-relative lh-1 p-0 border-0" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="ri-close-line"></i>
            </button>
        </div>
        <div class="offcanvas-body">
          <ul id="menu-main-menu-1" class="responsive-menu">
    <li class="menu-item menu-item-257 {{ request()->is('/') ? 'active' : '' }}">
        <a href="/">Home</a>
    </li>
    <li class="menu-item menu-item-259 {{ request()->is('about-us') ? 'active' : '' }}">
        <a href="/about-us">About Us</a>
    </li>

    <li class="menu-item menu-item-has-children menu-item-1124 {{ request()->is('services*') ? 'active' : '' }}">
        <a href="/services">Services</a>
        <ul class="sub-menu">
            @foreach(App\Models\Service::where('status','Y')->latest()->get(['id','title','slug']) as $value) 
                <li class="menu-item menu-item-684 {{ request()->is('service/' . $value->slug) ? 'active' : '' }}">
                    <a href="/service/{{ $value->slug }}">{{ $value->title }}</a>
                </li>
            @endforeach
        </ul>
    </li>
    
    <li class="menu-item menu-item-has-children menu-item-1124 {{ request()->is('industries*') ? 'active' : '' }}">
        <a href="/industries">Industries</a>
        <ul class="sub-menu">
            @foreach(App\Models\Industries::where('status','Y')->latest()->get(['id','title','slug']) as $value) 
                <li class="menu-item menu-item-684 {{ request()->is('industry/' . $value->slug) ? 'active' : '' }}">
                    <a href="/industry/{{ $value->slug }}">{{ $value->title }}</a>
                </li>
            @endforeach
        </ul>
    </li>

    <li class="menu-item menu-item-372 {{ request()->is('case-studies') ? 'active' : '' }}">
        <a href="/case-studies">Case Studies</a>
    </li>
    
    <li class="menu-item nav-item-381 {{ request()->is('our-team') ? 'active' : '' }}">
        <a title="Team" href="/our-team" class="nav-link">Team</a>
    </li>

    <li class="menu-item menu-item-381 {{ request()->is('blog*') ? 'active' : '' }}">
        <a href="/blog">Blog</a>
    </li>
    <li class="menu-item menu-item-383 {{ request()->is('contact-us') ? 'active' : '' }}">
        <a href="/contact-us">Contact Us</a>
    </li>
</ul>
  {{-- <div class="other-option d-md-flex align-items-center">

                <div class="option-item">
                    <a href="/contact-us" class="btn style-one">Make Tax Payment
                        <img src="{{ url('website') }}/aonecontent/themes/aone/assets/img/icons/right-long-arrow.svg" alt="Button Icon" />
                    </a>
                </div>
            </div> --}}
        </div>
    </div>




    {{-- --------------enquiry model  --}}



    <div class="modal fade" id="consultationModal" tabindex="-1" aria-labelledby="consultationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
             
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="image_enquiry h-100">
                                <img src="{{ url('website') }}/enquiry.png" class="w-100 h-100" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 enquirymodelboz ">
                          <div class="p-3 h-100 me-3">
                            
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>

                            <h1>GET A FREE CONSULTATION TODAY!</h1>
                            <p>Fill in the details, and our experts will contact you.</p>
                            <form action="/contact-form" class="enquiryformhome row" method="post">
                                @csrf
                               <div class="col-12">
                                <div class="formgroup">
                                    <i class="fa-solid fa-user"></i>
                                    <input type="text" class="form-control border-0" name="name" placeholder="Full Name" required>
                                   </div>
                               </div>
                               <div class="col-6">
                                <div class="formgroup">
                                    <i class="fa-solid fa-envelope"></i>
                                    <input type="email" class="form-control border-0" name="email" placeholder="Business Email" required>
                                   </div>
                               </div>

                               <div class="col-6">
                                <div class="formgroup">
                                    <i class="fa-solid fa-phone"></i>
                                     <input type="tel" class="form-control border-0" name="phone" placeholder="Phone Number" required>
                                   </div>
                               </div>
                               <input type="text" value="GET A FREE CONSULTATION" name="subject" hidden>
                              
                             
                            <div class="col-12 ">
                                <div class="formgroup align-items-start">
                                    <i class="fa-solid fa-message" style="position: relative;top: 12px;"></i>
                                     <textarea class="form-control border-0" rows="3" name="message" placeholder="Message" required></textarea>
                                </div>
                            </div>
                                <button type="submit" class="btn style-one mt-2">CONSULT NOW</button>
                            </form>
                          </div>

                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>




    @yield('content')




    <!-- footer start -->
    <footer >
        <div class="footer-width-fixer ">
            <div class="elementor elementor-16 footerelementer">
                <div class="elementor-element elementor-element-9f16632 e-con-full e-flex e-con e-parent" data-id="9f16632" data-element_type="container">
                    <div class="elementor-element elementor-element-ec57eb3 elementor-widget elementor-widget-Fint_Footer" data-id="ec57eb3" data-element_type="widget" data-widget_type="Fint_Footer.default">
                        <div class="elementor-widget-container">
                            <div class="footer-wrap position-relative index-1">
                                <img src="{{ url('website') }}/aonecontent/uploads/2024/01/shape-1.png" alt="Footer Shape" class="footer-shape-two position-absolute bounce sm-none" />

                                <div class="footer-top pt-100 ptttt-100px pb-75">
                                    <div class="container">
                                        <div class="row pb-70">
                                            <div class="col-lg-3 col-md-12">
                                                <div class="fint-footer-widget mb-md-30">
                                                    <div class="footer-contact">
                                                        <a href="/" class="logo">
                                                            <img src="{{ url('uploads') }}/<?= weblogo() ?? "" ?>" class="footerloogo" alt="Aone Outsourcing" />
                                                        </a>

                                                        <p class="comp-address">
                                                            <?= location() ?? "" ?>
                                                        </p>

                                                        <a href=""><span class=""><?= email() ?? "" ?></span></a>

                                                                
                                                        <ul class="social-profile list-unstyle">
                                                            <li class="d-inline-block">
                                                                <a class="twitter" target="_blank" href="<?= twitter() ?? "" ?>"><i class="ri-twitter-x-line"></i></a>
                                                            </li>
                                                            <li class="d-inline-block">
                                                                <a class="facebook" target="_blank" href="<?= facebook() ?? "" ?>"><i class="ri-facebook-fill"></i></a>
                                                            </li>
                                                            <li class="d-inline-block">
                                                                <a class="instagram" target="_blank" href="<?= instagram() ?? "" ?>"><i class="ri-instagram-fill"></i></a>
                                                            </li>
                                                            <li class="d-inline-block">
                                                                <a class="linkedin" target="_blank" href="<?= linkedin() ?? "" ?>"><i class="ri-linkedin-fill"></i></a>
                                                            </li>
                                                            {{-- <li class="d-inline-block">
                                                                <a class="whatsapp" target="_blank" href="#"><i class="ri-whatsapp-fill"></i></a>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 ps-xxl-45">
                                                <div class="fint-footer-widget pt-100 mb-30 mb-sm-0">
                                                    <h3 class="fs-24 mb-22 text-white" style="line-height: 35px;">
                                                        Sign Up Today for Practical Tips to Manage Your Business Finances Today!
                                                    </h3>

                                                    <form action="{{url('subscription-form')}}" class="subscribe-form mailchimp" method="post">
                                                        @csrf
                                                        <input type="text" name="name" placeholder="Full Name" class="fs-14 fw-medium w-100 border-0 bg-white mb-15" />

                                                        <input type="email" name="email" placeholder="Email Address" class="memail fs-14 fw-medium w-100 border-0 bg-white mb-15" />

                                                        <p class="text-white">Don’t miss out on valuable tips to help your business thrive!</p>
                                                        <button class="btn style-three w-100 d-block footersubscribe" type="submit">
                                                            Subscribe Now
                                                        </button>
                                                        <p class="mchimp-errmessage" style="display: none"></p>
                                                        <p class="mchimp-sucmessage" style="display: none"></p>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="col-lg-5 col-md-6 ps-xxl-6">
                                                <div class="fint-footer-widget pt-100 mb-30  mb-sm-0">
                                                    <h3 class="fs-16 mb-15 text-white">
                                                       Get Accounting & Business Tips From Us!
                                                    </h3>
                                                    <p class="text-white">
                                                        Stay ahead of the curve with Aone Outsourcing Solutions. Sign up to receive expert tips and strategies that will help you manage your business finances more effectively!
<br>Here is the topic that will be sent to you via mail!

                                                    </p>

                                                    <ul class="checklist-widget list-unstyle">
                                                        <li>
                                                            <div class="checkbox style-two text-white">
                                                                <i class="ri-checkbox-circle-line"></i>  Small Business Accounting Tips
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="checkbox style-two text-white">
                                                                <i class="ri-checkbox-circle-line"></i>
                                                                Tax Filing Tips –
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="checkbox style-two text-white">
                                                                <i class="ri-checkbox-circle-line"></i>
                                                              Startup Accounting Tips – 

                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="checkbox style-two text-white">
                                                                <i class="ri-checkbox-circle-line"></i>
                                                             Expense Management – 
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="checkbox style-two text-white">
                                                                <i class="ri-checkbox-circle-line"></i>
                                                                Cash Flow Tips –
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="checkbox style-two text-white">
                                                                <i class="ri-checkbox-circle-line"></i>
                                                             Year-End Tax Preparation –
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row five_box_row">
                                            <!-- Box 1 -->
                                            <div class="box-5row">
                                                <div class="fint-footer-widget mb-30">
                                                    <h3 class="fs-18 fint-footer-widget-title">Company</h3>
                                                    <ul class="footer-menu list-unstyle">
                                                        <li><a href="/about-us">About</a></li>
                                                        <li><a href="/case-studies">Case Study</a></li>
                                                        <li><a href="/our-team">Team</a></li>
                                                        <li><a href="/industries">Industries</a></li>
                                                    </ul>
                                                </div>
                                            </div>



                                        
                                            <!-- Box 2 -->
                                            <div class="box-5row service_section">
                                                <div class="fint-footer-widget mb-30">
                                                    <h3 class="fs-18 fint-footer-widget-title">Services</h3>
                                                    <ul class="footer-menu list-unstyle">
                                                        @php
                                                            $latestservoce = App\Models\Service::where('status', 'Y')->latest()->get(['title', 'slug']);
                                                        @endphp
                                                        @foreach ($latestservoce as $val)
                                                        <li><a href="/service/{{ $val->slug }}">{{ $val->title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        
                                            <!-- Box 3 -->
                                            <div class="box-5row">
                                                <div class="fint-footer-widget mb-30">
                                                    <h3 class="fs-18 fint-footer-widget-title">Resources</h3>
                                                    <ul class="footer-menu list-unstyle">
                                                        <li><a href="/blog">Blog</a></li>
                                                        <li><a href="/our-team">Our Team</a></li>
                                                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                                        <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                                        <li><a href="/contact-us">Contact Us</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        
                                            <!-- Box 4 -->
                                           
                                        
                                            <!-- Box 5 -->
                                            <div class="box-5row">
                                                <div class="fint-footer-widget mb-30">
                                                    <h3 class="fs-18 fint-footer-widget-title">Top Countries</h3>
                                                    <ul class="footer-menu list-unstyle">
                                                        <li><a href="/javascript:void(0)">Australia</a></li>
                                                        <li><a href="/javascript:void(0)">USA</a></li>
                                                        <li><a href="/javascript:void(0)">Canada</a></li>
                                                        <li><a href="/javascript:void(0)">United Kingdom</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <p class="copyright-text text-center mb-0">
                                    <i class="ri-copyright-line"></i>
                                    <span class="fw-bold">Aoneoutsourcing</span>. All Rights Reserved By
                                    <a href="/" target="_blank" class="fw-bold">Aone Outsourcing Solutions</a>
                                </p>
                            </div>
                            <!-- Footer End -->

                            <!-- Back to Top -->
                            <button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
                                <i class="ri-arrow-up-line"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- script -->

    <link rel="stylesheet" href="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/client/blocks/wc-blocks.css" media="all" />
    {{-- <script src="{{ url('website') }}/wp-includes/js/dist/hooks.min.js"></script> --}}
    {{-- <script src="{{ url('website') }}/wp-includes/js/dist/i18n.min.js"></script> --}}

    <script src="{{ url('website') }}/aonecontent/aoneplugs/contact-form-7/includes/swv/js/index.js"></script>

    <script src="{{ url('website') }}/aonecontent/aoneplugs/contact-form-7/includes/js/index.js"></script>

    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/custom-ajax-script.js"></script>
    <script src="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/js/sourcebuster/sourcebuster.min.js"></script>

    <script src="{{ url('website') }}/aonecontent/aoneplugs/woocommerce/assets/js/frontend/order-attribution.min.js"></script>
    <script src="{{ url('website') }}/aonecontent/aoneplugs/elementor/assets/js/webpack.runtime.min.js"></script>
    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/frontend-modules.min.js"></script>
    <script src="{{ url('website') }}/wp-includes/js/jquery/ui/core.min.js"></script>
    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/main.js"></script>
    <script src="{{ url('website') }}/aonecontent/themes/aone/assets/js/frontend.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @yield('footer')

    @if(session()->has('success'))

    <script>
        Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: '    {{ session()->get('success') }}',
});
    </script>
    @endif

</body>
</html>
