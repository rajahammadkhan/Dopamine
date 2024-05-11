<style>
    a.related{
        height: 50px !important;
        display: inline-block;
        width: 50px;
        border-radius: 50px;
        border: 5px solid #dbd4d4;
    }
</style>
@foreach($data  as $products)
    @if($products != null)
    <div class="col-md-3 col-sm-6 col-6 padd-rgt my-2 parawf">
        <div class="light-border d-flex align-items-center justify-content-between flex-column h-100">
            <div class="h-100 d-flex align-items-center justify-content-between flex-column w-100">

                <div id="featured_img" class="w-100">
                    @if(isset($products->image) != null)
                        @php $image = '/'.$products->image;
                    $object = ''
                        @endphp
                    @else
                        @php $image = 'galleryimage.png';
                     $object = 'object-fit:cover'
                        @endphp
                    @endif
                    <a href="{{url('single-product',$products->slug)}}">
                        <img style="{{$object}}" src="{{asset('images/media'.'/'.$image)}}" class="w-100" height="200px">
                    </a>
                </div>
                <div class="d-flex justify-content-center gap-1 mt-3">
                    @if($products->option_name !=  null)
{{--                        @foreach($products->option_name as $color)--}}
                            <h6>
                                    <span>
                                        <div class="color" style="background-color: {{$products->option_name}}" data-hex="{{$products->option_name}}"></div>
                                    </span>
                            </h6>
{{--                        @endforeach--}}
                    @endif
                </div>
                <h4 class="jacket-heading heading-truncate">
                    <a href="{{url('single-product',$products->slug)}}" class="fs-6 text-dark">
                        {{$products->title}}
                    </a>
                </h4>
                <div class="stars-icon">
                    <ul>
                        @for ($x = 1; $x <= $products->rating; $x++)
                            <i class="fa fa-star" aria-hidden="true"></i>
                        @endfor
                        @for ($x = $products->rating; $x <= 4; $x++)
                            <i class="fa fa-star text-muted" aria-hidden="true"></i>
                        @endfor
                    </ul>
                </div>
                <p class="amount-text"><span><small class="text-uppercase">
                            {{$products->currency_symbol}}{{$products->discounted_price}}</small></span>
                    <span class="cut-price text-uppercase">
                        {{$products->currency_symbol}}{{$products->compare_price}}</span>
            </div>
            <div class="w-100 d-flex align-items-center justify-content-between flex-column">
                <h6 class="promo-text w-100">35% OFF-Save $40.00</h6>
                <p class="free-shipping-text promo-text bg-white text-center"><a href="{{url('single-product',$products->slug)}}"> Free Shipping </a></p>
            </div>
        </div>
    </div>
    @endif
@endforeach

