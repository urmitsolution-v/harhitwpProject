<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>
  <link rel="icon" href="images/favicon.png">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="stylesheet" type="text/css" href="{{ url('website/auth') }}/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href='{{ url('website/auth') }}/css/bootstrap-float-label.min.css' />
  <link rel="stylesheet" type="text/css" href="{{ url('website/auth') }}/fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="{{ url('website/auth') }}/css/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href='{{ url('website/auth') }}/css/fonts.css' />
  <link rel="stylesheet" type="text/css" href="css/yearpicker.css">
  <link rel="stylesheet" type="text/css" href='{{ url('website/auth') }}/css/common.css' />
  <link rel="stylesheet" type="text/css" href='{{ url('website/auth') }}/css/user-reg.css' />
  <link rel="stylesheet" type="text/css" href='{{ url('website/auth') }}/css/header.css' />
  <link rel="stylesheet" type="text/css" href='{{ url('website/auth') }}/css/home.css' />

  <script type="text/javascript" src="{{ url('website/auth') }}/js/jquery.min.js"></script>
  <script type="text/javascript" src="{{ url('website/auth') }}/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="{{ url('website/auth') }}/js/jquery-ui.min.js"></script>
</head>

<body>
    <style>
    /*--------------------------------------------------------------
# Top Bar
--------------------------------------------------------------*/
    #topbar {
        /*background: rgba(238, 117, 29, 1);*/
        /*color: #fff;*/
        height: 60px;
        z-index: 996;
    }

    #header {
        background: #fff;
        /* transition: all 0.5s; */
        z-index: 997;
        /*padding: 5px 0;*/
        top: 60px;
    }

    header {
        box-shadow: inset 0 -2px 0 rgba(0, 0, 0, 0.15);
    }


    .logout_block .btn {
        margin-left: 5px;
        background: var(--primeCol);
        color: #fff;
        border-radius: 5px;
        padding: 11px 25px;
        white-space: nowrap;
        transition: 0.3s;
        font-size: 13px;
        display: inline-block;
        box-shadow: inset 0 -2px 0 rgba(0, 0, 0, 0.15);
        font-weight: 600;
        text-transform: uppercase;
    }

    .logout_block .btn:hover {
        opacity: 0.8;
        color: #fff;
    }

    /* @media (max-width: 768px) {
  .btn {
    margin: 0 15px 0 0;
    padding: 6px 15px;
  }
} */

    /*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
    /**
* Desktop Navigation 
*/
    .navbar {
        padding: 0;
        margin: 0.3em 0;
    }

    .navbar ul {
        margin: 0;
        padding: 0;
        display: flex;
        list-style: none;
        align-items: center;
        /*margin-top: 1.3em;*/
    }

    .navbar li {
        position: relative;
        color: #F47647;
        transition: all 0.5s ease;
    }

    .navbar li a {
        transition: ease-in-out 0.5s all;
        cursor: pointer;
    }

    .navbar a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0 10px 15px;
        font-size: 14px;
        color: var(--primeCol);
        /*transition: 0.3s;*/
        text-transform: uppercase;
        font-weight: bold;
        text-decoration: none;
        line-height: 1.3;
        /*letter-spacing: 0.em;*/
    }

    .navbar a i,
    .navbar a:focus i {
        font-size: 14px;
        line-height: 0;
        margin-left: 5px;
        color: #F47647,
    }

    .navbar:not(.navbar-mobile) a span {
        border-bottom: 2px solid white;
    }

    .navbar:not(.navbar-mobile) a:hover span,
    .navbar:not(.navbar-mobile) li:hover>a span {
        color: red;
        border-bottom: 2px solid var(--primeCol);
    }

    .navbar:not(.navbar-mobile) .dropdown ul.inner a:hover span {
        color: red;
        border-bottom: 2px solid var(--primeCol);
        font-weight: 300;
    }

    .navbar .drodpown ul.inner a {
        font-weight: 300;
    }

    .navbar .dropdown ul {
        display: block;
        position: absolute;
        left: 14px;
        top: calc(100% + 30px);
        margin: 0;
        padding: 10px 0;
        z-index: 99;
        font-weight: bold;
        opacity: 0;
        margin-top: 6px;
        visibility: hidden;
        background: #fff;
        /* border-top: 1px solid whitesmoke; */
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.15);
        transition: 0.3s;
        border-radius: 4px;
    }

    .navbar .dropdown ul li {
        min-width: 230px;
    }

    .navbar .dropdown ul.inner a {
        font-size: 14px;
        padding: 10px 20px;
        text-transform: uppercase;
        /*font-weight: normal;*/
        line-height: 1.3
    }

    .navbar .dropdown ul a i {
        font-size: 12px;
    }

    .navbar .dropdown ul a:hover,
    .navbar .dropdown ul .active:hover,
    .navbar .dropdown ul li:hover>a {
        color:var(--primeCol);
    }

    .navbar .dropdown:hover>ul {
        opacity: 1;
        top: 100%;
        visibility: visible;
    }

    .navbar .dropdown .dropdown ul {
        top: 0;
        left: calc(100% - 30px);
        /* visibility: hidden; */
    }

    .navbar .dropdown .dropdown:hover>ul {
        opacity: 1;
        top: 0;
        left: 100%;
        visibility: visible;
    }

    /**
    * Mobile Navigation 
    */
    .mobile-nav-toggle {
        color: #555555;
        font-size: 28px;
        cursor: pointer;
        display: none;
        line-height: 0;
        transition: 0.5s;
    }

    .mobile-nav-toggle.bi-x {
        color: #fff;
    }

    .navbar-mobile ul.inner li a:focus {
        color: red;
        border-bottom: 2px solid red;
    }

    .navbar:not(.navbar-mobile) ul li.dropdown .inner .dropdown_in a {
        padding: 12px;
    }

    .navbar-mobile ul li.dropdown .inner .dropdown_in>a {
        padding: 0px;
    }

    .navbar-mobile {
        position: fixed;
        overflow: hidden;
        top: -10px;
        right: 0;
        left: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        transition: 0.3s;
        z-index: 999;
    }

    .navbar-mobile ul li.dropdown>a span:first-child {
        padding: 13px 20px;
    }

    .navbar-mobile ul li.dropdown>a span:last-child {
        padding: 13px 15px;
        display: inline-block;
    }

    .navbar-mobile ul li.dropdown>a span.single_child {
        padding: 13px 20px;
    }

    .navbar-mobile ul li.dropdown>a span:last-child:not(.single_child) {
        border-left: 1px solid rgba(129, 129, 129, 0.2);
    }

    .navbar-mobile ul li.dropdown.active>a span:not(.single_child):last-child {
        background-color: rgb(209, 44, 44);
        border-bottom: none;
    }

    .navbar-mobile ul li.dropdown.active>a span:last-child i {
        color: #fff;
    }

    .navbar-mobile ul li.dropdown.active>a {
        background-color: #f6f6f6;
    }

    .navbar-mobile ul li .fa fa-chevron-down {
        display: inline-block;
        transform: rotate(270deg);
        color: #000;
        font-size: 13px;
        margin: 0;
    }

    .navbar-mobile ul li .fa-chevron-up {
        transform: rotate(180deg);
    }

    .navbar-mobile .mobile-nav-toggle {
        position: absolute;
        top: 15px;
        right: 15px;
    }

    .navbar-mobile ul {
        display: block;
        position: absolute;
        top: 0px;

        bottom: 0px;
        width: 40%;
        /* left: 15px; */
        padding: 10px 0;

        /* border-radius: 8px; */
        background-color: #fff;
        overflow-y: auto;
        transition: 0.3s;
    }

    .navbar-mobile a {
        padding: 10px 20px;
        font-size: 15px;
        border: 1px solid whitesmoke;
        /* color: #555555; */
    }

    .navbar-mobile a:hover,
    .navbar-mobile .active,
    .navbar-mobile li:hover>a {
        color: #ed3c0d;
    }

    .navbar-mobile .dropdown ul {
        position: static;
        display: none;
        /* margin: 10px ; */
        padding: 0px;
        margin: 0px;
        z-index: 99;
        opacity: 1;
        width: 99%;
        visibility: visible;
        background: #fff;
        /* box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25); */
    }

    .navbar-mobile .dropdown ul li {
        min-width: 200px;
    }

    .navbar-mobile .dropdown ul a {
        border: none;
        padding: 10px 20px;
    }

    .navbar-mobile .dropdown ul a i {
        font-size: 12px;
    }

    .navbar-mobile .dropdown ul a:hover,
    .navbar-mobile .dropdown ul .active:hover,
    .navbar-mobile .dropdown ul li:hover>a {
        color: var(--primeCol);
    }

    .navbar-mobile .dropdown>.dropdown-active {
        display: block;

    }

    @media screen and (max-width:992px) {
        .navbar-mobile ul li a {
            font-size: 13px;
            padding: 0;
        }
    }

    @media only screen and (max-width:425px) {
        .navbar-mobile ul {
            display: block;
            position: absolute;
            top: 0px;

            bottom: 0px;
            width: 80%;

            padding: 10px 0;
            font-size: 14px;

            /* border-radius: 8px; */
            background-color: #fff;
            overflow-y: hidden;
            transition: 0.3s;
        }

        .navbar-mobile a {
            padding: 10px 20px;
            font-size: 13px;
            border: 1px solid whitesmoke;
            /* color: var(--primeCol); */
        }

        .navbar-mobile .dropdown ul a {
            border: none;
            padding: 10px 20px;
            font-size: 13px;
        }

    }

    @media only screen and (max-width: 500px) {
        #header img {
            height: 30px;
            width: 100%;
            margin-left: -50px;
        }
    }

    @media only screen and (max-width: 600px) {
        #header div>a {
            position: relative;
            left: -5%;
        }
    }

    @media only screen and (max-width: 768px) {
        #header div>a {
            position: relative;
            left: 90%;
        }

        #header img {
            height: 35px;
            width: 100%;
            margin-left: -60px;
        }
    }

    @media (max-width: 991px) {
        .mobile-nav-toggle {
            display: block;
            position: absolute;
            right: 0;
            padding: 15px;
        }

        .mobile-nav-toggle:before {
            color: #fff;
        }

        .navbar ul {
            display: none;
        }
    }

    @media (max-width: 992px) {
        #header {
            padding: 15px 0;
        }
    }

    @media (max-width: 1366px) {
        .navbar .dropdown .dropdown ul {
            left: -90%;
        }

        .navbar .dropdown .dropdown:hover>ul {
            left: -100%;
        }
    }
</style>
<header>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container">
            <div class="d-sm-flex">
                <a class="redirectable" href="/">
                    <img src="{{ url('website/auth') }}/images/har-hith-logo.png" class="w-auto m-0" style="max-width:150px;">
                </a>
            </div>
            <!-- <div class="d-flex align-items-center">

        </div> -->
        </div>
       <!-- <i class="fa fa-bars mobile-nav-toggle"></i>-->
    </div>

    <!-- ======= Header ======= -->
    <div id="header" class="fixed-top">
        <div class="container d-flex  align-items-center justify-content-center justify-content-md-between">
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul id="sidenav" class="sidenav">
                    <li class="dropdown"><a class="nav-link redirectable" href="/">Home</a></li>
                    <li class="dropdown"><a href="https://www.harhith.com/about-harhith" class="redirectable"><span>About Har-Hith</span> <span> <i class="fa fa-chevron-down ml-1"></i></span></a>
                        <ul class="inner">
                            <li><a class="redirectable" href="../vision-of-the-program/index.html"><span class="redirectable">Vision of the program</span></a></li>
                            <li><a class="redirectable" href="../ecosystem/index.html"><span>Ecosystem</span></a></li>
                            <li><a class="redirectable" href="https://www.harhith.com/key-people/"><span>Key People</span></a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown"><a href="#"><span>Franchisee</span><span><i class="fa fa-chevron-down ml-1"></i></span></a>
                        <ul class="inner">
                            <li><a class="redirectable" href="../key-benefits/index.html"><span>Franchisee Benefits</span></a></li>
                            <li><a class="redirectable" href="https://www.harhith.com/wp-content/uploads/2021/07/Franchise Policy_English.pdf"><span>DOWNLOAD FRANCHISEE BOOKLET IN ENGLISH</span></a></li>
                            <li><a class="redirectable" href="https://www.harhith.com/wp-content/uploads/2021/06/Franchise Policy_Hindi.pdf"><span>DOWNLOAD FRANCHISEE BOOKLET IN HINDI</span></a></li>
                            <li><a class="redirectable" href="https://www.harhith.com/harith_forms_stage/registration.php"><span>APPLY FOR FRANCHISEE</span></a></li>
                            <li><a target="_blank" rel="noopener" class="redirectable" href="../wp-content/uploads/hh-assets/IOCL-booklet.pdf"><span>DOWNLOAD IOCL FRANCHISEE BOOKLET</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="../partner-with-us/index.html"><span>PARTNER WITH US</span><span><i class="fa fa-chevron-down ml-1"></i></span></a>
                        <ul class="inner">
                            <li><a class="redirectable" href="../partner-with-us/index.html#shg-fpo-partners/"><span>SHG/FPO PARTNERS</span></a></li>
                            <li><a class="redirectable" href="https://www.harhith.com/national-regional-labels/"><span>BRANDS VIA E-BID</span></a></li>
                            <li class="dropdown dropdown_in"><a class="redirectable ml-2" href="https://www.harhith.com/msme/"><span>COOPERATIVE PARTNERS</span></a></li>
                            <li class="dropdown dropdown_in"><a class="redirectable ml-2" href="https://www.harhith.com/msme/"><span>MSME PARTNERS</span></a></li>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><span>Consumers</span><span><i class="fa fa-chevron-down ml-1"></i></span></a>
                        <ul class="inner">
                            <li><a class="redirectable" href="https://www.harhith.com/coming-soon/"><span>Locate your Store</span></a></li>
                            <li><a class="redirectable" href="https://www.harhith.com/coming-soon/"><span>eCommerce</span></a></li>
                        </ul>
                    </li>

                     <li class="dropdown"><a class="nav-link" href="#"><span class="single_child">Brands</span><span><i class="fa fa-chevron-down ml-1"></i></span></a>
                        <ul class="inner">
                            <li><a class="redirectable" href="https://www.harhith.com/product-catlogue/"><span>Product Catalogue</span></a></li>
                        </ul>
                    </li>

                    <li><a href="../har-hith-news/index.html" class="redirectable"><span>HAR-HITH NEWS</span></a>
                    </li>
                    <li><a href="/contact-us" class="redirectable"><span>Contact Us</span></a>
                    </li>
                </ul>
            </nav><!-- .navbar -->

            <div class="logout_block">
                                        <a class="btn" href="/login"><span class=" d-md-inline">Login</span></a>

                                                </div>

        </div>
    </div><!-- End Header -->
</header>
<!-- eligibility Modal Start-->
<div class="modal  eligibility_modal" id="eligibilityModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close p-0" data-dismiss="modal" aria-hidden="true"><span class="icon-cross"></span></button>
                <div class="eligibilty_in">

                    <h4>Eligibility Criteria for Franchisee Partner</h4>
                    <p>In order to increase entrepreneurship, business resources and self-employment in the State of Haryana,
                        the HAICL has fixed the minimum eligibility criteria to apply for either an urban or rural franchisee as
                        below:</p>
                    <div class="eliginilty_table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Eligibility Criteria</th>
                                    <th>Rural Franchisee</th>
                                    <th>Small Urban Franchisee</th>
                                    <th>Large Urban Franchisee</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="heading">Age Limit</td>
                                    <td>Preferably 21-35 Years
                                    </td>
                                    <td>Preferably 21-35 Years</td>
                                    <td>Preferably 21-35 Years</td>
                                </tr>
                                <tr>
                                    <td class="heading">
                                        Maximum Age for Ex-service men
                                    </td>
                                    <td>50 Years</td>
                                    <td>50 Years</td>
                                    <td>50 Years</td>
                                </tr>
                                <tr>
                                    <td class="heading"> Education Qualification</td>
                                    <td>12th Pass</td>
                                    <td>12th Pass</td>
                                    <td>12th Pass</td>
                                </tr>
                                <tr>
                                    <td class="heading"> Non-Criminal Background</td>
                                    <td>Neither convicted nor
                                        pending criminal case</td>
                                    <td>Neither convicted nor
                                        pending criminal case</td>
                                    <td>Neither convicted nor
                                        pending criminal case</td>
                                </tr>
                                <tr>
                                    <td class="heading"> No Financial Defaults</td>
                                    <td>Zero liability in Govt. run projects</td>
                                    <td>Zero liability in Govt. run projects</td>
                                    <td>Zero liability in Govt. run projects</td>
                                </tr>
                                <tr>
                                    <td class="heading"> Haryana Domicile</td>
                                    <td>Same village</td>
                                    <td>Same ward</td>
                                    <td>Same ward</td>
                                </tr>
                                <tr>
                                    <td class="heading"> Retail SpaceRequirements</td>
                                    <td>≥200 sq.ft. preferably on Ground Floor
                                        and Centrally Located</td>
                                    <td>200 - 700 sq.ft. preferably on Ground Floor
                                        and Centrally Located</td>
                                    <td>≥800 sq.ft. preferably on Ground Floor
                                        and Centrally Located</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex align-items-end justify-content-end">
                            <Button type="button" class="apply_btn modal-btn" data-dismiss="modal">Done</Button>                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- eligibility Modal End-->

<!-- guidelines Modal Start-->
<div class="modal guidelines_modal" id="guidelinesModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close p-0" data-dismiss="modal" aria-hidden="true"><span class="icon-cross"></span></button>
                <div class="guidelines_in">
                    <h4>Guidelines</h4>
                </div>
                <div class="coming-soon">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-center mt-5">
                            <h3>Coming Soon..!</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-1 mb-3">
                            <p>Our Team is working on this page</p>
                        </div>

                    </div>
                    <div class="container">
                        <div class="d-flex flex-wrap align-items-center justify-content-center mb-5">
                            <img src="{{ url('website/auth') }}/images/tree.svg" class="img-fluid">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- guidelines Modal End-->

<!-- faq Modal Start-->
<div class="modal faq_modal" id="faqModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close p-0" data-dismiss="modal" aria-hidden="true"><span class="icon-cross"></span></button>
                <div class="faq_in">
                    <h4>Frequently Asked Questions</h4>
                </div>
                <div class="coming-soon">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-center mt-5">
                            <h3>Coming Soon..!</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-1 mb-3">
                            <p>Our Team is working on this page</p>
                        </div>

                    </div>
                    <div class="container">
                        <div class="d-flex flex-wrap align-items-center justify-content-center mb-5">
                            <img src="{{ url('website/auth') }}/images/tree.svg" class="img-fluid">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- faq Modal End-->

<script>
    $(document).ready(function() {

        $('.navbar .dropdown > a').click(function(e) {
            //e.preventDefault();

            var $this = $(this);

            if ($this.next().hasClass('show')) {
                $this.next().removeClass('show');
                // $this.parent().find('.dropdown').removeClass('active');
                $this.find('.fa-chevron-down .fa-chevron-up').removeClass('fa-chevron-up');
                $this.find('.fa-chevron-right .fa-chevron-up').removeClass('fa-chevron-up');
                $this.next().slideUp(350);
            } else {
                $this.parent().parent().find('.fa-chevron-down').removeClass('fa-chevron-up');
                $this.parent().parent().find('.fa-chevron-right').removeClass('fa-chevron-up');
                $this.parent().parent().find('li .inner').removeClass('show');
                $this.parent().parent().find('li .inner').slideUp(350);
                $this.find('.fa-chevron-down').toggleClass('fa-chevron-up');
                $this.find('.fa-chevron-right').toggleClass('fa-chevron-up');
                $this.next().toggleClass('show');
                $this.next().slideToggle(350);
            }

        });
        $('.navbar .dropdown').click(function(e) {
            var $this = $(this);
            if ($this.hasClass('active')) {
                $this.removeClass('active');
            } else {
                $this.parent().parent().find('.active').removeClass('active');
                $this.toggleClass('active');
            }
        });
        var open = false;

        var openbar = function openNav() {
            var element = document.getElementById("navbar");
            element.classList.add("navbar-mobile");
        }
        var closebar = function closeNav() {
            var element = document.getElementById("navbar");
            element.classList.remove("navbar-mobile");
        }

        $('.mobile-nav-toggle').click(function(event) {
            event.stopPropagation();
            var toggle = open ? closebar : openbar;
            toggle();
        });

        $(document).click(function(event) {
            if (!$(event.target).closest('.sidenav').length) {
                closebar();
            }
        });

    });
</script>

@yield('content')
  <!--.................................-->
  <!--FOOTER-->
  <!--.....................................................................................-->
  </div>
  <script type="text/javascript" src="{{ url('website/auth') }}/fontawesome/js/all.min.js"></script>
  <script type="text/javascript" src="{{ url('website/auth') }}/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="{{ url('website/auth') }}/js/jquery.validate.additional-methods.js"></script>
  <script type="text/javascript" src="{{ url('website/auth') }}/js/cust-form-rules.js"></script>
  <script type="text/javascript" src="{{ url('website/auth') }}/js/common.js"></script>
  
</body>


@yield('scripts')

</html>
