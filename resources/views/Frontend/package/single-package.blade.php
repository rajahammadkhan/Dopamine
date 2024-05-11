@extends('Frontend.layouts.master')

@section('content')
    <style>
        pre {
            all: unset;
        }

        pre span {
            font-size: 16px;

        }

        .text-main {
            color: #fb8f1d;
        }

        .btn-register {
            background-color: #fb8f1d !important;
            color: #fff;
        }

        .accordian-img img {
            transition: all .3s ease;
        }

        .accordian-img:hover img {
            filter: brightness(0.5);
        }

        .accordian-img:hover a {
            opacity: 1;
        }

        .accordian-img a {
            transition: all .3s ease;
            opacity: 0;
        }

        .accordion-button {
            background: white !important;
            color: black !important;
            box-shadow: none !important;
        }

        .owl-carousel {
            max-width: 700px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .owl-carousel-review {
            max-width: 100% !important;
        }




        .owl-carousel .item {
            font-size: 12px;
            text-align: start;
            padding: 4px;
            line-height: 2;
            font-weight: 400;
            background-color: #fff;
        }

        .owl-carousel img {
            margin-bottom: 12px;
            border-radius: 10px;
        }

        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next {
            z-index: 1;
            width: 40px;
            height: 40px;
            background-color: #fff;
            border-radius: 8px;
            position: absolute;
            top: 50%;
            transform: translatey(-50%);
            border: 1px solid #ccc;
        }

        .owl-nav button span {
            font-size: 26px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .owl-carousel .owl-nav button.owl-prev {
            left: 0;
        }

        .owl-carousel .owl-nav button.owl-next {
            right: 0;
        }

        .owl-carousel .owl-nav {
            margin: 0;
        }

        .owl-carousel .btn-wrap {
            text-align: center;
            width: 100%;
        }

        .owl-carousel button {
            background-color: #ddd;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 10px;
            font-size: 18px;
            font-weight: 600;
            transition: all 0.5s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .owl-theme .owl-nav .disabled,
        button.disabled {
            opacity: 0.6;
        }
         .tabz .nav-tabs .nav-link {
             width: auto !important;
         }
        .tabz{
            font-size: 1.34rem;
        }
        .tabz .nav-link{
            color: #21212182;
        }
        #nav-tab{
            width: 100%;
        }
        div.tabs-data-main {
            position: relative;
            z-index: 2;
            float: right;
            width: 100%;
            padding-top: 24px;
        }
        .exclusion-list, .inclusion-list {
            margin: 0;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .list-50 li {
            display: inline-block;
            width: 50%;
            padding-right: 10px;
            vertical-align: top;
        }

        .exclusion-list li, .inclusion-list li {
            display: block;
            list-style: none;
            position: relative;
            padding-left: 24px;
            margin-bottom: 15px;
            width: 100%;
        }
        .exclusion-list li:before, .inclusion-list li:before {
            content: "";
            width: 8px;
            height: 8px;
            background: #fc5145;
            border-radius: 100%;
            position: absolute;
            left: 0;
            top: 6px;
        }.inclusion-list li:before {
             background: #4caf50;
         }
        div.tabs-data-main {
            position: relative;
            z-index: 2;
            float: right;
            width: 100%;
            padding-top: 24px;
        }
        .myaccordion {
            max-width: 500px;
            margin: 50px auto;
            box-shadow: 0 0 1px rgba(0,0,0,0.1);
        }

        .myaccordion .card,
        .myaccordion .card:last-child .card-header {
            border: none;
        }

        .myaccordion .card-header {
            border-bottom-color: #EDEFF0;
            background: transparent;
        }

        .myaccordion .fa-stack {
            font-size: 18px;
        }

        .myaccordion .btn {
            width: 100%;
            font-weight: bold;
            color: #004987;
            padding: 0;
        }

        .myaccordion .btn-link:hover,
        .myaccordion .btn-link:focus {
            text-decoration: none;
        }

        .myaccordion li + li {
            margin-top: 10px;
        }

        /* Rating Star Widgets Style */
        .tab-box-content-img>div {
            height: 80px;
        }

        .tab-box-content-img>div img {
            height: 100%;
        }

        .tab-box-content li {
            padding: 0px;
            font-size: 12px !important;
        }

        .special-text p {
            text-transform: uppercase;
        }

        .rating-stars ul {
            list-style-type: none;
            padding: 0;

            -moz-user-select: none;
            -webkit-user-select: none;
        }

        .rating-stars ul>li.star {
            display: inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul>li.star>i.fa {
            font-size: 2.5em;
            /* Change the size of the stars */
            color: #ccc;
            /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul>li.star.hover>i.fa {
            color: #FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul>li.star.selected>i.fa {
            color: #FF912C;
        }

        .review-desc{
            height: 85px;
            overflow:auto ;
        }
    </style>
    <section class="explore">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class=" row p-0 d-flex align-items-center justify-content-between">

                        <div class="w-auto d-flex align-items-center gap-3"><h1 class="d-inline-block"><span
                                    class="iblock mr8">A Luxurious Vacay In Andaman</span>
                                <span class="f16 m0 iblock fw7 at_package_duration"><span class="text-main">4 Days &amp; 3 Nights </span><span
                                        class="ms-3 border"></span></span></h1><span
                                class="pfc4 iblock">Customizable</span></div>

                        <div class="w-auto">
                            <div class="flex alignCenter"><span class="mr8 option-overflow css-uxpbqe"> </span><span
                                    class="fw7 f12 pfc3 m0 option-overflow">Call Us for details </span><span
                                    class="ml8 f16 pfc1 fw7">1800-123-5555</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{asset('images/media'.'/'.$single_package->image)}}" alt=""
                                 class="shadow rounded-3 w-100">

                        </div>
                        <div class="col-12 my-4">
                            <div class="p-3 card">
                                <h3 class="section-title">{{$single_package->title}} </h3>
                                <p class="p-description my-0">{!!$single_package->description!!}</p>
                            </div>
                        </div>

                        <div class="col-12 my-4">
                            <div class="p-4 card">
                                <h3 class="section-title mb-4">Highlights</h3>
                                <div class="row">
                                    @foreach($highlights as $highlight)
                                        <div class="col-md-6 my-2"><h3 class="fw-normal"><i
                                                    class="me-3 text-main fa-solid fa-check"></i>{{$highlight->highlights}}
                                            </h3></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-4">
                            <div class="p-4 card">
                                <h3 class="section-title ">Hotels</h3>
                                <p class="mb-4 fs-5">
                                    Note: Our agents will provide you these or similar hotels depending on
                                    availability</p>
                                @foreach($hotels as $hotel)
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button fs-4" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                <div class="d-flex flex-column">

                                                    <b> Days 1, 3</b>
                                                    <p class="m-0">
                                                        Port blair

                                                    </p>
                                                </div>

                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                             aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-md-6 p0">
                                                        <div class=" position-relative accordian-img">
                                                            <div class="relative wfull overflowh"
                                                                 style="height: 0px; padding-bottom: 62.4585%;"><img
                                                                    src="{{asset('images/media'.'/'.$hotel->image)}}"
                                                                    alt="Sea shell"
                                                                    data-src="https://img.traveltriangle.com/cms/attachments/pictures/879851/original/18213270.jpg?tr=w-301,h-188"
                                                                    class="imgGlobal lazyloaded"></div>
                                                            <a class="btn btn-register position-absolute top-50 start-50 translate-middle"
                                                               href="http://127.0.0.1:8000/admin/home"><i
                                                                    class="mx-1 fa fa-user-circle-o"
                                                                    aria-hidden="true"></i> My Account</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 p15 pb8">
                                                        <div>
                                                            <div class="hotel-details"><h3
                                                                    class="f14 fw9 m0 iblock pfc3 wfull text-capitalize at_hotelName">
                                                                {{$hotel->title}}</h3>

                                                                <p class="mb8 f12 pfc3 at_hoteladdress">{{$hotel->description}}</p>
                                                                <div class="row">
                                                                    <div class="col-md-12 css-d6s1j9">
                                                                        <div id="TA_socialButtonBubbles102837page"
                                                                             class="TA_socialButtonBubbles TA_socialButtonCommon">
                                                                            <div class="socialWidgetContainer">
                                                                                <div
                                                                                    class="socialWidget  cx_brand_refresh1 ">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="TA_socialButtonReviews102837pager"
                                                                             class="TA_socialButtonReviews TA_socialButtonCommon">
                                                                            <div class="socialWidgetContainer">
                                                                                <div
                                                                                    class="socialWidget  cx_brand_refresh1 ">

                                                                                    <div
                                                                                        class="socialWidgetCallout">
                                                                                        <div
                                                                                            class="grayArrowLeft"></div>
                                                                                        <div class="borderBox">
                                                                                            <div
                                                                                                class="reviewCount">
                                                                                                955
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 css-6qrg53">
                                                                        <div class="row row-">
                                                                            <ul class="package-tags at_package_tags">
                                                                                <li>Bar/lounge</li>
                                                                                <li>Restaurant</li>
                                                                                <li>Iron/ironing board</li>
                                                                                <li>Laundry facilities</li>
                                                                                <li>Garden</li>
                                                                                <li>Pets not allowed</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="iblock text-left wfull fleft mt5 at_facilities">
                                                                <div class="clearfix">
                                                                    <div class="css-1orsbsm"><a title="Drinks"
                                                                                                class="cursorD"
                                                                                                style="width: 8px;">

                                                                        </a></div>
                                                                    <div class="css-1orsbsm"><a title="WiFi"
                                                                                                class="cursorD"
                                                                                                style="width: 21px;">

                                                                        </a></div>
                                                                    <div class="css-1orsbsm"><a title="Meals"
                                                                                                class="cursorD"
                                                                                                style="width: 22px;">

                                                                        </a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 my-4">
                            <div class="p-3 card">
                                <h3 class="section-title">Our Commitment to Safe Holidays </h3>
                                <p>We are actively working with our Holiday Partners to maintain the safety measures for providing you a risk free vacation.
                                </p>
                                <div class="row">
                                    <div class="col-12 p-0">
                                        <div class="owl-carousel owl-theme">
                                            @foreach($holidays as $holiday)
                                            <div class="item">
                                                <div class="covidCard_img" style="height: 200px;">
                                                    <div class="covidCard_img">
                                                        <img
                                                            src="{{asset('images/media'.'/'.$holiday->image)}}"
                                                            alt="covid image" class="h-100">
                                                    </div>
                                                    <h4 class="covidCard_title">{{$holiday->title}}</h4>
                                                    <p class="covidCard_description">{!! $holiday->description !!}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 tabz my-4">
                            <div class="p-3 card">
                                <div class="card p-3 shadow" style="max-width: 600px;">
                                    <h2 class="text-center p-3">Card with Tabs</h2>
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-home" type="button" role="tab"
                                                    aria-controls="nav-home" aria-selected="true">Inclusions
                                            </button>
                                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-profile" type="button" role="tab"
                                                    aria-controls="nav-profile" aria-selected="false">Exclusions
                                            </button>
                                        </div>
                                    </nav>
                                    <div class="tab-content p-3  " id="nav-tabContent">
                                        <div class="tab-pane fade active show p-0" id="nav-home" role="tabpanel"
                                             aria-labelledby="nav-home-tab">
                                            <div class="tabs-data-main p-0">
                                                <ul class="inclusion-list list-50 at_inclusion-list">
                                                    <li>GST as per the prevailing government rules</li>
                                                    <li>Accommodation</li>
                                                    <li>Complimentary breakfast</li>
                                                    <li>Base Category AC rooms, as per the package chosen</li>
                                                    <li>Vehicle
                                                        sightseeing
                                                    </li>
                                                    <li>Harbor transfers</li>
                                                    <li>Airport pick-up and drop</li>
                                                    <li>Private vehicle for travel</li>
                                                    <li>AC vehicle in Port Blair &amp; Havelock</li>
                                                    <li>Sightseeing</li>
                                                    <li>Forest Permits &amp; all entry ticket</li>
                                                    <li>Cruise/Ferries</li>
                                                    <li>Cruise run by a private company (from Port Blair – Havelock
                                                        Island – Port Blair)
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                             aria-labelledby="nav-profile-tab">
                                            <div class="tabs-data-main p-0">
                                                <ul class="exclusion-list list-50 at_exclusion-list">
                                                    <li>Snorkeling, if provided in the package, is provided with
                                                        Standard Equipment (If you are not
                                                        comfortable with the same, the cost of other equipment must be
                                                        borne by the customer
                                                    </li>
                                                    <li>Any cost incurred for images and videos during water sport
                                                        activities
                                                    </li>
                                                    <li>Gala Dinner Charges in the hotels on Christmas, New Year,
                                                        Valentine, or any special day (note these charges are mandatory)
                                                    </li>
                                                    <li>Anything that is not mentioned in the inclusion section</li>
                                                    <li>Any chargeable services utilized in the hotel</li>
                                                    <li>Any expense which is done for personal entertainment</li>
                                                    <li>Flight tickets/Train Ticket until unless not specified above
                                                    </li>
                                                    <li>Camera charges and tip at different sites and restaurants</li>
                                                    <li>Any additional payment due to weather uncertainty/ferry
                                                        problems/change in itinerary
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-4">
                            <h2>FAQs for Andaman</h2>
                            @foreach($faqs as $faq)
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <strong>{{$faq->faqs_question}}</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{$faq->faqs_answer}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-12 my-4">
                            <div class="reviews-content-heading">
                                <h5>Hotel Reviews</h5>
                                <div class="main-review-text mt-2">
                                    <form action="{{url('reviews')}}" method="POST">
                                        @csrf
                                      <input type="hidden" name="package_id" value="{{$single_package->id}}">
                                        <div class="header">
                                            <div class="row">

                                                <div class="col-md-6 col-12 my-md-auto my-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control form-control shadow-none"
                                                               id="name_field" name="name" value="{{ old('name') }}" required
                                                               placeholder="Name">
                                                        <label for="name_field">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 my-md-auto my-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control form-control shadow-none"
                                                               id="email_field" name="email" value="{{ old('email') }}" required
                                                               placeholder="Email">
                                                        <label for="email_field">Email</label>
                                                    </div>
                                                </div>
                                                <div class=" col-12 mb-md-4 my-2">
                                                    <div class="form-floating">
                                                <textarea class="form-control form-control shadow-none" placeholder="Leave a Comment here" name="comment"
                                                          id="comment_area" style="height: 100px" required>{{ old('comment') }}</textarea>
                                                        <label for="comment_area">Leave a Comment
                                                            here</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 my-md-auto my-2 my-auto">
                                                    <div class="form-line">

                                                        <section class='rating-widget'>

                                                            <!-- Rating Stars Box -->
                                                            <div class='rating-stars text-left'>
                                                                <ul id='stars'>
                                                                    <li class='star' title='Poor' data-value='1'>
                                                                        <i class='fa fa-star fa-fw'></i>
                                                                    </li>
                                                                    <li class='star' title='Fair' data-value='2'>
                                                                        <i class='fa fa-star fa-fw'></i>
                                                                    </li>
                                                                    <li class='star' title='Good' data-value='3'>
                                                                        <i class='fa fa-star fa-fw'></i>
                                                                    </li>
                                                                    <li class='star' title='Excellent' data-value='4'>
                                                                        <i class='fa fa-star fa-fw'></i>
                                                                    </li>
                                                                    <li class='star' title='WOW!!!' data-value='5'>
                                                                        <i class='fa fa-star fa-fw'></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <input class="rating" type="hidden" name="rating" value="1">
                                                        </section>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 my-md-auto text-end my-2 buy-cart">
                                                    @auth
                                                        <button class="btn btn-primary w-50  border-0 buy ms-auto">Submit
                                                        </button>
                                                    @endauth
                                                    @guest
                                                        <a href="{{ url('login') }}" class="w-50 rounded-pill">
                                                            <button type="button"
                                                                    class="w-100 h-100 py-0 border-0 buy ms-auto">Submit
                                                            </button>
                                                        </a>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 my-4">
                    <div class="p-3">
                        <h3 class="section-title">3 Authentic Traveler Reviews</h3>
                        <p>Read on to find out why our customers love us!.</p>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="owl-carousel owl-carousel-review owl-theme">
                                    @foreach($reviews as $review)
                                        <div class="item">
                                            <div class="covidCard card shadow p-3">
                                                <h4 class="covidCard_title my-2">4 days trip</h4>
                                                <p class="covidCard_description review-desc">{!! $review->comment !!}</p>

                                                <div class="row ">
                                                    <div class="col-3">
                                                        <img src="{{asset('images/profile/avatar.png')}}" class="w-100 rounded-pill" alt="">
                                                    </div>
                                                    <div class="col my-auto">
                                                        @for ($x = 1; $x <= $review->rating; $x++)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        @endfor
                                                        @for ($x = $review->rating; $x <= 4; $x++)
                                                            <i class="fa fa-star text-muted" aria-hidden="true"></i>
                                                        @endfor
                                                        <h4>raja</h4>
                                                        <p class="text-muted mb-2">lorem</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-4">
                    <div class="trendings-content">
                        <div class="section-header">
                            <h3 class="section-head-title">Similar Packages</h3>
                        </div>
                        <div class="stories">
                            @if(count($similarPackage) > 0)
                                @foreach($similarPackage as $pack)
                                    <div class="story">
                                        @if($pack->image!= null)
                                            @php $image = '/'.$pack->image @endphp
                                        @else
                                            @php $image = 'galleryimage.png' @endphp
                                        @endif
                                        <a href="{{$locale('package/',$pack->slug)}}?language_id={{$pack->language_id}}">
                                            <img src="{{asset('images/media'.'/'.$image)}}" alt="" class="story-img">
                                        </a>
                                        <a href="{{url('package',$pack->slug)}}?language_id={{$pack->language_id}}">
                                            <h4 class="story-title">{{$pack->title}}</h4>
                                        </a>
                                        <p class="story-desc my-0">{!!$pack->description!!}</p>
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="subscribe-bar">
                    <div class="subscribe-content">
                        <h3>Sign up for email</h3>
                    </div>
                    <div class="email-content mt-3">
                        <form id="mailForm" class="d-flex">
                            <input type="email" class="form-control fs-4" id="email" name="email" required
                                   placeholder="Enter your email address">
                            <div class="subscribe-btn">
                                <button type="button" class="btn btn-explore mt-0 submitt">SUBSCRIBE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
