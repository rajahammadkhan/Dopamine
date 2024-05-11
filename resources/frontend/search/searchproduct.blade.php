@extends('frontend.layouts.master')
@section('title')
    Search Product Result - ONTHE VOUCH
@endsection
@section('description')
    {{--Meta Description here --}}
@endsection
@section('keywords')
    {{--   Meta Keywords here --}}
@endsection
@section('content')
    <div class="container sec-2">
        <div class="row my-4">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row  w-100 mx-auto under p-3">
{{--                    {{$Snippet('advanced-filter')}}--}}
                    <div class="col-12 my-3">
                        <p class="text-uppercase mb-0 fs-3 text-purp fw-sm-bold">
                            Search Result For : {{$_GET['search']}}
                        </p>
                    </div>

                    <div class="col-12 my-3">
                        <div class="row aj-data">
                                @foreach($productSearch as $product)
                                       @if($product !=null)
                                        <div class="col-md-3 col-sm-6 col-6 padd-rgt my-2 parawf">
                                            <div class="light-border d-flex align-items-center justify-content-between flex-column h-100">
                                                <div class="h-100 d-flex align-items-center justify-content-between flex-column w-100">

                                                    <div id="featured_img" class="w-100">
                                                        <img src="{{asset('images/media'.'/'.$product->image)}}" class="w-100" height="200px">
                                                    </div>
                                                    <h4 class="jacket-heading heading-truncate">
                                                        <p class="fs-6 text-dark">
                                                            {{$product->title}}
                                                        </p>
                                                    </h4>
                                                    <div class="stars-icon">
                                                        <ul>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                                            <li class="number-spacing text-muted list-unstyled">992</li>
                                                        </ul>
                                                    </div>
                                                    <p class="amount-text"><span><small class="text-uppercase">{{$product->currency_symbol}}</small>{{$product->discounted_price}}</span>
                                                        <small></small>
                                                        <span class="cut-price text-uppercase">{{$product->currency_symbol}} {{$product->compare_price}}</span>
                                                    </p>
                                                </div>
                                                <div class="w-100 d-flex align-items-center justify-content-between flex-column">

                                                    <h6 class="promo-text w-100">35% OFF-Save $40.00</h6>
                                                    <p class="free-shipping-text promo-text bg-white text-center">Free Shipping</p>
                                                </div>
                                            </div>
                                        </div>
                                @else
                                    <div class="col-lg-12 col-md-6 col-sm-12 p-5">
                                        <h3 class="text-center">
                                            No Product Found
                                        </h3>
                                    </div>
                                @endif
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
