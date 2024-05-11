
@extends('Frontend.layouts.master')

@section('content')
    <section class="testimonials">
        <div class="container">

            <div class="testimonials-content">
                <h3 class="section-title">Testimonials</h3>
                <div class="testimonial-list">
                    @if(count($testimonial) > 0)
                    @foreach($testimonial as $test)
                    <div class="testimonial-item {{ $loop->index === 0 ? 'active' : ''}}">
                        <div class="testimonial-text">
                            <div class="rating">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                            </div>
                            <p class="testimonial-description">
                                {{$test->description}}
                            </p>
                            <h6 class="author-name">Edward Newgate</h6>
                            <span class="author-position">Founder Circle</span>

                        </div>
                        <div class="testimonial-img">
                            @if($test->image!= null)
                                @php $image = '/'.$test->image @endphp
                            @else
                                @php $image = 'galleryimage.png' @endphp
                            @endif
                            <img src="{{asset('images/media'.'/'.$image)}}" alt="">
                        </div>
                    </div>
                    @endforeach
                    @else
                        <div class="story" style="margin-left: 446px;">
                            <h1>No Testimonial Found</h1>
                        </div>
                    @endif
                    <div class="direction">
                        <div class="arrow passive" id="arrow-previous"><</div>
                        <div class="arrow" id="arrow-next">></div>
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
    <!--Trending Stories -->
@endsection
