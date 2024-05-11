<?php

use App\Http\Controllers\Management\BlogController;
use App\Http\Controllers\Management\CategoriesController;
use App\Http\Controllers\Management\LanguageController;
use App\Http\Controllers\Management\TestimonialController;
use App\Http\Controllers\Management\MultiLingleController;
use App\Http\Controllers\Management\HotelPackageController;
use App\Http\Controllers\Management\PackageController;
use App\Http\Controllers\Management\HolidaysController;
use App\Http\Controllers\Management\ContactController;
use App\Http\Controllers\SubscriptionController;

//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Management\LanguageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::fallback(function () {

    return view("404");

});

//Route::get('/', function () {
//    return view('Frontend.home.index');
//});
Auth::routes(['verify' => true]);


Route::middleware(['auth', 'VerifyEmail'])
    ->group(function () {
//        Route::get('/', [App\Http\Controllers\Frontend\UserDashboardController::class, 'index'])->middleware('verified');
        Route::get('search', [App\Http\Controllers\Frontend\UserDashboardController::class, 'SearchData']);
        Route::post('sendEmail', [App\Http\Controllers\Frontend\UserDashboardController::class, 'sendEmail']);
        Route::resource('my-account', App\Http\Controllers\Frontend\UserDashboardController::class);
        Route::get('my-activity', [App\Http\Controllers\Frontend\UserDashboardController::class, 'activity']);
        Route::get('wishlist', [App\Http\Controllers\Frontend\UserDashboardController::class, 'wishList']);
//my profile
        Route::get('my-profile', [App\Http\Controllers\Frontend\UserDashboardController::class, 'myProfile']);
        Route::put('update_profile/{id}', [App\Http\Controllers\Frontend\UserDashboardController::class, 'updateprofile']);
//change password
        Route::get('change-password', [App\Http\Controllers\Frontend\UserDashboardController::class, 'password']);
        Route::put('update-password/{id}', [App\Http\Controllers\Frontend\UserDashboardController::class, 'updatePassword']);
//Reviews
        Route::post('reviews', [App\Http\Controllers\Frontend\UserDashboardController::class, 'Reviews']);
    });

Route::middleware(['auth', 'AdminRoutes'])
    ->group(function () {

//Route::group(['middleware' => ['auth']], function() {
        Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('admin/roles', App\Http\Controllers\RoleController::class);
        Route::resource('admin/permissions', App\Http\Controllers\PermissionsController::class);
        Route::resource('admin/users', App\Http\Controllers\UserController::class);
        Route::resource('admin/multi-lingle', MultiLingleController::class);
        Route::resource('admin/dashboard', App\Http\Controllers\HomeController::class);
        Route::resource('admin/countries', CountryController::class);

        //Image-delete
        Route::post('image-delete', [App\Http\Controllers\Management\ContactController::class, 'imagedelete']);

        //enquire
        Route::get('admin/enquire', [App\Http\Controllers\Management\ContactController::class, 'allEnquire']);

        //Categories
        Route::resource('admin/categories', CategoriesController::class);

        //keyword
        Route::resource('admin/keyword', App\Http\Controllers\Management\KeywordController::class);

        //blog
        Route::resource('admin/post', BlogController::class);

        //Store
        Route::resource('admin/store', StoreController::class);

        //video
        Route::resource('admin/videos', VideoshowController::class);

        //slider
        Route::resource('admin/slider', SliderController::class);

        //userinfo
        Route::resource('admin/user-info', UserinfoController::class);

        //pages
        Route::resource('admin/pages', PageController::class);

        //language
        Route::resource('admin/language', LanguageController::class);

        //testimonial
        Route::resource('admin/testimonial', TestimonialController::class);

        //hotel-package
        Route::resource('admin/hotel', HotelPackageController::class);

        //package
        Route::resource('admin/package', PackageController::class);

        //package
        Route::resource('admin/holidays', HolidaysController::class);

        Route::get('admin/subscriber', [App\Http\Controllers\Management\ContactController::class, 'subscriber']);

        Route::resource('admin/contacts', App\Http\Controllers\Management\ContactController::class);

        Route::get('admin/subscriber', [App\Http\Controllers\Management\ContactController::class, 'subscriber']);

        //coupon
        Route::resource('admin/coupon', CouponController::class);
        Route::resource('admin/theme-setting', App\Http\Controllers\Management\ThemeSettingsController::class);
        Route::post('admin/theme-setting-fields', [App\Http\Controllers\Management\ThemeSettingsController::class, 'theme_setting_fields']);


    });


//Auth::routes();


//Route::group(['prefix'=>'/{locale?}'], function ($locale = null) {
//        Route::get('/', [App\Http\Controllers\Frontend\UserDashboardController::class, 'index']);
//        Route::resource('blog', App\Http\Controllers\Frontend\BlogsController::class);
//});
//Route::get('/', [App\Http\Controllers\Frontend\UserDashboardController::class, 'index']);
//Route::resource('blog', App\Http\Controllers\Frontend\BlogsController::class);
Route::group(['prefix' => '/'], function () {
    Route::post('enquire-now', [App\Http\Controllers\Frontend\BlogsController::class, 'enquireNow']);
    Route::group(['prefix' => '/blog'], function () {
        Route::resource('/', App\Http\Controllers\Frontend\BlogsController::class);
        Route::get('/{slug}', [App\Http\Controllers\Frontend\BlogsController::class, 'singleBlog']);
    });
    Route::group(['prefix' => '/package'], function () {
        Route::get('/', [App\Http\Controllers\Frontend\BlogsController::class, 'getPackage']);
        Route::get('/{slug}', [App\Http\Controllers\Frontend\BlogsController::class, 'singlePackage']);
    });
    Route::get('/', [App\Http\Controllers\Frontend\UserDashboardController::class, 'index']);
    Route::get('testimonial', [App\Http\Controllers\Frontend\BlogsController::class, 'getTestimonial']);
});
Route::group(['prefix' => '/{locale}'], function () {
    Route::group(['prefix' => '/blog'], function () {
        Route::resource('/', App\Http\Controllers\Frontend\BlogsController::class);
        Route::get('/{slug}', [App\Http\Controllers\Frontend\BlogsController::class, 'singleBlog']);
    });
    Route::group(['prefix' => '/package'], function () {
        Route::get('/', [App\Http\Controllers\Frontend\BlogsController::class, 'getPackage']);
        Route::get('/{slug}', [App\Http\Controllers\Frontend\BlogsController::class, 'singlePackage']);

    });
    Route::get('/', [App\Http\Controllers\Frontend\UserDashboardController::class, 'index']);
    Route::get('testimonial', [App\Http\Controllers\Frontend\BlogsController::class, 'getTestimonial']);
});

//Route::group(['domain' => 'fr.' . config('app.root-domain')], function () {
//        Route::get('/', [App\Http\Controllers\Frontend\UserDashboardController::class, 'index']);
//        Route::resource('blog', App\Http\Controllers\Frontend\BlogsController::class);
//});
//Route::group(['domain' => config('app.root-domain')], function () {
//    Route::get('/', [App\Http\Controllers\Frontend\UserDashboardController::class, 'index']);
//        Route::resource('blog', App\Http\Controllers\Frontend\BlogsController::class);
//    // ...
//});


