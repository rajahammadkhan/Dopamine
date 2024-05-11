<!--Footer-->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-text">
                <img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/logo.svg" alt="" class="footer-icon">
                <p class="footer-desc">
                    Plan and book your perfect trip with
                    expert advice, travel tips destination
                    information from us
                </p>
                <p class="copyright">©2020 Thousand Sunny. All rights reserved</p>
            </div>
            <div class="nav-footer">
                <div class="nav-footer-col">
                    <h4 class="nav-footer-title">Destinations</h4>
                    <ul class="nav-footer-links">
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Africa</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Antarctica</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Asia</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Europe</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">America</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-footer-col">
                    <h4 class="nav-footer-title">Shop</h4>
                    <ul class="nav-footer-links">
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Destination Guides</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Pictorial & Gifts</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Special Offers</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Delivery Times</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">FAQs</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-footer-col">
                    <h4 class="nav-footer-title">Interests</h4>
                    <ul class="nav-footer-links">
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Adventure Travel</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Art And Culture</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Wildlife And Nature</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Family Holidays</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Food And Drink</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="social-media">
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/twitter.svg" class="icon" alt="">
                </a>
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/facebook.svg" alt="">
                </a>
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/instagram.svg" alt="">
                </a>
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/linkedin.svg" alt="">
                </a>
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/youtube.svg" alt="">
                </a>
            </div>
        </div>
    </div>
</footer>
<!--Footer-->

<div class="arrow-up"><i></i></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
      integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


    $(document).ready(function () {

        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        $('.submitt').on('click', function (event) {
            event.preventDefault();
                if (!$('#email').val().length) {
                toastr.error('Email Must Required');
            } else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#email').val())) {
                var data = {
                    'email': $('#email').val(),
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('sendEmail')}}",
                    type: "POST",
                    data: data,
                    // dataType: "json",
                    success: function (data) {
                        console.log(data)
                        if (data==="true") {
                            mailForm.reset();
                            toastr.success('Thanks for subscribing')
                        } else {
                            toastr.error('email already exists')
                        }
                    }
                });
            } else {
                toastr.error('Please Enter a Valid Email');
            }
        });

        $(".owl-carousel").owlCarousel({
            loop: false,
            margin: 10,
            dots: false,
            nav: true,
            items: 3
        });
        var owl = $(".owl-carousel");
        owl.owlCarousel();
        $(".next-btn").click(function () {
            owl.trigger("next.owl.carousel");
        });
        $(".prev-btn").click(function () {
            owl.trigger("prev.owl.carousel");
        });
        $(".prev-btn").addClass("disabled");
        $(owl).on("translated.owl.carousel", function (event) {
            if ($(".owl-prev").hasClass("disabled")) {
                $(".prev-btn").addClass("disabled");
            } else {
                $(".prev-btn").removeClass("disabled");
            }
            if ($(".owl-next").hasClass("disabled")) {
                $(".next-btn").addClass("disabled");
            } else {
                $(".next-btn").removeClass("disabled");
            }
        });

    });
</script>
<script src="{{asset('frontend/js/style.js')}}"></script>
</body>
</html>
