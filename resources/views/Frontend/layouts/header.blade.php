<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dopamine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <script defer src="https://kit.fontawesome.com/20b4506959.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<link rel="icon" type="image/png" href="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/logo.svg">
</head>
<body>



<!--Header-->
<header>
    <div class="container">
        <nav>
            <div class="nav-logo">
                <a href="{{url('/')}}"><img src="https://raw.githubusercontent.com/mustafadalga/tour-and-travel/master/assets/img/logo.svg" alt=""></a>
            </div>
            <div class="nav-select">
                <select class="form-select" aria-label="Default select example">
                    <option disabled selected>Select Language</option>
                    @php $languagess = DB::table('languages')->where('status',1)
                                           ->select('id','language_name','language_code','status','bydefault')->get();
                    @endphp
                    @if(count($languagess)>0)
                    @foreach($languagess as $lang)
                    <option value="1">{{$lang->language_name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="nav-right">
                <div class="nav-close-icon"></div>
                <ul class="nav-menu">
                    <li class="nav-item ">
                        <a href="{{url('/')}}" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('blog')}}" class="nav-link">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Partner</a>
                    </li>
                </ul>
                <div class="nav-form">
                    @guest
                        <a href="{{ url('login') }}" class="btn btn-login">Login</a>
                        <a href="{{url('register')}}" class="btn btn-register">Register</a>
                    @endguest
                    @auth
                        @if(Auth::user()->hasRole('User'))
                        <a class="btn btn-register" href="{{ url('my-profile') }}"><i class="fa fa-user-circle-o mx-1"
                                                                 aria-hidden="true"></i> My Account</a>
                        @else
                                <a class="btn btn-register" href="{{url('admin/home') }}"><i class="mx-1 fa fa-user-circle-o"
                                                                         aria-hidden="true"></i> My Account</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="hamburger-menu-wrap">
                <div class="hamburger-menu">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </nav>
    </div>
</header>



