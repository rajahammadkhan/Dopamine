<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Mohrim - Index Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{ asset('frontend/ecommerce/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/ecommerce/css/jquery.fancybox.min.css') }}" />
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('frontend/ecommerce/css/slick.css')}}"/> --}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('frontend/ecommerce/css/slick-theme.css')}}"/> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">



    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}


    <link rel="stylesheet" href="{{ asset('frontend/ecommerce/css/animate.css') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/ecommerce/images/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/ecommerce/images/logo.jpg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/ecommerce/images/logo.jpg') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <style>
        span.addtocart {
            position: absolute;
            top: -5px;
            right: 16px;
            background-color: #f89321;
            padding: 2px 7px;
            border-radius: 37px;
            color: white;
            font-size: 10px;
        }
        h4 {
            font-size: 28px;
            font-weight: 500;
        }

        h6 {
            font-size: 18px;
            font-weight: 600;
        }
        .color {
            border: 1px solid #000000!important;}
        .fs-7 {
            font-size: 16px;
            font-weight: 600;
        }

        .logo-flex-img img {
            width: 208px;
        }

        .email-content .form-control {
            padding: 5px 12px;
            font-size: 13px;
        }

        .description-tabs .nav-tabs .nav-link.active {
            border-bottom-color: white;
            font-weight: unset;
        }

        .connect-listing a {
            width: 32px;
            height: 32px;
            font-size: 14px;
        }

        .tab-box-content h5 {
            font-size: 22px;
            font-weight: 600;
        }

        .ship-ret-icon {
            display: flex;
            align-items: center
        }

        .ship-ret-text h4 {
            font-size: 20px;
        }

        .jack-price p {
            font-weight: 600;
            color: #252525;
            font-size: 14px;
        }

        .nav-link {
            color: unset
        }

        .nav-link:hover {
            color: #333
        }
        header{
            padding: 0px 10px !important
        }
        .search-input {
            width: 316px;
        }
        .text-hover:hover {
            color: #f89321 !important;
        }
        .select-opt .form-control {
            font-size: 12px;
        }

        .sidebar-sec .panel-title>a,
        .sidebar-sec .panel-title>a:active {
            padding: 2px;
            font-size: 14px;
            font-weight: 700;
        }

        .black-jacket h4 {
            font-size: 22px;
            font-weight: 600;
        }

        .mens-stuff a {
            font-size: 13px;
        }

        .ship-ret-text p {
            font-size: 13px;
        }

        .description-tabs>.nav {
            gap: 6px;
        }

        .reviews-content-heading h5 {
            font-size: 20px;
            padding: 10px 15px;
            font-weight: 600;
        }

        @media only screen and (min-width: 1440px) and (max-width: 1599px) {
            .btn-quick-links {
                width: 100%;
            }
        }

        .footer-listing a,
        .btn-feedback-links {
            font-size: 12px !important;
        }

        .btn-quick-links,
        .btn-feedback-links {
            padding: 8px 8px !important;
            border: 1px solid;
        }

        .btn-quick-links {
            width: 100%;
        }

        .subscribe-btn .btn-primary {
            padding: 5px 20px;
            font-size: 14px;
        }

        p {
            font-size: 14px;
        }

        .search-input .form-control {
            padding: 6px;
            font-size: 14px;
        }

        .search-icon-btn {
            width: 52px;
            height: 34px;
        }

        .top-bar-sec p {
            font-size: 16px;
        }

        .product-slider-sec {
            padding: 26px 0 64px;
        }

        .proceed-btn i {
            font-size: 20px !important;
        }
        .header-tabs .nav-tabs .nav-link i {
            color: #495057;
            background-color: #fff;
            border-radius: 50%;
            width: 75px !important;
            height: 75px !important;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px !important;
            border: 3px solid #00000047;
            margin: 0 auto 10px auto;
        }
        .header-tabs .nav-tabs .nav-link {
            border-color: transparent;
            font-size: 12px ;
            font-weight: 400;
            color: #878282;
        }
        .form-label-flex .form-control {
            padding: 7px 12px;
        }
        .account-info-box h4 {
            font-size: 22px;
        }
        .account-info-box span {
            width: 30px;
            height: 30px;
            font-size: 18px;
        }
        h6 {
            font-size: 15px;
            font-weight: 600;
        }
        p {
            font-size: 13px;
        }
        .box-fields .form-control {
            padding: 10px 12px;
        }
        .billing-form-box li {
            padding: 7px 0 0;
            font-size: 14px;
            font-weight: 400;
        }
        .container_main {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto
        }

        @media (min-width:576px) {

            .container_main {
                max-width: 540px
            }
        }

        @media (min-width:768px) {

            .container_main {
                max-width: 720px
            }
        }

        @media (min-width:992px) {
            .container_main {
                max-width: 960px
            }
        }

        @media (min-width:1200px) {
            .container_main {
                max-width: 1260px;
            }
        }

        .stars-content li {
            font-weight: 400;
            padding: 0 3px;
        }

        .special-text span {
            font-weight: 500;
            font-size: 13px;
        }

        .special-text p {
            font-weight: 500;
            font-size: 14px;
            color: #f89321;
        }

        li {
            font-size: 14px
        }

        .search-icon-btn i {
            font-size: 12px
        }

        .search-icon-btn a {
            font-size: unset !important;
        }

        header .nav-link {
            font-weight: 400;
        }

        .free-returns h6 {
            font-size: 16px;
            font-weight: 500;
        }

        .free-returns p {
            font-size: 13px;
        }

        .price-content span {
            font-size: 20px;
            font-weight: 600;
        }

        .slick-slider {
            background: #f1f1f1;
        }

        .colors-accordian #main #faq .card .card-header .btn-header-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            font-size: 14px;
        }

        .banner-sec {
            height: auto !important;
        }

        .img-selection input[type=radio]:checked+span {
            color: white;
            border-color: white;
        }

        .price-content h6 {
            font-size: 29px;
        }

        .form-label-flex label {
            font-size: 14px;
        }

        .need-connect a {
            color: #f89321;
            font-weight: 700;
            font-size: 16px;
        }

        .contact-detail-col h5 {
            font-size: 20px;
        }

        .contact-detail-col span {
            font-size: 14px;
        }

        .side-box-inner h6 {
            font-size: 20px;
            font-weight: 600;
        }

        .side-box-ship h6 {
            margin-block: 12px;
            font-size: 16px;
            margin-top: unset;
        }

        .side-box-delivery h6 {
            font-size: 16px;
            margin-bottom: 24px;
        }

        .side-box-qty .form-control {
            margin-bottom: 8px;
            font-size: 12px;
        }

        .left-stock p {
            font-weight: 500;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .fastest-del p {
            font-size: 13px;
            margin-bottom: 10px;
        }

        .buy-cart .buy {
            font-size: 12px;
        }

        a {
            font-size: 14px;
        }

        .logo-sec {
            padding: 20px 120px !important;
        }

        .bannerSec {
            background: #008290;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            gap: 8px;
        }

        .vl {
            border-left: 1.5px solid white;
            height: 22px;
        }

        .bannerBtns .btn {
            color: white;
            font-weight: 100;
            width: 100px;
            transition: .3s ease;
            position: relative;
        }
        .logo-flex-box .account-setting i {
            margin-right: 5px;
            color: #f89321 !IMPORTANT;
            font-weight: 400;
            font-size: 24px;
        }
         .account-setting .empty-btn {
            padding: 8px 20px;
            color: #000;
            font-weight: 500;
            border: unset !Important;
            position: relative;
        }
        img-selection span {
            padding: 5px 21px;
            margin: 5px;
            border: 1px solid #0000003d;
            display: inline-block;
            text-align: center;
            color: #6f8181;
            font-weight: 400;
            font-size: 13px;
        }
        .bannerBtns .btn::after {
            content: '';
            background: white;
            width: 50%;
            height: 1px;
            position: absolute;
            bottom: 4px;
            left: 56%;
            transition: .3s ease;
            transform: translateX(-56%);
            z-index: -1
        }

        .bannerBtns .btn:hover::after {
            left: 0;
            transform: none;
            width: 100%;
            height: 86%;
        }

        .bannerBtns .btn:hover {
            color: #212121;
        }

        .bannerSec h1 {
            background: white;
            color: #008290;
            font-size: 44px;
            text-align: center;
            padding: 2px 14px;
        }

        .new-arrival-bar ul:before {
            bottom: -1px;
        }

        .new-arrival-bar li {
            font-size: 20px;
            font-weight: 600;
        }

        .new-arrival-bar span {
            color: #ced4da;
            font-weight: 100;
        }

        @media (max-width: 992px) {
            .bannerSec h1 {
                font-size: 24px;
            }
        }

        @media (max-width: 768px) {
            .bannerSec h1 {
                font-size: 16px;
                margin-block: 4px !important;
            }

            .bannerBtns .btn {
                font-size: 12px;
            }
        }

        @media (max-width: 992px) {

            .dropdown.bootcustom,
            .search-bar-flex.mob-none,
            .account-setting.mob-none {
                display: none;
            }

        }

        @media (max-width: 768px) {
            .logo-sec {
                padding: 20px 36px !important;
            }

        }

        @media (max-width: 550px) {
            section.content {
                margin-top: 18px;
            }

            .logo-flex-img img {
                width: 158px;
            }

            .navbar-toggler-icon {
                width: 1em;
                height: 1em;
            }
        }

        @media only screen and (min-width: 530px) and (max-width: 767px) {
            header {
                margin-top: unset !important;
            }

            header .navbar-collapse {
                background-color: #323232;

                padding: unset !important;
            }
        }

        @media only screen and (min-width: 320px) and (max-width: 529px) {
            header {
                padding: 0;
                margin: 0;
                background-color: #323232;
            }

            header .navbar-collapse {
                background-color: #323232;
                padding: 0;
            }

            header .navbar {
                justify-content: unset;
                padding: 0 12px;
            }

            .account-setting ul {
                display: flex;
                align-items: center;
                gap: 20px;
            }

            .mobile-account-sec {
                margin-bottom: 0px !important;
            }
        }

        @media only screen and (min-width: 320px) and (max-width: 992px) {
            .logo-flex-box {
                position: unset !important;
                z-index: unset !important;
                width: unset !important;
            }

            .mobile-select-view {
                display: block;
                margin: 10px 0;
            }

            .account-setting a {
                color: #fff;
            }

            header .navbar-nav {
                background-color: #323232;
                align-items: center;
            }

            .mobile-shipping-view,
            .mobile-account-sec,
            .mobile-searchbar {
                display: block;
                text-align: center;
            }

            .account-setting .empty-btn {
                color: #fff;
            }

            .search-bar-flex {
                width: 100%;
            }

            .mobile-searchbar {
                width: 50%;
            }

            .selection-cls .form-control {
                font-weight: 400;
                font-size: 16px;
                border: 1px solid #f89321;
                padding: 6px 10px;
            }

            .empty-btn i {
                color: #f89321;
            }

            header .nav-link:hover {
                background-color: unset;
            }
        }

        .new-arrival-bar ul {
            margin-bottom: 16px;
        }

        .selection-cls .form-control option {
            background-color: unset !important;
            color: #000 !important;
        }

        .light-border {
            border: 1px solid #dddddd7d;
            border-radius: 4px;
        }

        .promo-text {
            font-weight: 400;
        }

        .cut-price {
            font-size: 15px !important;
        }

        .amount-text span {
            font-size: 20px;
        }

        .list-unstyled {
            list-style: none;
            text-decoration: none !important
        }

        .quality-order-detail h5 {
            font-size: 18px;
            font-weight: 600;
        }

        .quality-order-detail h6 {
            font-size: 16px;
        }

        .navbar-toggler {
            background-color: #f89321;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }
        .second-bar-sec .dropdown-content a:hover{
            background-color: #f89321;
        }
        .side-box-qty .form-control {
            width: 70px;
        }
        .details a:hover{
            background-color: #f89321;
        }
        .small-tab-content h6{
            color: #f89321;
        }
        .small-tab-img img{
            width: 100px !important;
            height: 100px !important;
        }
        .bg-signature h3{
            font-size:45px !important;
        }
        .long-description-box h2{
            font-size:35px !important;
        }
        .long-description-box p{
            line-height: 1.8;
        }
        .box-fields span{
            position: absolute;
            right: 10px;
            top: 30%;
            /*margin-left: 707px;*/
            cursor: pointer;"
        }
        .solutions-cls h6
        {
            font-size: 15px;
        }
        #featured_img {
            background-color: #fff!important;
        }
        @media (max-width: 768px) {
            .main-header-form, #navbarSupportedContent{
                width: 100%!important;
            }
            .mobile-searchbar {
                width: 76%!important;
            }
        }
    </style>
    @include('frontend/again')

</head>

<body>
{{--    @if (request()->is('checkout'))--}}
{{--        --}}
{{--    @else--}}
        <!-- TOP BAR SECTION BEGIN -->
        <section class="top-bar-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <p>WEEKEND SPECIAL-EXTRA @20 OFF+FREE SHIPPING-CODE:SAVE20</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- TOP BAR SECTION END -->
        <!-- SECOND BAR SECTION BEGIN -->
        <section class="second-bar-sec p-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-12">
                        <div class="selection-cls">
                            <div class="dropdown">
                                <button class="dropbtn">Customer Service <i class="fa fa-caret-down"
                                        aria-hidden="true"></i></button>
                                <div class="dropdown-content">
                                    <a href="{{url('contact-us')}}">Contact Us</a>
                                    <a href="{{url('page/shipping-delivery')}}">Shipping</a>
                                    <a href="{{url('page/returns-exchanges')}}">Returns</a>
                                    <a href="javascriptvoid:(0)">Privacy Policy</a>
                                    <a href="javascriptvoid:(0)">Order Status</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-9 col-12">
                        <div class="cutomer-listing">
                            <ul>
                                <li><span>FREE</span> shipping on order over <span>$149**</span>
                                    <a class="text-hover" href="" data-toggle="popover"
                                        title="Free Shippings on Orders Over S149"
                                        data-content="Free shipping for orders above $149 is offered for delivery within the Continental United States only.  Please call customer service for a price quote for shipping to Alaska, Hawaii, Puerto Rico, and other  US territories.">detail</a>
                                </li>
                                <li><small>|</small></li>
                                <li>Order by <span>1pm*</span> PST for Next day shipping
                                    <a class="text-hover" href="javascriptvoid:(0)" data-toggle="popover"
                                        title="Order by 1pm* PST for Next day shipping"
                                        data-content="Not all products are stocked in all warehouses. For products stocked on the East Coast, we must receive orders by 1:00pm EST and for products stocked on the West Coast, your order must be in by 1:00 pm PST. Additionally, some orders require credit verification, etc. Although we try our best but those orders may not ship the Next day.">detail</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-9 col-12 p-0">
                        <p class="sup-txt">For Support: Call us at <a class="text-hover" href="javascriptvoid:(0)" style="color: white">( 1- 866-847-8678 )</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- SECOND BAR SECTION END -->
        <!-- LOGO SECTION BEGIN -->
        <section class="logo-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="logo-flex-box">
                            <div class="logo-flex-img">
                                <a href="{{ url('/') }}"><img
                                        src="{{ asset('frontend/ecommerce/images/logo.jpg') }}" align="image"
                                        class="img-fluid"></a>
                            </div>
                            {{ $Snippet('currencyfilter') }}
                            <div class="search-bar-flex mob-none">
                                <form action="{{url('SearchProduct')}}" method="get" class="d-flex">
                                    @csrf
                                <div class="search-input">
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Type Your Keyword Here, I will find it for you!">
                                </div>
                                <button type="submit" class="search-icon-btn border-0 text-white">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                                </form>
                            </div>
                            <div  class="account-setting mob-none">
                                <ul>
                                    @guest
                                        <li><a href="{{ url('login') }}"><i class="fa fa-unlock" aria-hidden="true"></i>
                                                Login</a></li>

                                    @endguest
                                    @auth
                                        <li><a href="{{ url('my-profile') }}"><i class="fa fa-user-circle-o"
                                                    aria-hidden="true"></i> My Account</a></li>

                                    @endauth
                                    <li>
                                        <a href="{{ url('cart') }}" class="empty-btn"><i
                                                class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                            <span class="addtocart">{{ Session::get('cart') == null ? '0' : count(Session::get('cart')) }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button class="navbar-toggler d-lg-none d-md-block d-block" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- LOGO SECTION END -->
        <!-- HEADER SECTION BEGIN -->
        <header>
            <div class="container-fluid">
                <div class="row nav-bar-row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <nav class="navbar navbar-expand-lg navbar-dark">

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="{{url('collection/mens')}}"
                                            id="navbarDropdown" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Men
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="{{url('collection/womens')}}"
                                            id="navbarDropdown" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Women
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Boys
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Girls
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Infants & Toddlers
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Work Wear
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Business Wear
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Athletic Wear
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Outer Wear
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Closeout
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Deals
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mobile-select-view mb-3">
                                        <div class="selection-cls">
                                            <select class="form-control">
                                                <option>Customer Service</option>
                                                <option>Customer Service</option>
                                                <option>Customer Service</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            Decoration
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="separator">|</span></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="javascriptvoid:(0)"
                                           id="navbarDropdown" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            More
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc3.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <div class="mega-flex">
                                                        <div class="mega-inner">
                                                            <h6>T-Shirts</h6>
                                                            <ul>
                                                                <li><a href="javascriptvoid:(0)">Short Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Long Sleeves</a></li>
                                                                <li><a href="javascriptvoid:(0)">Tie-Die</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="mega-flex-img">
                                                            <img src="{{ asset('frontend/ecommerce/images/jc5.jpg')}}" alt="image" height="100" width="100"
                                                                 class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    {{-- <li class="mobile-shipping-view">
                                        <div class="cutomer-listing">
                                            <ul>
                                                <li><span>FREE</span> shipping on order over <span>$149**</span> <a
                                                        href="javascriptvoid:(0)">detail</a></li>
                                                <li><small>|</small></li>
                                                <li>30 Day Easy Returns</li>
                                                <li><small>|</small></li>
                                                <li><i class="fa fa-shield" aria-hidden="true"></i> 100% Secure
                                                    Transactions</li>
                                                <li><small>|</small></li>
                                                <li><i class="fa fa-plane" aria-hidden="true"></i> We Ship Worldwide
                                                </li>
                                                <li><small>|</small></li>
                                                <li><i class="fa fa-user" aria-hidden="true"></i> Excellent After
                                                    Sales Support</li>
                                            </ul>
                                        </div>
                                    </li> --}}
                                    <li class="mobile-account-sec mb-4">
                                        <div class="account-setting">
                                            <ul>
                                                @auth
                                                    <li><a href="{{ url('my-profile') }}"><i class="fa fa-user-circle-o"
                                                                aria-hidden="true"></i> My Account</a></li>
                                                @endauth
                                                @guest
                                                    <li><a href="{{ url('login') }}"><i class="fa fa-unlock"
                                                                aria-hidden="true"></i> Login</a></li>
                                                @endguest
                                                <li>
                                                    <a href="{{ url('cart') }}" class="empty-btn"><i
                                                            class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                        {{ Session::get('cart') == null ? '' : count(Session::get('cart')) }}
                                                    </a>
                                                </li>
                                                {{--                                            <li><a href="javascriptvoid:(0)" class="empty-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Empty</a></li> --}}
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="mobile-searchbar">
                                        <div class="search-bar-flex">
                                            <form action="{{url('SearchProduct')}}" method="get" class="d-flex main-header-form">
                                                @csrf
                                            <div class="search-input">
                                                <input type="text" class="form-control" name="search"
                                                    placeholder="Type Your Keyword Here, I will find it for you!">
                                            </div>
                                            <button type="submit" class="search-icon-btn border-0 text-white">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
{{--        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>--}}
{{--        <script>--}}
{{--            // $("#search").on("keyup", function() {--}}
{{--            //     var value = $(this).val().toLowerCase();--}}
{{--            //     $(".column-blog").filter(function() {--}}
{{--            //         $(this).toggle($(this).find('.parawf').text().toLowerCase().indexOf(value) > -1)--}}
{{--            //     });--}}
{{--            // });--}}
{{--            $("#search").on("keyup", function() {--}}
{{--                var value = $(this).val().toLowerCase();--}}
{{--                $(".column").filter(function(e) {--}}
{{--                    // console.log($(this).find('.title a'))--}}
{{--                    $(this).toggle($(this).find('.title a').text().toLowerCase().indexOf(value) > 0)--}}
{{--                });--}}
{{--            });--}}
{{--        </script>        <!-- HEADER SECTION END -->--}}
{{--@endif--}}

