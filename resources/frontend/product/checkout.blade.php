{{--@if($ThemeSettings('option-project-type','ecommerce'))--}}
    @extends('frontend.layouts.master')
@section('content')

    <!-- BANNER SECTION BEGIN -->


{{--@dd(session('cart'))--}}
    <!-- SECOND HEADER SECTION BEGIN -->
    <style>
        .method-selector [type="radio"]:checked, .method-selector [type="radio"]:not(:checked) {
            position: absolute;
            left: 0;
            z-index: 999;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
        }
        #payment{
            display: none
        }
        .paynow{
            background-color: #f89321;
            border: none;
        }
        .paynow:hover{
            background-color: black;
        }
        .header-tabs .img-fluid {
            max-width: 85%;
            height: auto;
        }
    </style>
{{--    <section class="header-tabs">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4 col-sm-12 col-12">--}}
{{--                    <a href="{{ url('/') }}"><img--}}
{{--                                src="{{ asset('frontend/ecommerce/images/logo.jpg') }}" align="image"--}}
{{--                                class="img-fluid"></a>                </div>--}}
{{--                <div class="col-md-8 col-sm-12 col-12">--}}
{{--                    <ul class="nav nav-tabs" role="tablist">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Shopping Cart</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><i class="fa fa-cc-amex" aria-hidden="true"></i> Payment Info</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"><i class="fa fa-list-alt" aria-hidden="true"></i> Order Completed</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- SECOND HEADER SECTION END -->
    <!-- INFORMATION SECTION BEGIN -->
{{--    <section class="product-slider-sec">--}}
{{--        <div class="container_main">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-9 col-sm-12 col-12">--}}
    <section class="info-sec-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row mt-4">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="apparel-heading">
                                        <h5 class="fs-4">GotApparel Safe, and Secure Shopping Cart <i class="fa fa-lock" aria-hidden="true"></i></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="address-box-text">
                                <p>We ship orders only to a physical address <span>(no P.O Boxes). P.O Boxes</span> or <span>APO/FPO</span> can be used as the credit card billing address.</p>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-12">
                                    <div class="account-info-box">
                                        <h4><span>1</span> Account Information</h4>
                                    </div>
                                    <div class="sign-in-heading">
                                        <div class="sign-in-content">
                                            <hr class="fs-4">Sign in</h5>
                                        </div>
                                        <div class="collapse-content">
                                            <a class="text-hover" href="javascriptvoid:(0)">Collapse</a>
                                        </div>
                                    </div>
                                    <div class="forms-fields">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="box-fields">
                                                <input type="email" name="email" class="form-control shadow-none" placeholder="Your Email Address">
                                            </div>
                                            <div class="box-fields">
                                                <input type="password" name="password" class="form-control shadow-none" placeholder="Your Password" id="id_password">
                                                <span><i class="far fa-eye" id="togglePassword"></i></span>
                                            </div>
                                            <div class="flex-form-btn">

                                                <div class="login-form-btn" >
                                                    <a class="text-white">LOGIN</a>
                                                </div>

                                                <div class="create-form-btn">
                                                    <a href="{{url('register')}}">CREATE MY ACCOUNT</a>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="continue-guest">
                                        <h6>OR-Continue as Guest</h6>
                                    </div>
                                    <form  action="{{url('order-complete')}}"  enctype="multipart/form-data"
                                           method="post"
                                           class="require-validation"
                                           data-cc-on-file="false"
                                           data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                           id="payment-form">
                                        @csrf
                                    <div class="guest-email">
                                        <input type="email" value="{{auth()->user()->email ?? ''}}" name="guest_email" class="form-control shadow-none" placeholder="Your Email Address" required>
                                    </div>
                                    <div class="checkbox-content">
                                        <p><input type="checkbox" value="agree" name="terms_condition">  I agree to <span>Mohrim</span><a class="text-hover" href="javascriptvoid:(0)">Terms of Services</a> and <a  class="text-hover" href="{{url('page/privacy-policy')}}">Privacy Policy</a>.</p>
                                    </div>
                                    <div class="account-info-box">
                                        <h4><span>2</span> Shipping Information</h4>
                                    </div>

                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>First Name <span>*</span></label>
                                                <input type="text" name="shipping_first_name" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Last Name <span>*</span></label>
                                                <input type="text"  name="shipping_last_name" class="form-control shadow-none">
                                            </div>
                                        </div>

                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex form-flex-grey">
                                                <label>Country <span>*</span></label>
                                                <select class="form-control shadow-none" name="shipping_country">
                                                    <option>Pakistan</option>
                                                    <option>US</option>
                                                    <option>Canada</option>
                                                    <option>UK</option>
                                                    <option>Germany</option>
                                                </select>
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Zip Code <span>*</span></label>
                                                <input name="shipping_zip_code" type="text" class="form-control shadow-none">
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>Street Address <span>*</span></label>
                                                <input type="text" name="shipping_street_address" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Apartment, Suite, unit, Floor etc <span>*</span></label>
                                                <input type="text" name="shipping_apartment_detail" class="form-control shadow-none" >
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>City <span>*</span></label>
                                                <input type="text" name="shipping_city" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex form-flex-grey">
                                                <label>State <span>*</span> </label>
                                                <select name="shipping_state" class="form-control shadow-none">
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>Phone <span>*</span></label>
                                                <input name="shipping_phone"  type="text" class="form-control shadow-none">
                                            </div>
                                        </div>

                                    <div class="account-info-box">
                                        <h4><span>3</span> Select Shipping Method</h4>
                                    </div>
                                    <div class="reward-text-box">
                                        <h6>Place your order by 1PM PST to get it by estimated days below.</h6>
                                    </div>
                                    <div class="method-selector">
                                        <h6>Standard</h6>
                                            <p class="position-relative">
                                                <input type="radio" id="test1" name="radio-group">
                                                <label for="test1"><span>$12.96</span> <span>Estimated Delivery</span><span>3-7 Business Days</span></label>
                                            </p>
                                    </div>
                                    <div class="account-info-box">
                                        <h4><span>4</span> Billing Information</h4>
                                    </div>

                                    <div class="billing-form-box">
                                        <ul>
                                            <li><input type="radio" value="default"  name="shipping_type"> Same as Shipping Address</li>
                                            <li><input type="radio" value="shipping"  name="shipping_type"> Use different Billing Address</li>

                                            <li class="mt-3">For different Billing/Shipping Address orders OR large orders, please click on the <a href="{{url('page/privacy-policy')}}">Link</a> to check our policy.</li>
                                        </ul>
                                    </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>First Name <span>*</span></label>
                                                <input type="text" name="billing_first_name" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Last Name <span>*</span></label>
                                                <input type="text"  name="billing_last_name" class="form-control shadow-none">
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex form-flex-grey">
                                                <label>Country <span>*</span></label>
                                                <select class="form-control shadow-none" name="billing_country">
                                                    <option>Pakistan</option>
                                                    <option>US</option>
                                                    <option>Canada</option>
                                                    <option>UK</option>
                                                    <option>Germany</option>
                                                </select>
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Zip Code <span>*</span></label>
                                                <input name="billing_zip_code" type="text" class="form-control shadow-none">
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>Street Address <span>*</span></label>
                                                <input type="text" name="billing_street_address" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex">
                                                <label>Apartment, Suite, unit, Floor etc <span>*</span></label>
                                                <input type="text" name="billing_apartment_detail" class="form-control shadow-none" >
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>City <span>*</span></label>
                                                <input type="text" name="billing_city" class="form-control shadow-none">
                                            </div>
                                            <div class="form-label-flex form-flex-grey">
                                                <label>State <span>*</span> </label>
                                                <select name="billing_state" class="form-control shadow-none">
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                    <option>Alabama</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-boxes-flex">
                                            <div class="form-label-flex">
                                                <label>Phone <span>*</span></label>
                                                <input name="billing_phone"  type="text" class="form-control shadow-none">
                                            </div>
                                        </div>




                                    <div class="account-info-box">
                                        <h4><span>5</span> Your Payment Information</h4>
                                    </div>
                                    <div class="method-selector payment-selector row w-100 mx-auto">

                                            <p class="position-relative col-6 m-0">
                                                <input type="radio" id="stripe" name="radio-group" value="stripe">
                                                <label for="test4"><span>Credit Card</span> <span class="mt-2"><img src="{{asset('frontend/ecommerce/images/creditcard1.png')}}" alt="image" class="img-fluid"></span></label>
                                            </p>

                                            <p class="position-relative col-6 m-0">
                                                <input type="radio" checked id="paypal" name="radio-group" value="paypal">
                                                <label for="test3"><span>PayPal</span> <span><img src="{{asset('frontend/ecommerce/images/paypal.png')}}" alt="image" class="img-fluid"></span></label>
                                            </p>

                                    </div>
                                        <div id="payment">
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <label class='control-label'>Name on Card</label> <input
                                                        class='form-control shadow-none' size='4' type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <label class='control-label'>Card Number</label> <input
                                                        autocomplete='off' class='form-control shadow-none card-number' size='20'
                                                        type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                                class='form-control shadow-none card-cvc' placeholder='ex. 311' size='4'
                                                                                                type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Month</label> <input
                                                        class='form-control shadow-none card-expiry-month' placeholder='MM' size='2'
                                                        type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Expiration Year</label> <input
                                                        class='form-control shadow-none card-expiry-year' placeholder='YYYY' size='4'
                                                        type='text'>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12">
                                    <div class="small-table">

                                        <h5 class="fs-4" style="font-weight: 400;">
                                        Your Cart:{{count(session('cart'))}} {{count(session('cart')) <= 1 ? 'item' : 'Items' }}</h5>

                                        @php $total = 0 @endphp
                                        @if(session('cart'))
                                            @foreach(session('cart') as $id => $details)
                                                @php $total += $details['discount_price'] * $details['quantity']@endphp
                                        <div class="small-tab-flex">
                                            <div class="small-tab-img">
                                                <img src="{{asset('images/media/'.$details['image'])}}" style="height:60px;width:100px;" alt="image" class="img-fluid">
                                            </div>
                                            <div class="small-tab-content">
                                                <h6>{{$details['name']}}</h6>
                                                @php
                                                    if($details['is_variant'] != null)
            {


              $product_variant = DB::table('product_variants')->where('id',$details['varient_id'])->select('variant_options')->get()->first();
         foreach (json_decode($product_variant->variant_options,true) as $key => $value)
                   {
                       $product_values = current((array)$value);
                       $ffff = DB::table('variations')->where('id',key((array)$value))->select('attribute_name')->get()->first();

                         $variations[] = [$ffff->attribute_name=>$product_values];
                     }
            }
        else
            {
                $product_pivot = DB::table('productpivots')->where('id',$details['varient_id'])->select('id','stock','compare_price','discounted_price')->get()->first();
            }
                                                @endphp
                                                    @if($details['is_variant'] != null)
                                                    @foreach($variations as $key=>$value)
                                                        <div class="d-flex">
                                                    <span><b>{{ucfirst(key((array)$value))}}</b></span>  :  <span>{{current((array)$value)}}</span>
                                                        </div>
                                                    <?php
                                                    $variations= []
                                                    ?>
                                                    @endforeach
                                                    @endif

                                            </div>
                                        </div>
                                        <div class="small-tab-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        @php
                                                                 $grand = $details['discount_price'] * $details['quantity'];
                                                         @endphp
                                                       <input type="hidden" value="{{$grand}}" name="grand"> </input>
                                                        <td>{{$currency_symbol}}{{ $details['discount_price'] }}</td>
                                                        <td>{{ $details['quantity'] }}</td>
                                                        <td class="org-cg">{{$currency_symbol}}{{ $details['discount_price'] * $details['quantity'] }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                            @endforeach
                                        @endif


                                    </div>
                                    <div class="main-coupon-form">
                                        <div class="coupon-form-input">
                                            <input type="text" id="discount_code" name="discount_code" class="form-control shadow-none" placeholder="Enter your promo code">
                                            <span class="discount-result warning" style="display:hide;"></span>
                                        </div>
                                        <div class="coupon-form-btn">
                                             <button class="discount">
{{--                                                <span class="ajax_load">--}}
{{--                                               </span>--}}
                                                APPLY
                                            </button>
                                        </div>
                                    </div>
                                    <div class="cou-po-link">
                                        <a class="text-hover" href="javascriptvoid:(0)">Coupon Policy</a>
                                    </div>
                                    <div class="calculation-table">
                                        <h6>Order Summary</h6>
                                        <ul>
                                            @php
                                                   $discount_percent = session('discount')['discounted_price'] ?? 0 ;
                                                    $pre_total = $shipemt_charges + $sub_total + $sales_tax;

                                                    $order_total = $pre_total / 100 * (int)$discount_percent;

                                            @endphp
                                            <input type="hidden" name="currency_symbol" value="{{$currency_symbol}}">
                                            <input type="hidden" name="shipment_charges" value="{{$shipemt_charges}}">
                                            <input type="hidden" name="coupon_discount" value="{{$discount_percent}}">
                                            <input type="hidden" name="pre_total" value="{{$sub_total}}">
                                            <input type="hidden" name="order_total" value="{{$pre_total - $order_total}}">
                                            <li><strong>Sub Total:</strong> <span class="pull-right pr-orange"><strong>{{$currency_symbol}}.{{$sub_total}}</strong></span></li>
                                            <li>Standard Shipping: <span class="pull-right">{{$currency_symbol}}.{{$shipemt_charges}}</span></li>
                                            <li>Sales Tax: <span class="pull-right">{{$currency_symbol}}.{{$sales_tax}}</span></li>
                                            <li>Coupon Discount: <span class="pull-right">{{$currency_symbol}}.{{$discount_percent }}%</span></li>
                                            <li><strong>Order Total:</strong> <span class="pull-right pr-orange">   <strong>{{$currency_symbol}}.{{$pre_total - $order_total ?? 0}}</strong></span></li>
                                        </ul>
                                    </div>
                                    <div class="important-note">
                                        <p><strong>Important Note:</strong> If you are having difficulty placing your order, please call 866-847-8678. We will be happy to assist you in the order process.</p>
                                    </div>
                                    <div class="secure-img-pol">
                                        <img src="{{asset('frontend/ecommerce/images/secure-img.png')}}" alt="image" class="img-fluid">
                                    </div>
                                    <div class="quality-order-detail">
                                        <hr class="fs-4">SECURITY-PRIVACY-QUALITY</h5>
                                        <h6>100% SATISFACTION GUARANTEED</h6>
                                    </div>
                                    <div class="your-order-privacy">
                                        <h6>YOUR PRIVACY</h6>
                                        <p>Fjackets.com respects the privacy of its valued customers. For more details please read our privacy policy.</p>
                                    </div>
                                    <div class="your-order-privacy">
                                        <h6>CREDIT CARD SECURITY</h6>
                                        <p>All personal information you submit is encrypted using Secure Socket Layer (SSL) protection. Other payment methods also available.</p>
                                        <a href="javascriptvoid:(0)"><img src="{{asset('frontend/ecommerce/images/paypal-img.png')}}" alt="image" class="img-fluid"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <input type="hidden" name="grand" value="{{$pre_total - $order_total ?? 0}}">
                                    <button type="submit" class="btn btn-primary w-100 paynow">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


{{--        hidden fields data--}}
{{--        <input type="hidden" name="grand" value="{{$total}}">--}}
{{--        <button type="submit"> click</button>--}}

    </form>
    </section>
    <!-- INFORMATION SECTION END -->
    <!-- QUICK LINKS SECTION BEGIN -->
    <section class="quick-links-new">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="new-links">
                        <ul>
                            <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                            <li><a href="{{url('page/returns-exchanges')}}">Returns</a></li>
                            <li><a href="{{url('page/shipping-delivery')}}">Shipping</a></li>
                            <li><a href="{{url('page/faqs')}}">FAQ's</a></li>
                            <li><a href="{{url('page/privacy-policy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });

        jQuery(document).ready(function() {
            $("#payment").css("display", "none");
            jQuery('input[type=radio]').on('change', function() {
            // Make an Ajax request to the server

            options = $('input[name="radio-group"]:checked').val();
        //     var urlpayment;
            if(options == "stripe")
            {
                // urlpayment = 'get-stripe';

                $("#payment").css("display", "block");
            }
            else
            {
                // urlpayment = 'get-paypal'
                // $("#payment").remove();
                $("#payment").css("display", "none");
            }
        //     console.log(urlpayment);
        //
        //     $.ajax({
        //         url: urlpayment,
        //         type: 'GET',
        //         data: {
        //             option: options
        //         },
        //         success: function(response) {
        //             // Process the response data
        //         }
        //     });
        // });
        });

        $(function() {

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if(options == "paypal"){
                    $form.get(0).submit();
                }else{
                    if (!$form.data('cc-on-file')) {
                        e.preventDefault();
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                        }, stripeResponseHandler);
                    }
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    setTimeout(function (){

                        // Something you want delayed.
                        $form.get(0).submit();
                    }, 2000);

                }
            }

        });
        });
    </script>
    <!-- QUICK LINKS SECTION END -->
    <!-- PRODUCT SLIDER SECTION END -->
    <!-- PRODUCT SHIPPING SECTION BEGIN -->

    <!-- PRODUCT SHIPPING SECTION END -->
    <!-- PRODUCT REVIEWS SECTION BEGIN -->

    <!-- YOU MAY LIKE SECTION BEGIN -->

    <!-- YOU MAY LIKE SECTION END -->
    <!-- MOHRIM DIFFERENCE SECTION BEGIN -->

    <script>
        $(".discount").click(function(e) {
            e.preventDefault();

            var ele = $(this);


            // if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{url('coupon_discount')}}',
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                     data : $('#discount_code').val(),

                },
                dataType: "json",

                success: function (response) {
                    let cl;
                    console.log(response.msg);
                    if(response.success){
                         cl = 'success';
                    }else{
                         cl = 'warning';
                    }
                    $('.discount-result').addClass(cl).text(response.msg).show();
                    // window.location.reload();

                }
            });
            // }
        });
    </script>
    <!-- SUBSCRIBE SECTION END -->
@endsection
{{--@endif--}}
