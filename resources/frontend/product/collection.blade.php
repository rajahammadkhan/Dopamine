@extends('frontend.layouts.master')
@section('content')
<!-- SLIDER SECTION BEGIN -->
<section class="img-slider-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="img-slic-slider">
                    <div class="slider slider-for m-0">
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                        <div>
                            <img src="{{asset('frontend/ecommerce/images/placeholder-img.png')}}" alt="image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SLIDER SECTION END -->
<!-- SIDEBAR SECTION BEGIN -->
<section class="sidebar-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-12">
                <div class="wrapper">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        CATEGORY
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <ul class="mens-stuff">
                                        @foreach($categories as $category)
                                            <li><input type="checkbox" name="category_filter[]" class="submit-form" id="category_id" value="{{$category->id}}">{{$category->title}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        BRAND
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <ul class="mens-stuff">
                                        @foreach($brand as $brands)
                                            <li><input type="checkbox" name="brand_filter[]" class="submit-form"  id="brand_id" value="{{$brands->id}}"> {{$brands->title}}</li>
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Augusta (4)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Badger (2)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Code V (3)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District (2)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> District Made (1)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Port Authority (1)</a></li>--}}
{{--                                        <li><a href="javascriptvoid:(0)"><input type="checkbox"> Tri-Mountain (1)</a></li>--}}
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @foreach($variations as $variation)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFor{{$variation->attribute_name}}" aria-expanded="false" aria-controls="collapseFour">
                                        {{$variation->attribute_name}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFor{{$variation->attribute_name}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <ul class="mens-stuff">
                                        @foreach(json_decode($variation->variations) as $VariationOptions)
                                        <li><input type="checkbox" name="variation_filter[]" class="submit-form" id="variation_option" value="{{$VariationOptions}}">{{$VariationOptions}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-12">
                <div class="black-jacket">
                    <h4>BLACK LEATHER JACKET</h4>
                    <span class="bottom-line"></span>
                    <p>Black is a classic color. The significant advantage of having a leather jacket in black is that it goes with everything. You can wear the jacket with every fashion, style and color.</p>
                </div>
                <div class="row sort-border">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="sort-opt-flex">
                            <div class="sort-opt">
                                <p>Sort by:</p>
                            </div>
                            <div class="select-opt">
                                <select class="form-control">
                                    <option>Most Popular</option>
                                    <option>Most Popular</option>
                                    <option>Most Popular</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="windows-list">
                            <ul>
                                <li><a href="javascriptvoid:(0)"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>
                                <li><a href="javascriptvoid:(0)"><i class="fa fa-list" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row my-3 product-grid">
                    @include('frontend/snippets/product-grid-view')
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SIDEBAR SECTION END -->
<!-- CUSTOMER REVIEWS SECTION BEGIN -->
<section class="customer-reviews-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="customer-content">
                    <h4>FJACKETS LEGIT CUSTOMERS</h4>
                </div>
                <div class="customer-reviews-slider">
                    <div class="slider responsive-review">

                            @foreach($product_reviews as $products)
                            <div class="reviews-box">
                                <div class="reviews-box-content">
                                    <p>{{$products->comment}}</p>
                                </div>
                                <div class="client-info">
                                    <div class="client-img">
                                        @if(Auth::check())
                                            @if (auth()->user()->image != null)
                                                @php
                                                    $image = auth()
                                                        ->user()
                                                        ->where('id',$products->user_id)
                                                        ->first()->image;
                                                @endphp
                                            @else
                                                @php $image = 'avatar.png' @endphp
                                            @endif
                                        <img src="{{ asset('images/profile' . '/' . $image) }}"
                                             alt="{{ ' Dashboard' }}" class="img-fluid">
                                    </div>
                                    @endif
                                    <div class="cust-info">
                                        <h6>{{$products->name}}</h6>
                                        <ul class="stars-box">
                                            @for ($x = 1; $x <= $products->rating; $x++)
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            @endfor
                                            @for ($x = $products->rating; $x <= 4; $x++)
                                                <i class="fa fa-star text-muted" aria-hidden="true"></i>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CUSTOMER REVIEWS SECTION END -->
<!-- JACKETS FAMILY SECTION BEGIN -->
<section class="jackets-family-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="jackets-family-content">
                    <h4>#FJACKETS FAMILY</h4>
                    <a class="text-hover" href="javascriptvoid:(0)">View Gallery <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="family-slider">
                    <div class="slider responsive-family">
                        @foreach($gallery as $galleries)
                        <div>
                            <a href="{{asset('images/media/'.$galleries->image)}}" data-fancybox="gallery">
                                <img src="{{asset('images/media/'.$galleries->image)}}" alt="image" class="img-fluid">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- JACKETS FAMILY SECTION END -->
<!-- REAL JACKET SECTION BEGIN -->
<section class="real-jacket-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="real-jacket-content">
                    <h4>Real Leather Jackets, Coats and Blazers | Formal Suit and Tuxedos for Men</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- REAL JACKET SECTION END -->
<!-- SUBSCRIBE SECTION BEGIN -->
<section class="subscribe-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="subscribe-bar">
                    <div class="subscribe-content">
                        <h6>Sign up for email</h6>
                    </div>
                    <div class="email-content">
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <div class="subscribe-btn">
                            <button type="button" class="btn btn-primary">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="connect-content">
                    <h6>Connect with us</h6>
                    <div class="connect-listing">
                        <ul>
                            <li><a href="https://www.facebook.com/" class="col1"><i class="fa fa-facebook"
                                                                                    aria-hidden="true"></i></a></li>
                            <li><a href="https://twitter.com/" class="col2"><i class="fa fa-twitter"
                                                                               aria-hidden="true"></i></a></li>
                            <li><a href="https://www.pinterest.com/" class="col3"><i class="fa fa-pinterest-p"
                                                                                     aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/" class="col4"><i class="fa fa-instagram"
                                                                                     aria-hidden="true"></i></a></li>
                            <li><a href="https://www.youtube.com/" class="col5"><i class="fa fa-youtube"
                                                                                   aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SUBSCRIBE SECTION END -->
<script>
    $('.slider-for').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        // asNavFor: '.slider-for',
        // dots: true,
        // infinite:true,
        focusOnSelect: true
    });



            $('.responsive-family').slick({
                dots: true,
                infinite: true,
                arrows: false,
                autoplay: true,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });




            $('.responsive-review').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // $('input[type="checkbox"]').click(function () {
            $(".submit-form").click(function(){
            $('.product-grid').html("");
               var category_id = $("input[name='category_filter[]']:checked").map(function(item){
                   return $(this).val();
               }).get();
               var brand_id = $("input[name='brand_filter[]']:checked").map(function(){
                   return $(this).val();
               }).get();
               var variation_option = $("input[name='variation_filter[]']:checked").map(function(){
                   return $(this).val();
               }).get();

                console.log(variation_option);

            $.ajax({
                type: 'GET',
                url: "{{url('fetch-category')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'category_id': category_id,
                    'brand_id': brand_id,
                    'variation_option': variation_option,
                },
                contentType: "application/json",
                success: function (data) {
                    // console.log(data);
                        $('.product-grid').html(data);
                    {{--$.each(data, function (index, item) {--}}
                    {{--    console.log(item);--}}
                    {{--    if(item != null)--}}
                    {{--    {--}}
                    {{--    $('.product-grid').append(--}}
                    {{--        `<div class="col-md-3 col-sm-6 col-6 padd-rgt my-2 parawf">--}}
                    {{--         <div class="light-border d-flex align-items-center justify-content-between flex-column h-100">--}}
                    {{--          <div class="h-100 d-flex align-items-center justify-content-between flex-column w-100">--}}
                    {{--          <div id="featured_img" class="w-100">--}}
                    {{--          <a href="">--}}
                    {{--           <img style="" src="{{asset('images/media')}}/${item.image}" class="w-100" height="200px"></a></div>--}}
                    {{--          <h4 class="jacket-heading heading-truncate">--}}
                    {{--          <a href="" class="fs-6 text-dark">--}}
                    {{--           ${item.title}--}}
                    {{--          </a></h4>--}}
                    {{--          <p class="amount-text"><span><small class="text-uppercase"> ${item.currency_symbol}</small>${item.discounted_price}</span>--}}
                    {{--          <small></small>--}}
                    {{--          <span class="cut-price text-uppercase">${item.currency_symbol} ${item.compare_price}</span>--}}
                    {{--          </p></div>--}}
                    {{--          <div class="w-100 d-flex align-items-center justify-content-between flex-column">--}}
                    {{--          <h6 class="promo-text w-100">35% OFF-Save $40.00</h6>--}}
                    {{--          <p class="free-shipping-text promo-text bg-white text-center"><a href=""> Free Shipping </a></p>--}}
                    {{--          </div></div></div>--}}
                    {{-- `);--}}
                    {{--  }--}}
                    {{--});--}}
                }
            });
        });
    });
                    // jQuery.each(data, function (index,item) {
                    //     console.log(${item.id});
                     {{--$('.product-grid').append(--}}
                     {{--    `<div class="col-md-3 col-sm-6 col-6 padd-rgt my-2 parawf">--}}
                     {{--     <div class="light-border d-flex align-items-center justify-content-between flex-column h-100">--}}
                     {{--     <div class="h-100 d-flex align-items-center justify-content-between flex-column w-100">--}}
                     {{--     <div id="featured_img" class="w-100">--}}
                     {{--     <a href="">--}}
                     {{--      <img style="" src="{{asset('images/media')}}/${item.image}" class="w-100" height="200px"></a></div>--}}
                     {{--     <h4 class="jacket-heading heading-truncate">--}}
                     {{--     <a href="" class="fs-6 text-dark">--}}
                     {{--      ${item.title}--}}
                     {{--     </a></h4>--}}
                     {{--     <p class="amount-text"><span><small class="text-uppercase"> ${item.currency_symbol}</small>${item.discounted_price}</span>--}}
                     {{--     <small></small>--}}
                     {{--     <span class="cut-price text-uppercase">${item.currency_symbol}${item.compare_price}</span>--}}
                     {{--     </p></div>--}}
                     {{--     <div class="w-100 d-flex align-items-center justify-content-between flex-column">--}}
                     {{--     <h6 class="promo-text w-100">35% OFF-Save $40.00</h6>--}}
                     {{--     <p class="free-shipping-text promo-text bg-white text-center"><a href=""> Free Shipping </a></p>--}}
                     {{--     </div></div></div>--}}
                     {{--     `);--}}
                     //        });
</script>
@endsection

