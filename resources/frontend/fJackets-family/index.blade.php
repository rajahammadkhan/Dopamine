@if($ThemeSettings('option-project-type','ecommerce'))
    @extends('frontend.layouts.master')
@section('content')
<section class="jackets-family-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="jackets-family-content mt-5">
                    <h4>#FJACKETS FAMILY</h4>
{{--                    <a href="javascriptvoid:(0)">View Gallery <i class="fa fa-arrow-right" aria-hidden="true"></i></a>--}}
                </div>
                <div class="row family-slider">
                    @foreach($gallery as $galleries)
                    <div class="col-md-4 slider responsive-family my-3">

                                <a href="{{asset('images/media/'.$galleries->image)}}" data-fancybox="gallery">
                                    <img src="{{asset('images/media/'.$galleries->image)}}" alt="image" class="img-fluid">
                                </a>
                           
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@endif
