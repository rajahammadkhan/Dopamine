@extends('frontend.layouts.master')
@section('content')
    <style>
        /* Rating Star Widgets Style */
        .rating-stars ul {
            list-style-type: none;
            padding: 0;

            -moz-user-select: none;
            -webkit-user-select: none;
        }

        .rating-stars ul > li.star {
            display: inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul > li.star > i.fa {
            font-size: 2.5em;
            /* Change the size of the stars */
            color: #ccc;
            /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul > li.star.hover > i.fa {
            color: #FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul > li.star.selected > i.fa {
            color: #FF912C;
        }

        .slider-for .slick-slide {
            height: 300px !important;
        }

        .slider-nav .slick-slide {
            height: 80px !important;
        }

        .slick-slide img {
            height: 100%;
            margin: auto;
            object-fit: contain;
        }

        .slick-next:before,
        .slick-prev:before {
            font-size: 30px !important;
            color: #f89321 !important;
        }

        .slick-next {
            right: 0 !important;
        }

        .slick-prev {
            left: 0 !important;
        }

        .attribute:disabled + span, .attribute[disabled] + span {
            background-color: orange;
        }

        /*.slick-current {*/
        /*    border: 1px solid #f89321;*/
        /*}*/

        .attribute:disabled + span, .attribute[disabled] + span {
            background-color: #ccc !important;
            position: relative;
        }

        .attribute:disabled + span:after, .attribute[disabled] + span:after {
            content: '';
            position: absolute;
            top: -5px;
            left: 0;
            background: black;
            width: 1px;
            height: 74px;
            transform: rotate(45deg) translate(12px, -29px);
        }

        .slides video {
            height: 100%;
            width: 100%;
        }

        .slider-nav video::-webkit-media-controls {
            display: none;
        }

        button.slick-prev.slick-arrow {
            z-index: 99999999999999;
        }

    </style>
    <!-- BANNER SECTION BEGIN -->

    @include('frontend/layouts/error')

    <section class="product-slider-sec">
        <div class="container_main">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-12">
                    <div class="main">
                        <div class="slider slider-for">
                            @foreach ($images as $image)
                                <div class="slides">
                                    <img src="{{ asset('images/media/' . $image->image) }}" alt="{{ $image->imag }}"
                                         class="img-fluid" data-product-image>
                                </div>

                            @endforeach
                            @if($product->video != null)
                                <div class="slides">
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset('media/videos/'.$product->video) }}" type="video/mp4">
                                    </video>
                                </div>
                            @endif
                        </div>
                        <div class="slider slider-nav">
                            @foreach ($images as $image)
                                <div class="slides">
                                    <img src="{{ asset('images/media/' . $image->image) }}" alt="{{ $image->imag }}"
                                         class="img-fluid">
                                </div>
                            @endforeach
                            @if($product->video != null)
                                <div class="slides">
                                    <video width="320" height="240" muted controls="false">
                                        <source src="{{ asset('media/videos/'.$product->video) }}" type="video/mp4">
                                    </video>
                                </div>
                            @endif
                        </div>
                    </div>

                    <script>
                        $('.slider-for').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            fade: true,
                            infinite: true,
                            asNavFor: '.slider-nav'
                        });
                        $('.slider-nav').slick({
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            asNavFor: '.slider-for',
                            // dots: true,
                            infinite: true,
                            focusOnSelect: true
                        });

                        // $('a[data-slide]').click(function(e) {
                        //     e.preventDefault();
                        //     var slideno = $(this).data('slide');
                        //     $('.slider-nav').slick('slickGoTo', slideno - 1);
                        // });
                    </script>


                    {{--                    <div class="product-slider"> --}}
                    {{--                        <div class="holder"> --}}
                    {{--                            @foreach ($images as $image) --}}
                    {{--                                <div class="slides"> --}}
                    {{--                                <img src="{{asset('images/media/'.$image->image)}}" alt="{{$image->imag}}" class="img-fluid"> --}}
                    {{--                                </div> --}}
                    {{--                            @endforeach --}}



                    {{--                        </div> --}}
                    {{--                        <div class="prevContainer"><a class="prev" onclick="plusSlides(-1)"> --}}
                    {{--                                <svg viewBox="0 0 24 24"> --}}
                    {{--                                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path> --}}
                    {{--                                </svg> --}}
                    {{--                            </a></div> --}}
                    {{--                        <div class="nextContainer"><a class="next" onclick="plusSlides(1)"> --}}
                    {{--                                <svg viewBox="0 0 24 24"> --}}
                    {{--                                    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path> --}}
                    {{--                                </svg> --}}
                    {{--                            </a></div> --}}

                    {{--                    </div> --}}
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="product-heading-content">
                        <h4>{{ $product->title }}</h4>
                        <div class="stars-flex">
                            <div class="stars-div d-flex">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <div class="stars-content">
                                <ul>
                                    <li>{{$product_reviews}} ratings</li>
                                    <li>|</li>
                                    <li>{{$question_answers}} answered questions</li>
                                </ul>
                            </div>
                        </div>
                        {{--                        @dd($pivot);--}}
                        <div class="price-content">
                            <h6><h6> {{ $currency_symbol->currency_symbol }}</h6><h6
                                        data-product-price>{{ $pivot->discounted_price }}</h6> &nbsp;
                                {{--                                <span data-product-price>{{ $pivot->discounted_price }}</span>--}}
                                <span> {{ $currency_symbol->currency_symbol}}</span><span
                                        data-product-compare-price> {{ $pivot->compare_price }} </span></h6>
                        </div>
                        <div class="returns-flex">
                            <div class="free-returns">
                                <h6><span>&</span> FREE Returns</h6>
                                <p>35% OFF-Save $40.00</p>
                            </div>
                            <div class="special-text">
                                <span>Thursday Special</span>
                                <p>sale ends tonight at 11:59pm</p>
                            </div>
                        </div>
                        @if($relatedProduct !=  null)
                            @foreach($relatedProduct as $color)
                                <a class="related-attribute" data-toggle="tooltip" data-placement="bottom"
                                   title="{{$color->option_name}}" style="background: {{$color->option_name}}"
                                   href="{{url('single-product/'.$color->slug)}}"
                                   class="buy w-100"></a>
                            @endforeach
                        @else
                        @endif
                        <form id="cart" action="{{ url('add-to-cart',$product->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            {{--                            <div class="colors-accordian">--}}
                            {{--                                <div id="main">--}}
                            {{--                                    <div class="accordion" id="faq">--}}
                            <?php
                            if(isset($variant_array)){
                            $i = 0;
                            foreach($variant_array as $key => $var){
                            $attr = ($attributes[$i]['id'] == $key) ? $attributes[$i]['attribute_name'] : '';

                            ?>
                            {{--                                        <div class="card">--}}
                            {{--                                            <div class="card-header" id="faqhead-{{ $i }}">--}}
                            {{--                                                <a href="#" class="btn btn-header-link" data-toggle="collapse"--}}
                            {{--                                                   data-target="#faq-{{ $i }}" aria-expanded="true"--}}
                            {{--                                                   aria-controls="faq1">{{ strtoupper($attr) }} :<span--}}
                            {{--                                                            class="col-pro"></span></a>--}}
                            {{--                                            </div>--}}
                            {{--                                            <div id="faq-{{ $i }}" class="collapse"--}}
                            {{--                                                 aria-labelledby="-{{ $i }}"--}}
                            {{--                                                 data-parent="#faq-{{ $i }}">--}}
                            {{--                                                <div class="card-body">--}}
                            <div class="img-selection" data-option="{{$i}}">
                                <?php
                                foreach(array_unique($var) as $att):
                                ?>
                                <label>
                                    <input class="attribute" id="key{{$key}}"
                                           type="radio" name="{{ $key }}"
                                           value="{{$att}}" data-option-selector
                                    />
                                    <span>{{ strtoupper($att) }}</span>
                                </label>
                                <?php
                                endforeach;
                                ?>
                            </div>

                            <select name="" id="">
                                <option selected hidden value="">Select Options</option>
                                <?php
                                foreach(array_unique($var) as $att):
                                ?>
                                <option id="key{{$key}}" value="{{$att}}"
                                        name="{{ $key }}">{{ strtoupper($att) }}</option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            <?php
                            $i++;}
                            }
                            ?>
                            <script>
                                $(document).ready(function () {
                                    {{--$(document).on('click', '[data-option-selector]', function (e) {--}}
                                    {{--    var val = e.target.value;--}}
                                    {{--    types = [];--}}
                                    {{--    $(".attribute:checked").each(function () {--}}
                                    {{--        types.push($(this).val());--}}
                                    {{--    });--}}
                                    {{--    console.log(types);--}}
                                    {{--    var id = {{$product->id}};--}}
                                    {{--    if($(e.target).data("option") == "gender"){--}}
                                    {{--        $("[data-option=colour]").prop('checked', false);--}}
                                    {{--        $("[data-option=sizes]").prop('checked', false);--}}
                                    {{--        $(".attribute").removeAttr('disabled');--}}
                                    {{--    $.ajax({--}}
                                    {{--        type: 'POST',--}}
                                    {{--        url: "{{ url('vars-attribute') }}",--}}
                                    {{--        data: {--}}
                                    {{--            "_token": "{{ csrf_token() }}",--}}
                                    {{--            id: id,--}}
                                    {{--            variation: types,--}}
                                    {{--        },--}}
                                    {{--    }).then(function (data) {--}}
                                    {{--        var check = [];--}}
                                    {{--        data.forEach(function(ele, index){--}}
                                    {{--            if(ele.find(ele => ele == val)){--}}
                                    {{--                check.push(ele);--}}
                                    {{--            }--}}
                                    {{--        });--}}
                                    {{--        console.log(check);--}}
                                    {{--            $('[data-option=colour]').each(function (ind, ele){--}}
                                    {{--                if(ele.value !== check[ind][1]){--}}
                                    {{--                    console.log($(ele).attr("disabled", true));--}}
                                    {{--                }--}}
                                    {{--            });--}}
                                    {{--        console.log(check);--}}
                                    {{--    });--}}
                                    {{--    }else if( $(e.target).data("option") == "colour"){--}}
                                    {{--        $.ajax({--}}
                                    {{--            type: 'POST',--}}
                                    {{--            url: "{{ url('vars-attribute') }}",--}}
                                    {{--            data: {--}}
                                    {{--                "_token": "{{ csrf_token() }}",--}}
                                    {{--                id: id,--}}
                                    {{--                variation: types,--}}
                                    {{--            },--}}
                                    {{--        }).then(function (data) {--}}
                                    {{--            var check = [];--}}
                                    {{--            data.forEach(function(ele, index){--}}
                                    {{--                if(ele.find(ele => ele == val)){--}}
                                    {{--                    check.push(ele);--}}
                                    {{--                }--}}
                                    {{--            });--}}
                                    {{--            console.log(check);--}}
                                    {{--            $('[data-option=sizes]').each(function (ind, ele){--}}
                                    {{--                console.log(ele);--}}
                                    {{--                if(ele.value !== check[ind][2]){--}}
                                    {{--                    console.log($(ele).attr("disabled", true));--}}
                                    {{--                }--}}
                                    {{--            });--}}
                                    {{--            console.log(check);--}}
                                    {{--        });--}}

                                    {{--}else{--}}
                                    {{--        console.log("Nothing");--}}
                                    {{--}--}}

                                    {{--});--}}
                                    {{-- function Product(){--}}
                                    {{--     this.selector = {--}}
                                    {{--         "productPrice": "[data-product-price]",--}}
                                    {{--         "productComparePrice": "[data-product-compare-price]",--}}
                                    {{--         "productImage": "[data-product-image]",--}}
                                    {{--         "productQuantity": "[data-product-quantity]",--}}
                                    {{--         "productQuantityInput": "[data-product-quantity-input]",--}}
                                    {{--         "productSingleVariant": "[data-option-selector]"--}}
                                    {{--     }--}}

                                    {{--     // console.log(document.querySelectorAll('[data-option-selector]'));--}}
                                    {{--     var singleOption = document.querySelectorAll('[data-option-selector]');--}}
                                    {{--     singleOption.forEach(function (option, ind) {--}}
                                    {{--         option.addEventListener('click', this.changddeVariant.bind(this));--}}
                                    {{--     }.bind(this));--}}
                                    {{-- }--}}
                                    {{-- Product.prototype = Object.assign({}, Product.prototype, {--}}
                                    {{--     changddeVariant : async function(e)  {--}}
                                    {{--         let val = e.target.value;--}}
                                    {{--         let activeVariation = this.getActiveVariation();--}}
                                    {{--         let id = {{$product->id}};--}}
                                    {{--         let variation = await this.fetchVariation(id, activeVariation);--}}
                                    {{--         // console.log(variation);--}}
                                    {{--         if($(e.target).data("option") == "gender" && variation.length > 0){--}}
                                    {{--             $("[data-option=colour]").prop('checked', false);--}}
                                    {{--             $("[data-option=sizes]").prop('checked', false);--}}
                                    {{--             $(".attribute").removeAttr('disabled');--}}
                                    {{--             Fetch available option--}}
                                    {{--             $('[data-option=colour]').each(function (ind, ele){--}}
                                    {{--                 // console.log(ele);--}}
                                    {{--                 if(ele.value !== variation[ind].color){--}}
                                    {{--                     $(ele).attr("disabled");--}}
                                    {{--                 }--}}
                                    {{--             });--}}

                                    {{--             let findindex = variation.filter((item)=> item.gender === val.toLowerCase());--}}

                                    {{--             this.changeImage(findindex[0].image);--}}
                                    {{--             this.changePrice(findindex[0].price, findindex[0].comparePrice);--}}
                                    {{--             this.changeQuantity(findindex[0].quantity);--}}
                                    {{--         }else if( $(e.target).data("option") == "colour" && variation.length > 0){--}}
                                    {{--             $('[data-option=size]').each(function (ind, ele){--}}
                                    {{--                 // console.log(ele);--}}
                                    {{--                 if(ele.value !== variation[ind].size){--}}
                                    {{--                     $(ele).attr("disabled");--}}
                                    {{--                 }--}}
                                    {{--             });--}}
                                    {{--             let findindex = variation.filter((item)=> item.color === val.toLowerCase());--}}
                                    {{--             console.log(findindex);--}}
                                    {{--             this.changeImage(findindex[0].image);--}}
                                    {{--             this.changePrice(findindex[0].price, findindex[0].comparePrice);--}}
                                    {{--             this.changeQuantity(findindex[0].quantity);--}}

                                    {{--         }else{--}}
                                    {{--             let findindex = variation.filter((item)=> item.size === val.toLowerCase());--}}
                                    {{--             console.log(findindex);--}}
                                    {{--             this.changeImage(findindex[0].image);--}}
                                    {{--             this.changePrice(findindex[0].price, findindex[0].comparePrice);--}}
                                    {{--             this.changeQuantity(findindex[0].quantity);--}}
                                    {{--             console.log("Nothing");--}}
                                    {{--         }--}}
                                    {{--     },--}}
                                    {{--     fetchVariation: (id, variation) => {--}}
                                    {{--         try{--}}
                                    {{--             let response = $.ajax({--}}
                                    {{--                 type: 'POST',--}}
                                    {{--                 url: "{{ url('vars-attribute') }}",--}}
                                    {{--                 data: {--}}
                                    {{--                     "_token": "{{ csrf_token() }}",--}}
                                    {{--                     id: id,--}}
                                    {{--                     variation: variation,--}}
                                    {{--                 },--}}
                                    {{--             });--}}
                                    {{--              // console.log(response);--}}
                                    {{--             return response;--}}

                                    {{--         }catch (e){--}}
                                    {{--             // console.log("error");--}}
                                    {{--             return [];--}}
                                    {{--         }--}}

                                    {{--     },--}}
                                    {{--     getActiveVariation: function (){--}}
                                    {{--          let values = [];--}}
                                    {{--          $("[data-option-selector]:checked").each(function (ind, ele) {--}}
                                    {{--              // console.log(ele);--}}
                                    {{--              values.push($(ele).val());--}}
                                    {{--          });--}}
                                    {{--          return values;--}}
                                    {{--     },--}}
                                    {{--     changeImage : function(val){--}}
                                    {{--         // console.log(this.selector);--}}
                                    {{--         let imageEle = document.querySelector(this.selector.productImage);--}}
                                    {{--         console.log(imageEle);--}}
                                    {{--         imageEle.src = `https://eliteblue.net/Clients/viys/coupon/public/images/media/${val}`;--}}
                                    {{--     },--}}
                                    {{--     changePrice : function(regularPrice, comparePrice) {--}}
                                    {{--         let priceEle = document.querySelector(this.selector.productPrice);--}}
                                    {{--         let comparePriceEle = document.querySelector(this.selector.productComparePrice);--}}
                                    {{--         // ${comparePrice}--}}
                                    {{--         priceEle.innerHTML = regularPrice;--}}
                                    {{--         comparePriceEle.innerHTML = comparePrice;--}}
                                    {{--     },--}}
                                    {{--     changeQuantity : function (val){--}}
                                    {{--         let quantityEle = document.querySelector(this.selector.productQuantity);--}}
                                    {{--         // let quantityInput = document.querySelector(this.selector.productQuantityInput);--}}
                                    {{--         quantityEle.innerHTML = `Only ${val} left in Stock - Order Soon.`;--}}
                                    {{--         // quantityInput.value = val;--}}
                                    {{--     }--}}
                                    {{-- });--}}

                                    {{--var ch =  new Product();--}}
                                    {{--console.log(ch);--}}
                                    {{-- $(document).on('click', '.attribute', function () { --}}

                                    {{--    var id = @php $product->id; @endphp --}}
                                    {{--    $.ajax({ --}}
                                    {{--        type: 'POST', --}}
                                    {{--        url: "{{url('vars-attribute')}}", --}}
                                    {{--        data: { --}}
                                    {{--            "_token": "{{ csrf_token() }}", --}}
                                    {{--            id: id, --}}
                                    {{--            data : $('.jcuiw').val(), --}}
                                    {{--        }, --}}
                                    {{--        dataType: "json", --}}
                                    {{--        // beforeSend: function () { --}}
                                    {{--        //     $(".ajaxpreload").show(); --}}
                                    {{--        // }, --}}

                                    {{--        success: function (data) { --}}

                                    {{--            console.log(data); --}}

                                    {{--        } --}}
                                    {{--    }); --}}

                                    {{-- }); --}}
                                });
                            </script>
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="description-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1"
                                           role="tab">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Size Chart</a>
                                    </li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="tab-box-content">
                                            <h5>{{ $product->title }}</h5>
                                            <p>{!! $product->long_description !!}</p>

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <div class="tab-box-content">
                                            <h5>{{ $product->title }}</h5>

                                            <div class="row">
                                                @foreach ($images as $image)
                                                    <div class="col-md-4 my-2">
                                                        <img class="w-100"
                                                             style="object-fit:contain;border:1px solid black;"
                                                             src="{{ asset('images/media/' . $image->image) }}">

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                                        <div class="tab-box-content">
                                            <h5>{{ $product->title }}</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="side-box">
                        {{--                                                <div class="side-box-inner">--}}
                        {{--                                                    <h6>${{ $product->discounted_price }} <span>${{ $product->compare_price }} </span></h6>--}}
                        {{--                                                </div>--}}
                        <div class="side-box-inner d-flex">
                            <h6><h6> {{ $currency_symbol->currency_symbol }}</h6><h6
                                        data-product-price>{{ $pivot->discounted_price }}</h6> &nbsp;
                                <span> {{ $currency_symbol->currency_symbol}}</span><span
                                        data-product-compare-price> {{ $pivot->compare_price }} </span></h6>
                        </div>
                        <div class="side-box-ship">
                            <h6><span>&</span> FREE Returns</h6>
                        </div>
                        <div class="side-box-delivery">
                            <h6>FREE Delivery <span>Friday, June 10</span></h6>
                        </div>
                        <div class="fastest-del">
                            <p>Or fastest delivery <strong>Thursday, June 9</strong>. Order within 7 hrs 47 mins.</p>
                        </div>
                        <div class="marker-text">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> Deliver to New York 10005</p>
                        </div>
                        <div class="left-stock">
                            <p data-product-quantity>Only 2 left in Stock - Order Soon.</p>
                        </div>


                        <input type="hidden" value="{{$pivot->id }}" id="id" name="id">
                        <input type="hidden" value="{{ $product->id }}" id="product_id" name="product_id">

                        <div class="side-box-qty">
                            <input type="number" placeholder="Enter Your Quantity" value="1" required id="quantity"
                                   name="quantity"
                                   class="form-control" data-product-quantity-input>
                            {{--                            <select id="quantity" name="quantity" class="form-control">--}}
                            {{--                                <option value="1">Qty 1</option>--}}
                            {{--                                <option value="2">Qty 2</option>--}}
                            {{--                                <option value="3">Qty 3</option>--}}
                            {{--                            </select>--}}
                        </div>
                        <div class="buy-cart text-center">


                            <button type="submit" onclick="custom_ajax('#cart','.result',event);"
                                    class="buy my-1 submit-btn w-100 border-0">
                                <span class="ajax_load">

                                </span>
                                Add to cart
                            </button>
                            {{--                            <button type="button" onclick="getdata()">add cart</button>--}}


                            <a href="javascriptvoid:(0)" class="buy w-100">Buy Now</a>
                        </div>
                        </form>
                        <div class="secure-trans">
                            <p><i class="fa fa-lock" aria-hidden="true"></i> Secure Transaction</p>
                        </div>
                        <div class="detail-box details">
                            <h6 class="fs-7">Details</h6>
                            <p><span><a href="{{url('page/returns-exchanges')}}">Return Policy:</a></span> Eligible for
                                Return, Refund or Replacement within 30 days of
                                receipt.</p>
                            <a href="javascriptvoid:(0)">Add to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- PRODUCT SLIDER SECTION END -->
    <!-- PRODUCT SHIPPING SECTION BEGIN -->
    <section class="product-shipping-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="shipping-ret-content">
                        <div class="ship-ret-icon">
                            <i class="fa fa-ship" aria-hidden="true"></i>
                        </div>
                        <div class="ship-ret-text">
                            <h4><b>Free Insured Shipping</b></h4>
                            <p>Complimentry Free Shipping with Insurance is included in every order.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="shipping-ret-content">
                        <div class="ship-ret-icon">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                        </div>
                        <div class="ship-ret-text">
                            <h4><b>Free Return</b></h4>
                            <p>30 Days Fast & Free Return and Exchanges.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="shipping-ret-content">
                        <div class="ship-ret-icon">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <div class="ship-ret-text">
                            <h4><b>Pay in 4</b></h4>
                            <p>Buy Now, Pay in 4 Monthly Installments. 0% Interest.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="shipping-ret-content">
                        <div class="ship-ret-icon">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                        <div class="ship-ret-text">
                            <h4><b>Happy to Help</b></h4>
                            <p>We are here to help, 24*7 online support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PRODUCT SHIPPING SECTION END -->
    <!-- PRODUCT REVIEWS SECTION BEGIN -->


    <section class="product-reviews-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    {{--                    @auth--}}
                    <div class="reviews-content-heading">
                        <h5>Product Reviews
                        </h5>
                        <div class="main-review-text mt-2">
                            <form action="{{ route('product_reviews.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id"
                                       value="{{ $product->id }}">
                                <div class="header">
                                    <div class="row">

                                        <div class="col-md-6 col-12 my-md-auto my-2">
                                            <div class="form-floating mb-3">
                                                <input type="text"
                                                       class="form-control form-control shadow-none"
                                                       id="name_field" name="name"
                                                       value="{{ old('name') }}" required
                                                       placeholder="Name">
                                                <label for="name_field">Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 my-md-auto my-2">
                                            <div class="form-floating mb-3">
                                                <input type="email"
                                                       class="form-control form-control shadow-none"
                                                       id="email_field" name="email"
                                                       value="{{ old('email') }}" required
                                                       placeholder="Email">
                                                <label for="email_field">Email</label>
                                            </div>
                                        </div>
                                        <div class=" col-12 mb-md-4 my-2">
                                            <div class="form-floating">
                                                                        <textarea
                                                                                class="form-control form-control shadow-none"
                                                                                placeholder="Leave a Comment here"
                                                                                name="comment" id="comment_area"
                                                                                style="height: 100px"
                                                                                required>{{ old('comment') }}</textarea>
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
                                                            <li class='star' title='Poor'
                                                                data-value='1'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='Fair'
                                                                data-value='2'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='Good'
                                                                data-value='3'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='Excellent'
                                                                data-value='4'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star' title='WOW!!!'
                                                                data-value='5'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <input class="rating" type="hidden"
                                                           name="rating" value="1">
                                                </section>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 my-md-auto text-end my-2 buy-cart">
                                            @auth
                                                <button
                                                        class="w-50  border-0 buy ms-auto">Submit
                                                </button>
                                            @endauth
                                            @guest
                                                <a href="{{url('login')}}" class="w-50 rounded-pill">
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
                    <div class="card-body">
                        @foreach ($reviews as $review)
                            <div class="main-review-text">
                                <div class="review-name-content">
                                    <div class="review-pic">
                                        @if(Auth::check())
                                            @if (auth()->user()->image != null)
                                                @php
                                                    $image = auth()
                                                        ->user()
                                                        ->where('id', $review->user_id)
                                                        ->first()->image;
                                                @endphp
                                            @else
                                                @php $image = 'avatar.png' @endphp
                                            @endif
                                            <img class="img-fluid"
                                                 src="{{ asset('images/profile' . '/' . $image) }}"
                                                 alt="{{ ' Dashboard' }}">
                                    </div>
                                    @endif
                                    <div class="review-name">
                                        <h6>{{ $review->name }}</h6>
                                    </div>
                                </div>
                                <div class="stars-txt-flx">
                                    <div class="txt-stars">
                                        @for ($x = 1; $x <= $review->rating; $x++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                        @for ($x = $review->rating; $x <= 4; $x++)
                                            <i class="fa fa-star text-muted" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="reviews-list-text">
                                    <ul>
                                        <li class="ver-col">Verified Purchase</li>
                                    </ul>
                                </div>
                                <p>
                                    {{ $review->comment }}
                                </p>
                            </div>
                        @endforeach

                        <div class="see-all">
                            <a href="javascriptvoid:(0)">See all reviews <i
                                        class="fa fa-angle-right"
                                        aria-hidden="true"></i></a>
                        </div>
                    </div>
                    {{--                        <div class="reviews-accordian">--}}
                    {{--                            <div id="main">--}}
                    {{--                                <div class="accordion" id="faq">--}}
                    {{--                                    <div class="card">--}}
                    {{--                                        <div id="faq1" class="collapse" aria-labelledby="faqhead1" data-parent="#faq">--}}
                    {{--                                            <div class="card-body">--}}
                    {{--                                                <div class="main-review-text">--}}
                    {{--                                                    <form action="{{ route('product_reviews.store') }}" method="POST">--}}
                    {{--                                                        @csrf--}}
                    {{--                                                        <input type="hidden" name="product_id"--}}
                    {{--                                                               value="{{ $product->id }}">--}}
                    {{--                                                        <div class="header">--}}
                    {{--                                                            <div class="row">--}}

                    {{--                                                                <div class="col-md-6 col-12 my-md-auto my-2">--}}
                    {{--                                                                    <div class="form-floating mb-3">--}}
                    {{--                                                                        <input type="text"--}}
                    {{--                                                                               class="form-control form-control shadow-none"--}}
                    {{--                                                                               id="name_field" name="name"--}}
                    {{--                                                                               value="{{ old('name') }}" required--}}
                    {{--                                                                               placeholder="Name">--}}
                    {{--                                                                        <label for="name_field">Name</label>--}}
                    {{--                                                                    </div>--}}
                    {{--                                                                </div>--}}
                    {{--                                                                <div class="col-md-6 col-12 my-md-auto my-2">--}}
                    {{--                                                                    <div class="form-floating mb-3">--}}
                    {{--                                                                        <input type="email"--}}
                    {{--                                                                               class="form-control form-control shadow-none"--}}
                    {{--                                                                               id="email_field" name="email"--}}
                    {{--                                                                               value="{{ old('email') }}" required--}}
                    {{--                                                                               placeholder="Email">--}}
                    {{--                                                                        <label for="email_field">Email</label>--}}
                    {{--                                                                    </div>--}}
                    {{--                                                                </div>--}}
                    {{--                                                                <div class=" col-12 mb-md-4 my-2">--}}
                    {{--                                                                    <div class="form-floating">--}}
                    {{--                                                                        <textarea--}}
                    {{--                                                                                class="form-control form-control shadow-none"--}}
                    {{--                                                                                placeholder="Leave a Comment here"--}}
                    {{--                                                                                name="comment" id="comment_area"--}}
                    {{--                                                                                style="height: 100px"--}}
                    {{--                                                                                required>{{ old('comment') }}</textarea>--}}
                    {{--                                                                        <label for="comment_area">Leave a Comment--}}
                    {{--                                                                            here</label>--}}
                    {{--                                                                    </div>--}}
                    {{--                                                                </div>--}}
                    {{--                                                                <div class="col-md-6 col-12 my-md-auto my-2 my-auto">--}}
                    {{--                                                                    <div class="form-line">--}}

                    {{--                                                                        <section class='rating-widget'>--}}

                    {{--                                                                            <!-- Rating Stars Box -->--}}
                    {{--                                                                            <div class='rating-stars text-left'>--}}
                    {{--                                                                                <ul id='stars'>--}}
                    {{--                                                                                    <li class='star' title='Poor'--}}
                    {{--                                                                                        data-value='1'>--}}
                    {{--                                                                                        <i class='fa fa-star fa-fw'></i>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li class='star' title='Fair'--}}
                    {{--                                                                                        data-value='2'>--}}
                    {{--                                                                                        <i class='fa fa-star fa-fw'></i>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li class='star' title='Good'--}}
                    {{--                                                                                        data-value='3'>--}}
                    {{--                                                                                        <i class='fa fa-star fa-fw'></i>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li class='star' title='Excellent'--}}
                    {{--                                                                                        data-value='4'>--}}
                    {{--                                                                                        <i class='fa fa-star fa-fw'></i>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                    <li class='star' title='WOW!!!'--}}
                    {{--                                                                                        data-value='5'>--}}
                    {{--                                                                                        <i class='fa fa-star fa-fw'></i>--}}
                    {{--                                                                                    </li>--}}
                    {{--                                                                                </ul>--}}
                    {{--                                                                            </div>--}}
                    {{--                                                                            <input class="rating" type="hidden"--}}
                    {{--                                                                                   name="rating" value="1">--}}
                    {{--                                                                        </section>--}}

                    {{--                                                                    </div>--}}
                    {{--                                                                </div>--}}
                    {{--                                                                <div class="col-md-6 col-12 my-md-auto my-2 buy-cart">--}}
                    {{--                                                                    <button--}}
                    {{--                                                                            class="w-100 border-0 buy">Submit--}}
                    {{--                                                                    </button>--}}
                    {{--                                                                </div>--}}
                    {{--                                                            </div>--}}
                    {{--                                                        </div>--}}
                    {{--                                                    </form>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    @endauth--}}
                    {{--                    @guest--}}
                    {{--                        <div class="reviews-content-heading">--}}
                    {{--                            <h5>Product Reviews--}}
                    {{--                                <a href="{{ url('login') }}" class="pull-right">WRITE A REVIEW</a>--}}
                    {{--                            </h5>--}}
                    {{--                        </div>--}}
                    {{--                    @endguest--}}

                    {{--                    <div class="reviews-accordian">--}}
                    {{--                        <div id="main">--}}
                    {{--                            <div class="accordion" id="faq">--}}
                    {{--                                <div class="card">--}}
                    {{--                                    <div class="card-header" id="faqhead1">--}}
                    {{--                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse"--}}
                    {{--                                           data-target="#faq2" aria-expanded="false" aria-controls="faq2"></a>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div id="faq2" class="collapse" aria-labelledby="faqhead1"--}}
                    {{--                                         data-parent="#faq">--}}
                    {{--                                        <div class="card-body">--}}
                    {{--                                                @foreach ($reviews as $review)--}}
                    {{--                                                @dd($review)--}}
                    {{--                                                <div class="main-review-text">--}}
                    {{--                                                    <div class="review-name-content">--}}
                    {{--                                                        <div class="review-pic">--}}
                    {{--                                                           @if(Auth::check())--}}
                    {{--                                                            @if (auth()->user()->image != null)--}}
                    {{--                                                                @php--}}
                    {{--                                                                    $image = auth()--}}
                    {{--                                                                        ->user()--}}
                    {{--                                                                        ->where('id', $review->user_id)--}}
                    {{--                                                                        ->first()->image;--}}
                    {{--                                                                @endphp--}}
                    {{--                                                            @else--}}
                    {{--                                                                @php $image = 'avatar.png' @endphp--}}
                    {{--                                                            @endif--}}
                    {{--                                                            <img class="img-fluid"--}}
                    {{--                                                                 src="{{ asset('images/profile' . '/' . $image) }}"--}}
                    {{--                                                                 alt="{{ ' Dashboard' }}">--}}
                    {{--                                                        </div>--}}
                    {{--                                                        @endif--}}
                    {{--                                                        <div class="review-name">--}}
                    {{--                                                            <h6>{{ $review->name }}</h6>--}}
                    {{--                                                        </div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="stars-txt-flx">--}}
                    {{--                                                        <div class="txt-stars">--}}
                    {{--                                                            @for ($x = 1; $x <= $review->rating; $x++)--}}
                    {{--                                                                <i class="fa fa-star" aria-hidden="true"></i>--}}
                    {{--                                                            @endfor--}}
                    {{--                                                            @for ($x = $review->rating; $x <= 4; $x++)--}}
                    {{--                                                                <i class="fa fa-star text-muted" aria-hidden="true"></i>--}}
                    {{--                                                            @endfor--}}
                    {{--                                                        </div>--}}
                    {{--                                                        --}}{{--                                                    <div class="head-stars"> --}}
                    {{--                                                        --}}{{--                                                        <h6>Excellent Jacket</h6> --}}
                    {{--                                                        --}}{{--                                                    </div> --}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="reviews-list-text">--}}
                    {{--                                                        <ul>--}}
                    {{--                                                            --}}{{--                                                        <li>Size: X-Large</li> --}}
                    {{--                                                            --}}{{--                                                        <li>|</li> --}}
                    {{--                                                            --}}{{--                                                        <li>Color: Brown</li> --}}
                    {{--                                                            --}}{{--                                                        <li>|</li> --}}
                    {{--                                                            <li class="ver-col">Verified Purchase</li>--}}
                    {{--                                                        </ul>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <p>--}}
                    {{--                                                        {{ $review->comment }}--}}
                    {{--                                                    </p>--}}
                    {{--                                                </div>--}}
                    {{--                                            @endforeach--}}

                    {{--                                            <div class="see-all">--}}
                    {{--                                                <a href="javascriptvoid:(0)">See all reviews <i--}}
                    {{--                                                            class="fa fa-angle-right"--}}
                    {{--                                                            aria-hidden="true"></i></a>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
            </div>
    </section>
    <section class="product-reviews-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    @auth
                        <div class="reviews-content-heading">
                            <h5>Customer questions & answers
                                <a href="#" class="pull-right" data-toggle="collapse" data-target="#faq0"
                                   aria-expanded="true" aria-controls="faq1">WRITE A QUESTION</a>
                            </h5>
                        </div>
                        <div class="reviews-accordian">
                            <div id="main">
                                <div class="accordion" id="faq3">
                                    <div class="card border-0" id="faqhead0">
                                        <div id="faq0" class="collapse" aria-labelledby="faqhead0" data-parent="#faq3">
                                            <div class="card-body">
                                                <div class="main-review-text">
                                                    <form action="{{ route('question.store') }}" method="POST">
                                                        @csrf
                                                        <div class="header">
                                                            <div class="row">
                                                                <div class="col-12 mb-md-4 my-2">
                                                                    <div class="form-floating mb-3">
                                                                        <textarea
                                                                                class="form-control form-control shadow-none"
                                                                                placeholder="Type your question here..."
                                                                                name="question" id="comment_area"
                                                                                style="height: 100px"
                                                                                required>{{ old('comment') }}</textarea>
                                                                        <label for="email_field">Type your question
                                                                            here</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-12 my-md-auto my-2 buy-cart ms-auto">
                                                                    <button
                                                                            class="w-50 border-0 buy ms-auto">Submit
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <div class="reviews-content-heading">
                            <h5>Customer questions & answers
                                <a href="{{ url('login') }}" class="pull-right">WRITE A QUESTION</a>
                            </h5>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </section>


    <!-- PRODUCT REVIEWS SECTION END -->
    <!-- YOU MAY LIKE SECTION BEGIN -->
    <section class="you-may-like-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <h2 class="like-heading">YOU MAY ALSO LIKE</h2>
                </div>
            </div>
            <div class="row">
                @foreach($productcategory as $value)
                    @if($value!=null)
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="jack-img">
                                <img src="{{asset('images/media'.'/'.$value->image)}}" alt="image" class="w-100"
                                     height="200px">
                            </div>
                            <div class="like-flex">
                                <div class="jack-cont">
                                    <h6 class="fs-6 heading-truncate"><span>{{$value->title}}</span></h6>
                                    {{--                            <h4 class="jacket-heading heading-truncate">{{$value->title}}</h4>--}}
                                </div>
                                <div class="jack-price">
                                    <p>
                                        <span>{{$value->currency_symbol}}{{$value->compare_price}}</span>{{$value->currency_symbol}}{{$value->discounted_price}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{--                <div class="col-md-3 col-sm-6 col-12">--}}
                {{--                    <div class="jack-img">--}}
                {{--                        <img src="{{ asset('images/home/2.jpg') }}" alt="image" class="img-fluid">--}}
                {{--                    </div>--}}
                {{--                    <div class="like-flex">--}}
                {{--                        <div class="jack-cont">--}}
                {{--                            <h6 class="fs-7">California Womens Black <span>Leather Moto Jacket</span></h6>--}}
                {{--                        </div>--}}
                {{--                        <div class="jack-price">--}}
                {{--                            <p><span>$299</span>$189</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-3 col-sm-6 col-12">--}}
                {{--                    <div class="jack-img">--}}
                {{--                        <img src="{{ asset('images/home/3.jpg') }}" alt="image" class="img-fluid">--}}
                {{--                    </div>--}}
                {{--                    <div class="like-flex">--}}
                {{--                        <div class="jack-cont">--}}
                {{--                            <h6 class="fs-7">California Womens Black <span>Leather Moto Jacket</span></h6>--}}
                {{--                        </div>--}}
                {{--                        <div class="jack-price">--}}
                {{--                            <p><span>$299</span>$189</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-3 col-sm-6 col-12">--}}
                {{--                    <div class="jack-img">--}}
                {{--                        <img src="{{ asset('images/home/4.jpg') }}" alt="image" class="img-fluid">--}}
                {{--                    </div>--}}
                {{--                    <div class="like-flex">--}}
                {{--                        <div class="jack-cont">--}}
                {{--                            <h6 class="fs-7">California Womens Black <span>Leather Moto Jacket</span></h6>--}}
                {{--                        </div>--}}
                {{--                        <div class="jack-price">--}}
                {{--                            <p><span>$299</span>$189</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-3 col-sm-6 col-12">--}}
                {{--                    <div class="jack-img">--}}
                {{--                        <img src="{{ asset('images/home/5.jpg') }}" alt="image" class="img-fluid">--}}
                {{--                    </div>--}}
                {{--                    <div class="like-flex">--}}
                {{--                        <div class="jack-cont">--}}
                {{--                            <h6 class="fs-7">California Womens Black <span>Leather Moto Jacket</span></h6>--}}
                {{--                        </div>--}}
                {{--                        <div class="jack-price">--}}
                {{--                            <p><span>$299</span>$189</p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- YOU MAY LIKE SECTION END -->
    <!-- MOHRIM DIFFERENCE SECTION BEGIN -->
    <section class="difference-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <h2 class="like-heading">THE MOHRIM DIFFERENCE</h2>
                </div>
            </div>
            <div class="row jc-row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-one">


                        <img src="{{ asset('frontend/ecommerce/images/jc1.webp') }}" alt="image" class="img-fluid">
                        <div class="jc-one-design"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-content">
                        <h4>Finest Raw Materials</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley
                            of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
            <div class="row jc1-row col-reverse">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-content">
                        <h4>Exquisite Craftsmanship</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley
                            of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-one">
                        <img src="{{ asset('frontend/ecommerce/images/jc2.webp') }}" alt="image" class="img-fluid">
                        <div class="jc-one-design"></div>
                    </div>
                </div>
            </div>
            <div class="row jc1-row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-one">
                        <img src="{{ asset('frontend/ecommerce/images/jc3.jpg') }}" alt="image" class="img-fluid">
                        <div class="jc-one-design"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-content">
                        <h4>Fair Pricing - Direct to You</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley
                            of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
            <div class="row jc1-row col-reverse">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-content">
                        <h4>Exquisite Sizes that Fit All</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley
                            of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-one">
                        <img src="{{ asset('frontend/ecommerce/images/jc4.jpg') }}" alt="image" class="img-fluid">
                        <div class="jc-one-design"></div>
                    </div>
                </div>
            </div>
            <div class="row jc1-row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-one">
                        <img src="{{ asset('frontend/ecommerce/images/jc5.jpg') }}" alt="image" class="img-fluid">
                        <div class="jc-one-design"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="jc-content">
                        <h4>Discovery & Expression</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley
                            of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="error">
    </div>
    <section class="subscribe-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="subscribe-bar">
                        <div class="subscribe-content">
                            <h6>Sign up for email</h6>
                        </div>
                        <div class="email-content">
                            <form id="mailForm" class="d-flex">
                                <input type="email" class="form-control" id="email" name="email" required
                                       placeholder="Enter your email address">
                                <div class="subscribe-btn">
                                    <button type="button" class="btn btn-primary submitt">SUBSCRIBE</button>
                                </div>
                            </form>
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
                                                                                         aria-hidden="true"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/" class="col4"><i class="fa fa-instagram"
                                                                                         aria-hidden="true"></i></a>
                                </li>
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
        // Run code
        setTimeout(function () {
            $('.slick-prev.slick-arrow').click(() => {
                $('.slides.slick-slide').find("video").trigger("pause");
            })
            $('.slick-next.slick-arrow').click(() => {
                $('.slides.slick-slide').find("video").trigger("pause");
            })
        }, 3000);

        {{-- var variations = '<?php echo json_encode($json_variation); ?>'; --}}
        {{-- console.log(JSON.stringify(variations)); --}}


        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function () {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function (e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function () {
            $(this).parent().children('li.star').each(function (e) {
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function () {
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            console.log(onStar)
            var stars = $(this).parent().children('li.star');
            console.log(stars)

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            $('.rating').val(ratingValue);
            // var msg = "";
            // if (ratingValue > 1) {
            //     msg = "Thanks! You rated this " + ratingValue + " stars.";
            // }
            // else {
            //     msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            // }
            // responseMessage(msg);

        });


        function responseMessage(msg) {
            $('.success-box').fadeIn(200);
            $('.success-box div.text-message').html("<span>" + msg + "</span>");
        }
    </script>
@endsection
<style>
    .buy {
        position: relative !important;
    }

    .buy .ajax_load {
        position: absolute;
        top: 0 !important;
        height: 100% !important;
    }

    .buy .ajax_load img {
        height: 100%;
    }

    a.related-attribute {
        height: 50px !important;
        display: inline-block;
        width: 50px;
        border-radius: 50px;
        border: 5px solid #dbd4d4;
    }
</style>