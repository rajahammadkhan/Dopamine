<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Helpers\DefaultLanguage;
use App\Models\blog;
use App\Models\coupon;
use App\Models\country;
use App\Models\EnquireNow;
use App\Models\FAQs;
use App\Models\Highlights;
use App\Models\HotelReviews;
use App\Models\ProductReviews;
use App\Models\Holidays;
use App\Models\HotelPackage;
use App\Models\InclusionsExclusions;
use App\Models\Language;
use App\Models\media;
use App\Models\Package;
use App\Models\seo;
use App\Models\store;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Route;
use Session;
use DB;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $language=DefaultLanguage::AllLanguage();
        $languages=DefaultLanguage::GetSegment($request);
        if($languages->bydefault != 1)
        {
            $blog = blog::leftJoin('media', function ($join) {
                $join->on('blogs.id', '=', 'media.reference_id');
            })
                ->leftjoin('blog_details', function ($join) {
                    $join->on('blogs.id', '=', 'blog_details.blog_id');
                })
                ->where('media.reference_type', '=', 'post')
                ->where('blog_details.language_id',$languages->id)
                ->select('blogs.id', 'blogs.user_id', 'blogs.slug', 'blogs.category_id', 'blogs.status', 'blog_details.title', 'blog_details.short_description', 'blog_details.long_description', 'blog_details.language_id', 'media.image')
                ->get();
        }
        else{
            $blog = blog::leftJoin('media', function ($join) {
                $join->on('blogs.id', '=', 'media.reference_id');
            })
                ->leftjoin('blog_details', function ($join) {
                    $join->on('blogs.id', '=', 'blog_details.blog_id');
                })
                ->where('media.reference_type', '=', 'post')
                ->where('blog_details.language_id',DefaultLanguage::SelectedLanguage()->id)
                ->select('blogs.id', 'blogs.user_id', 'blogs.slug', 'blogs.category_id', 'blogs.status', 'blog_details.title', 'blog_details.short_description', 'blog_details.long_description', 'blog_details.language_id', 'media.image')
                ->get();
        }
        return view('Frontend/blog/index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if(isset($_GET['type']))
//        {
//            $cate = categories::get();
//            return view('management/categories/create',compact('cate'));
//        }
//        else
//        {
//            return  abort('404');
//        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $img =  $request->image;
//        $category_type = base64_decode($_GET['type']);
//
//        if(isset($_GET['type']))
//        {
//            if ($request->file('image')) {
//                $mainext = $request->file('image')->getClientOriginalExtension();
//                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
//                $request->image->move(public_path('images/media'), $main_file);
//            } else {
//                $main_file = null;
//            }
//            $category_type = base64_decode($_GET['type']);
//
//            $data = [
//                'title' => $request->title,
//                'long_description' => $request->description,
//                'status' => $request->status,
//                'reference_type' => $category_type,
//                'image'=> $main_file,
//                'parent_category' => $request->parent_category,
//            ];
//            $categories = categories::create($data);
//
//            $seo = [
//                'reference_id' => $categories->id,
//                'meta_title' => $request->meta_title,
//                'reference_type' => $category_type,
//                'meta_description'=> $request->meta_description,
//                'meta_keywords' => $request->meta_keywords,
//            ];
//
//            $search = seo::create($seo);
//            return redirect()->back()->with('success','Category Created successfully');
//
//        }
//        else
//        {
//            return  abort('404');
//        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
//        $data['blog'] = blog::where('slug',$slug)->get()->first();
//        if(!$data['blog']){
//            return view('404');
//        }
//        $data['seo'] = seo::where(['reference_id' => $data['blog']->id ,'reference_type' =>'blog'])->get()->first();
//        dd($data['seo']);
//        $data['media'] = media::where(['reference_id' => $data['blog']->id ,'reference_type' =>'blog'])->get()->first();
//        $data['comments'] = DB::table('reactions')
//            ->where('type','comment')
//            ->where('reference_type','blog')
//            ->where('reference_id',$data['blog']->id)->get();
//        return view('frontend/blogs/show',$data);


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */



    public function collection($slug)
    {



    }

    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories,$id)
    {
        //
    }

    public function singleBlog(Request $request,$slug)
    {
        $lang_id = $_GET['language_id'];
        $language=DefaultLanguage::AllLanguage();
            $single_blog = blog::leftJoin('media', function ($join) {
                $join->on('blogs.id', '=', 'media.reference_id');
            })
            ->leftjoin('blog_details', function ($join) {
                    $join->on('blogs.id', '=', 'blog_details.blog_id');
             })
            ->where('media.reference_type', '=', 'post')
            ->where('blogs.slug',$slug)
            ->where('blog_details.language_id',$lang_id)
            ->select('blogs.id', 'blogs.user_id', 'blogs.slug', 'blogs.category_id', 'blogs.status', 'blog_details.title', 'blog_details.short_description', 'blog_details.long_description', 'blog_details.language_id', 'media.image')
            ->get()->first();
        return view('Frontend/blog/single-blog',compact('single_blog','language'));
    }
    public function getTestimonial(Request $request)
    {
        $language=DefaultLanguage::AllLanguage();
        $languages=DefaultLanguage::GetSegment($request);
        if($languages->bydefault != 1)
        {
            $testimonial = Testimonial::leftJoin('media', function ($join) {
                $join->on('testimonials.id', '=', 'media.reference_id');
            })
                ->leftjoin('testimonial_details', function ($join) {
                    $join->on('testimonials.id', '=', 'testimonial_details.testimonial_id');
                })
                ->where('media.reference_type', '=', 'testimonial')
                ->where('testimonial_details.language_id',$languages->id)
                ->select('testimonials.id', 'testimonials.user_id', 'testimonials.slug', 'testimonials.status', 'testimonial_details.title', 'testimonial_details.description', 'testimonial_details.comment', 'testimonial_details.language_id', 'media.image')
                ->get();
        }
        else{
            $testimonial = Testimonial::leftJoin('media', function ($join) {
                $join->on('testimonials.id', '=', 'media.reference_id');
            })
                ->leftjoin('testimonial_details', function ($join) {
                    $join->on('testimonials.id', '=', 'testimonial_details.testimonial_id');
                })
                ->where('media.reference_type', '=', 'testimonial')
                ->where('testimonial_details.language_id',DefaultLanguage::SelectedLanguage()->id)
                ->select('testimonials.id', 'testimonials.user_id', 'testimonials.slug', 'testimonials.status', 'testimonial_details.title', 'testimonial_details.description', 'testimonial_details.comment', 'testimonial_details.language_id', 'media.image')
                ->get();
        }
        return view('Frontend/snippets/testimonial',compact('testimonial','language'));
    }
    public function getPackage(Request $request)
    {
        $language=DefaultLanguage::AllLanguage();
        $languages=DefaultLanguage::GetSegment($request);
        if($languages->bydefault != 1)
        {
            $package = Package::leftJoin('media', function ($join) {
                $join->on('packages.id', '=', 'media.reference_id');
            })
                ->leftjoin('package_details', function ($join) {
                    $join->on('packages.id', '=', 'package_details.package_id');
                })
                ->where('media.reference_type', '=', 'package')
                ->where('package_details.language_id',$languages->id)
                ->select('packages.id', 'packages.user_id','packages.category_id','packages.hotel_id', 'packages.slug', 'packages.status', 'package_details.title', 'package_details.description', 'package_details.country', 'package_details.language_id', 'package_details.city', 'media.image')
                ->get();
        }
        else{
            $package = Package::leftJoin('media', function ($join) {
                $join->on('packages.id', '=', 'media.reference_id');
            })
                ->leftjoin('package_details', function ($join) {
                    $join->on('packages.id', '=', 'package_details.package_id');
                })
                ->where('media.reference_type', '=', 'package')
                ->where('package_details.language_id',DefaultLanguage::SelectedLanguage()->id)
                ->select('packages.id','packages.select_package' ,'packages.user_id','packages.category_id','packages.hotel_id', 'packages.slug', 'packages.status', 'package_details.title', 'package_details.description', 'package_details.country', 'package_details.language_id', 'package_details.city', 'media.image')
                ->get();
        }
        return view('Frontend/package/index',compact('package','language'));
    }
    public function singlePackage(Request $request,$slug)
    {

        $lang_id = $_GET['language_id'];
        $data['language']=DefaultLanguage::AllLanguage();
        $data['single_package'] = Package::leftJoin('media', function ($join) {
            $join->on('packages.id', '=', 'media.reference_id');
        })
            ->leftjoin('package_details', function ($join) {
                $join->on('packages.id', '=', 'package_details.package_id');
            })
            ->where('media.reference_type', '=', 'package')
            ->where('packages.slug',$slug)
            ->where('package_details.language_id',$lang_id)
            ->select('packages.id', 'packages.user_id','packages.category_id','packages.hotel_id', 'packages.slug', 'packages.status', 'package_details.title', 'package_details.description', 'package_details.country', 'package_details.language_id', 'package_details.city', 'media.image')
            ->get()->first();
        $data['highlights'] = Highlights::where('package_id', $data['single_package']->id)->get();
        $data['holidays']= Holidays::leftJoin('media', function ($join) {
            $join->on('holidays.id', '=', 'media.reference_id');
             })
            ->where('media.reference_type', '=', 'holidays')
            ->where('holidays.language_id', DefaultLanguage::SelectedLanguage()->id)
            ->select('holidays.id', 'holidays.*','media.image')
            ->get();
        $data['hotels']= HotelPackage::leftJoin('media', function ($join) {
            $join->on('hotel_packages.id', '=', 'media.reference_id');
           })
            ->leftjoin('hotel_details', function ($join) {
                $join->on('hotel_packages.id', '=', 'hotel_details.hotel_id');
            })
            ->where('media.reference_type', '=', 'hotel')
            ->where('hotel_details.language_id', DefaultLanguage::SelectedLanguage()->id)
            ->select('hotel_packages.id', 'hotel_packages.*','hotel_details.*','media.image')
            ->get();
        $data['faqs'] = FAQs::where('package_id',$data['single_package']->id)->get();
        $data['reviews'] = HotelReviews::where('package_id',$data['single_package']->id)->get();
//        $data['inclusion_exclusion'] = InclusionsExclusions::where('package_id', $id)->get()->first();


        $data['similarPackage'] = Package::leftJoin('media', function ($join) {
            $join->on('packages.id', '=', 'media.reference_id');
        })
            ->leftjoin('package_details', function ($join) {
                $join->on('packages.id', '=', 'package_details.package_id');
            })
            ->where('media.reference_type', '=', 'package')
            ->where('packages.id','!=',$data['single_package']->id)
            ->where('packages.category_id',$data['single_package']->category_id)
            ->where('package_details.language_id',$lang_id)
            ->select('packages.id', 'packages.user_id','packages.category_id','packages.hotel_id', 'packages.slug', 'packages.status', 'package_details.title', 'package_details.description', 'package_details.country', 'package_details.language_id', 'package_details.city', 'media.image')
            ->get();
        return view('Frontend/package/single-package',$data);
    }

    public function enquireNow(Request $request)
    {
        $data = [
            'package_id' => $request->package_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        $enquireNow = EnquireNow::create($data);
        return redirect()->back()->with('success', 'EnquireNow Submit successfully');
    }
}
