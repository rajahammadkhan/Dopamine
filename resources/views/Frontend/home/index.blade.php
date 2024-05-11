
@extends('Frontend.layouts.master')

@section('content')
{{--    @dd('ffff')--}}
    <!-- Hero -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-form">
                    <h1 class="hero-title">Dopamine</h1>
                    <form >
                        <div class="form-groups">
                            <div class="form-control">
                                <div class="custom-select-wrapper">
                                    <div class="custom-select">
                                        <div class="custom-select__trigger"><span>Location</span>
                                            <div class="arrow"></div>
                                        </div>
                                        <div class="custom-options">
                                            <span class="custom-option selected" data-value="">Location</span>
                                            <span class="custom-option" data-value="paris">Paris</span>
                                            <span class="custom-option" data-value="istanbul">Istanbul</span>
                                            <span class="custom-option" data-value="newyork">Newyork</span>
                                            <span class="custom-option" data-value="london">London</span>
                                            <span class="custom-option" data-value="tokyo">Tokyo</span>
                                            <span class="custom-option" data-value="venice">Venice</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-control">
                                <div class="custom-select-wrapper">
                                    <div class="custom-select">
                                        <div class="custom-select__trigger"><span>Activity</span>
                                            <div class="arrow"></div>
                                        </div>
                                        <div class="custom-options">
                                            <span class="custom-option selected" data-value="">Activity</span>
                                            <span class="custom-option" data-value="Cycling + Mountain Biking">Cycling + Mountain Biking</span>
                                            <span class="custom-option" data-value="Camping">Camping</span>
                                            <span class="custom-option" data-value="Food Tourism">Food Tourism</span>
                                            <span class="custom-option" data-value="Motorcycle Touring">Motorcycle Touring</span>
                                            <span class="custom-option" data-value="Road Touring">Road Touring</span>
                                            <span class="custom-option" data-value="Dirt Bike Touring">Dirt Bike Touring</span>
                                            <span class="custom-option" data-value="Wine tourism">Wine tourism</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-control">
                                <div class="custom-select-wrapper">
                                    <div class="custom-select">
                                        <div class="custom-select__trigger"><span>Grade</span>
                                            <div class="arrow"></div>
                                        </div>
                                        <div class="custom-options">
                                            <span class="custom-option selected" data-value="Grade">Grade</span>
                                            <span class="custom-option" data-value="Tourist">Tourist</span>
                                            <span class="custom-option" data-value="Superior Tourist">Superior Tourist	</span>
                                            <span class="custom-option" data-value="Standard">Standard	</span>
                                            <span class="custom-option" data-value="Superior Standard">Superior Standard	</span>
                                            <span class="custom-option" data-value="Comfort">Comfort</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-control">
                                <div class="date-picker">
                                    <div class="selected-date"></div>
                                    <div class="dates">
                                        <div class="month">
                                            <div class="arrows prev-mth">&lt;</div>
                                            <div class="mth"></div>
                                            <div class="arrows next-mth">&gt;</div>
                                        </div>
                                        <div class="days"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-explore">Explore</button>
                    </form>
                </div>
                <div class="hero-img">
                    <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/hero.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--End Hero -->


    <!--Explore World-->
    <section class="explore">
        <div class="container">
            <div class="section-content">
                <div class="section-img">
                    <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/explore.jpg" alt="">
                </div>
                <div class="section-text">
                    <h3 class="section-title">A new way to explore the world </h3>
                    <p class="p-description">For decades travellers have reached for Lonely Planet books when looking to plan and execute their perfect
                        trip, but now, they can also let Lonely Planet Experiences lead the way</p>
                    <a href="#" class="btn btn-explore">Learn more</a>
                </div>
            </div>
        </div>
    </section>
    <!--Explore World-->

    <!-- Features Destinations -->
    <section class="features">
        <div class="container">
            <div class="features-content">
                <div class="section-header">
                    <h3 class="section-head-title">Featured destinations</h3>
                    <a href="#" class="view-all">View all <span>></span></a>
                </div>
                <div class="features-cards">
                    <div class="feature-card">
                        <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/features/raja-ampat.jpg" alt="" class="feature-img">
                        <div class="feature-card-desc">
                            <span class="location">Raja Ampat</span>
                            <span class="country">Indonesia</span>
                        </div>
                    </div>
                    <div class="feature-card">
                        <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/features/fanjingshan.jpg" alt="" class="feature-img">
                        <div class="feature-card-desc">
                            <span class="location">Fanjingshan</span>
                            <span class="country">China</span>
                        </div>
                    </div>
                    <div class="feature-card">
                        <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/features/vevey.jpg" alt="" class="feature-img">
                        <div class="feature-card-desc">
                            <span class="location">Vevey</span>
                            <span class="country">Switzerland</span>
                        </div>
                    </div>
                    <div class="feature-card">
                        <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/features/skadar.jpg" alt="" class="feature-img">
                        <div class="feature-card-desc">
                            <span class="location">Skadar</span>
                            <span class="country">Montenegro</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Features Destinations -->


    <!--Guides-->
    <section class="guides">
        <div class="container">
            <div class="section-content">
                <div class="section-text">
                    <h3 class="section-title">Guides by Thousand
                        Sunny </h3>
                    <p class="p-description">Packed with tips and advice from our on-the-ground experts, our city guides app (iOS and Android) is the ultimate resource before and during a trip.</p>
                    <a href="#" class="btn btn-explore">Download</a>
                </div>
                <div class="section-img">
                    <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/guides.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--Guides-->

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">

            <div class="testimonials-content">
                <h3 class="section-title">Testimonials</h3>
                <div class="testimonial-list">
                    <div class="testimonial-item active">
                        <div class="testimonial-text">
                            <div class="rating">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                            </div>
                            <p class="testimonial-description">
                                “Quisque in lacus a urna fermentum euismod. Integer mi nibh, dapibus ac scelerisque eu, facilisis quis purus. Morbi blandit sit amet turpis nec”
                            </p>
                            <h6 class="author-name">Edward Newgate</h6>
                            <span class="author-position">Founder Circle</span>

                        </div>
                        <div class="testimonial-img">
                            <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/testimonials/testimonial-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-text">
                            <div class="rating">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/star.svg" alt="">
                            </div>
                            <p class="testimonial-description">
                                “Quisque in lacus a urna fermentum euismod. Integer mi nibh, dapibus ac scelerisque eu, facilisis quis purus. Morbi blandit sit amet turpis nec”
                            </p>
                            <h6 class="author-name">Edward Newgate</h6>
                            <span class="author-position">Founder Circle</span>

                        </div>
                        <div class="testimonial-img">
                            <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/testimonials/testimonial-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="direction">
                        <div class="arrow passive" id="arrow-previous"><</div>
                        <div class="arrow" id="arrow-next">></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials -->
{{--@foreach($Blog as $blog)--}}
{{--    <div class="story">--}}
{{--        <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/stories/story-1.jpg" alt="" class="story-img">--}}
{{--        <h4 class="story-title">{{$blog->title}}</h4>--}}
{{--        <p class="story-desc my-0">{!!$blog->short_description!!}</p>--}}
{{--        <a href="#" class="read-more">Read More</a>--}}
{{--    </div>--}}
{{--@endforeach--}}
    <!--Trending Stories -->
    <section class="trendings">
        <div class="container">
            <div class="trendings-content">
                <div class="section-header">
                    <h3 class="section-head-title">Trending stories</h3>
                    <a href="#" class="view-all">View all <span>></span></a>
                </div>
                <div class="stories">
                    <div class="story">
                        <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/stories/story-1.jpg" alt="" class="story-img">
                        <h4 class="story-title">The many benefits of taking a healing holiday</h4>
                        <p class="story-desc">‘Helaing holidays’ are on the rise
                            tohelp maximise your health and happines...</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                    <div class="story">
                        <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/stories/story-2.jpg" alt="" class="story-img">
                        <h4 class="story-title">The best Kyoto restaurant to try Japanese food</h4>
                        <p class="story-desc">From tofu to teahouses, here’s our guide to Kyoto’s best restaurants
                            to visit...</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                    <div class="story">
                        <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/stories/story-3.jpg" alt="" class="story-img">
                        <h4 class="story-title">Skip Chichen Itza and head to this remote Yucatan</h4>
                        <p class="story-desc">It’s remote and challenging to get,
                            but braving the jungle and exploring
                            these ruins without the...</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                    <div class="story">
                        <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/stories/story-4.jpg" alt="" class="story-img">
                        <h4 class="story-title">Surf’s up at these beginner spots around the world</h4>
                        <p class="story-desc">If learning to surf has in on your to-
                            do list for a while, the good news
                            is: it’s never too late...</p>
                        <a href="#" class="read-more">Read More</a>
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
