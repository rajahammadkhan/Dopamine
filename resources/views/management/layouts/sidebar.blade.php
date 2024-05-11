<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list pt-4">
                <li class="sidebar-user-panel active">
                    <div class="contact-photo">
                        {{--              @if(auth()->user()->erp_image == null)--}}
                        {{--                    <div class="user-panel">--}}
                        {{--                        <div class=" image">--}}
                        {{--                          <a href="{{url('myprofile')}}" class="p-0 mr-5" style="width:80px;" >--}}
                        {{--                              <img  src="{{asset('management/images/profile.png')}}" class="img-circle user-img-circle" alt="User Image"/>--}}
                        {{--                          </a>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                        @else--}}
                        {{--                        <div class="user-panel">--}}
                        {{--                            <div class=" image">--}}
                        {{--                                <a href="{{url('myprofile')}}" class="p-0 mr-5" style="width:80px;" >--}}
                        {{--                                    <img  src="{{asset('image/announcement'.'/'.auth()->user()->erp_image)}}" class="img-circle user-img-circle" alt="User Image"/>--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        @endif--}}
                        <div class="profile-usertitle ml-4">
                            {{--                        <div class="sidebar-userpic-name">{{App\Helpers\Sc::getUserProfile()->name}} </div>--}}
                            {{--                        <div class="profile-usertitle-job ">{{App\Helpers\Sc::getUserProfile()->user_type}} </div>--}}
                        </div>
                    </div>
                </li>

                <li>
                    <a href="{{url('/')}}" target="_blank">
                        <i class="fas fa-eye"></i>
                        <span>View Store</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/dashboard')}}">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                @can('multi-lingle-sidebar')
                    <li>
                        <a href="{{route('multi-lingle.index')}}">
                            <i class="fas fa-language"></i>
                            <span>Multi Lingle</span>
                        </a>
                    </li>
                @endcan
                @can('hotel-sidebar')
                    <li>
                        <a href="{{route('hotel.index')}}">
                            <i class="fas fa-hotel"></i>
                            <span>Hotel</span>
                        </a>
                    </li>
                @endcan

                @can('post-sidebar')
                    <li>
                        <a onClick="return false;" class="menu-toggle" href="">
                            <i class="fas fa-unlock-alt"></i>
                            <span> Blog Post</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{route('post.index')}}">
                                    <i class="fa fa-credit-card"></i>
                                    <span>Blog</span>
                                </a>
                            </li>
                            @php
                                $bl = base64_encode('blog');
                            @endphp
                            <li>
                                <a href="{{route('categories.index')}}?type={{$bl}}">
                                    <i class="fa fa-list-alt"></i>
                                    <span>Categories</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('package-sidebar')
                    <li>
                        <a onClick="return false;" class="menu-toggle" href="">
                            <i class="fas fa-unlock-alt"></i>
                            <span> Package </span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{route('package.index')}}">
                                    <i class="fas fa-hotel"></i>
                                    <span>Package</span>
                                </a>
                            </li>

                            @php
                                $bl = base64_encode('package');
                            @endphp
                            <li>
                                <a href="{{route('categories.index')}}?type={{$bl}}">
                                    <i class="fa fa-list-alt"></i>
                                    <span>Categories</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('testimonial-sidebar')
                    <li>
                        <a href="{{route('testimonial.index')}}">
                            <i class="fa fa-quote-left"></i>
                            <span>Testimonial</span>
                        </a>
                    </li>
                @endcan
                @can('newsletter-sidebar')
                    <li>
                        <a href="{{url('admin/subscriber')}}">
                            <i class="fas fa-newspaper"></i>
                            <span>Newsletter</span>
                        </a>
                    </li>
                @endcan
                @can('roles-and-permission-sidebar')
                    <li>
                        <a onClick="return false;" class="menu-toggle" href="">
                            <i class="fas fa-unlock-alt"></i>
                            <span> Roles | Permission</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href=" {{route('roles.index')}}">
                                    <span>Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href=" {{route('permissions.index')}}">
                                    <span>Permissions</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcan
{{--                @can('countries-sidebar')--}}
{{--                    <li>--}}
{{--                        <a href="{{url('admin/countries')}}">--}}
{{--                            <i class="fas fa-user"></i>--}}
{{--                            <span>Countries</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
                @can('userinfo-sidebar')

                    <li>
                        <a href="{{url('admin/user-info')}}">
                            <i class="fas fa-user"></i>
                            <span>Users</span>
                        </a>
                    </li>
                @endcan
                @can('user-sidebar')
                    <li>
                        <a href="{{url('admin/users')}}">
                            <i class="fas fa-user"></i>
                            <span>Users Management</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a onClick="return false;" class="menu-toggle" href="">
                        <i class="fas fa-unlock-alt"></i>
                        <span> Appearance </span>
                    </a>
                    <ul class="ml-menu">
                        @can('language-sidebar')
                            <li>
                                <a href="{{route('language.index')}}">
                                    <i class="fas fa-sign-language"></i>
                                    <span>Language</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                {{--                @can('orders-sidebar')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{route('orders.index')}}" >--}}
                {{--                            <i class="fab fa-opencart"></i>--}}
                {{--                            <span>Orders</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}
                {{--                @can('orders-sidebar')--}}
                {{--                    <li>--}}
                {{--                        <a href="{{route('orders.index')}}" >--}}
                {{--                            <i class="fas fa-shipping-fast"></i>--}}
                {{--                            <span>Track Orders</span>--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                {{--                @endcan--}}

                <li>
                    <form class="m-0" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" :href="route('logout')"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="fas fa-power-off"></i> <span>
                                {{ __('Log Out') }}
                            </span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <div class="copyright">
            Powered By <a href="https://eliteblue.net/" class="text-dark d-block" target="_blank">Elite Blue
                Technologies</a>
        </div>
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation">
                <a href="#skins" data-toggle="tab" class="active">SKINS</a>
            </li>
            {{--            <li role="presentation">--}}
            {{--                <a href="#settings" data-toggle="tab">SETTINGS</a>--}}
            {{--            </li>--}}
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                <div class="demo-skin">

                    <div class="rightSetting">
                        <p>SIDEBAR MENU COLORS</p>
                        <button type="button"
                                class="btn btn-sidebar-light btn-border-radius p-l-20 p-r-20">Light
                        </button>
                        <button type="button"
                                class="btn btn-sidebar-dark btn-default btn-border-radius p-l-20 p-r-20">Dark
                        </button>
                    </div>
                    <div class="rightSetting">
                        <p>THEME COLORS</p>
                        <button type="button"
                                class="btn btn-theme-light btn-border-radius p-l-20 p-r-20">Light
                        </button>
                        <button type="button"
                                class="btn btn-theme-dark btn-default btn-border-radius p-l-20 p-r-20">Dark
                        </button>
                    </div>
                    <div class="rightSetting">
                        <p>SKINS</p>
                        <ul class="demo-choose-skin choose-theme list-unstyled">
                            <li data-theme="black" class="actived">
                                <div class="black-theme"></div>
                            </li>
                            <li data-theme="white">
                                <div class="white-theme white-theme-border"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple-theme"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue-theme"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan-theme"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green-theme"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange-theme"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane stretchRight" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-green"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-blue"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-purple"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-cyan"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-red"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-lime"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</div>
<style>
    .copyright {
        position: absolute;
        bottom: 0 !important;
        width: 100% !important;
        text-align: center;
        font-size: 13px;
        padding: 15px;
        background: white;
        border-top: 1px solid #f1f2f7;
        z-index: 999;
    }

    .sidebar .menu .list {
        padding-bottom: 80px;
    }
</style>
