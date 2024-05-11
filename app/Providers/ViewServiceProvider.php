<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\country;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::share('ThemeSettings', 'App\Helpers\Settings::ThemeSettings');
         View::share('Snippet', 'App\Helpers\Settings::Snippet');
        View::share('Section', 'App\Helpers\Settings::Section');
        View::share('CommentBox', 'App\Helpers\Settings::CommentBox');
        View::share('CommentList', 'App\Helpers\Settings::CommentList');
        View::share('LikeWidget', 'App\Helpers\Settings::LikeWidget');
        View::share('SaveForFuture', 'App\Helpers\Settings::SaveForFuture');

        View::share('WishList', 'App\Helpers\Settings::WishList');
        View::share('locale', 'App\Helpers\DefaultLanguage::CurrentSegment');

        View::share('Categories', 'App\Helpers\Product::Categories');
        View::share('Coupons', 'App\Helpers\Product::Coupons');
        View::share('Countries', 'App\Helpers\Product::Country');
        View::share('SelectedCountry', 'App\Helpers\Product::SelectedCountry');
//        View::share('CountriesAll', $country);
    }

    public function country()
    {
        $country  = country::where('status',1)->get();
//        return $country;
    }
}
