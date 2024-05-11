<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\BlogDetail;
use App\Models\blog;
use App\Models\categories;
use App\Models\country;
use App\Models\FAQs;
use App\Models\Highlights;
use App\Models\HotelDetail;
use App\Models\HotelPackage;
use App\Models\InclusionsExclusions;
use App\Models\Itinerary;
use App\Models\ItineraryDetail;
use App\Models\media;
use App\Models\Package;
use App\Models\PackageDetail;
use App\Models\seo;
use App\Models\Testimonial;
use App\Models\TestimonialDetail;
use App\Models\CategoryDetail;
use App\Models\Language;
use App\Helpers\DefaultLanguage;
use App\Models\MultiLingle;
use Illuminate\Http\Request;

class MultiLingleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['multi_data'] = null;
        $data['translated'] = null;
        $data['language'] = Language::where('bydefault', null)->get();
        if ($request->multi_criteria == "categories") {
            $data['translated'] = categories::Leftjoin('category_details', 'categories.id', '=', 'category_details.category_id')
                ->where('category_details.language_id', $request->language_id)
                ->pluck('categories.id')->toArray();
            $data['multi_data'] = categories::Leftjoin('category_details', 'categories.id', '=', 'category_details.category_id')
                ->where('category_details.language_id', DefaultLanguage::SelectedLanguage()->id)
                ->select('categories.id', 'category_details.language_id', 'category_details.title', 'category_details.description')->get();

        } else if ($request->multi_criteria == "blog") {
            $data['translated'] = blog::Leftjoin('blog_details', 'blogs.id', '=', 'blog_details.blog_id')
                ->where('blog_details.language_id', $request->language_id)
                ->pluck('blogs.id')->toArray();
            $data['multi_data'] = blog::Leftjoin('blog_details', 'blogs.id', '=', 'blog_details.blog_id')
                ->where('blog_details.language_id', DefaultLanguage::SelectedLanguage()->id)
                ->select('blogs.id', 'blog_details.language_id', 'blog_details.title', 'blog_details.short_description', 'blog_details.long_description')
                ->get();

        } else if ($request->multi_criteria == "testimonials") {
            $data['translated'] = Testimonial::Leftjoin('testimonial_details', 'testimonials.id', '=', 'testimonial_details.testimonial_id')
                ->where('testimonial_details.language_id', $request->language_id)
                ->pluck('testimonials.id')->toArray();
            $data['multi_data'] = Testimonial::Leftjoin('testimonial_details', 'testimonials.id', '=', 'testimonial_details.testimonial_id')
                ->where('testimonial_details.language_id', DefaultLanguage::SelectedLanguage()->id)
                ->select('testimonials.id', 'testimonial_details.language_id', 'testimonial_details.title', 'testimonial_details.description')->get();
        } else if ($request->multi_criteria == "hotel") {
            $data['translated'] = HotelPackage::Leftjoin('hotel_details', 'hotel_packages.id', '=', 'hotel_details.hotel_id')
                ->where('hotel_details.language_id', $request->language_id)
                ->pluck('hotel_packages.id')->toArray();
            $data['multi_data'] = HotelPackage::Leftjoin('hotel_details', 'hotel_packages.id', '=', 'hotel_details.hotel_id')
                ->where('hotel_details.language_id', DefaultLanguage::SelectedLanguage()->id)
                ->select('hotel_packages.id', 'hotel_details.language_id', 'hotel_details.title', 'hotel_details.description', 'hotel_details.address')->get();
        }
        else if ($request->multi_criteria == "package") {
                $data['translated'] = Package::Leftjoin('package_details', 'packages.id', '=', 'package_details.package_id')
                ->where('package_details.language_id', $request->language_id)
                ->pluck('packages.id')->toArray();
            $data['multi_data'] = Package::Leftjoin('package_details', 'packages.id', '=', 'package_details.package_id')
                ->where('package_details.language_id', DefaultLanguage::SelectedLanguage()->id)
                ->select('packages.id', 'package_details.language_id', 'package_details.title', 'package_details.description')->get();
        }else {
            $data['language'] = Language::where('bydefault', null)->get();
        }

        return view('management.multilingle.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MultiLingle $multiLingle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data['multi_data'] = null;
        $data['language'] = null;
        $data['language'] = Language::where('id', $request->language_id)->get()->first();

        if ($request->multi_criteria == "categories") {
            $data['multi_data'] = MultiLingleController::getCategory($id, $request->language_id);
            return view('management.multilingle.category_edit', $data);
        } else if ($request->multi_criteria == "blog") {
            $data['multi_data'] = MultiLingleController::blogPost($id, $request->language_id);
            return view('management.multilingle.blog_edit', $data);
        } else if ($request->multi_criteria == "testimonials") {
            $data['multi_data'] = MultiLingleController::getTestimonial($id, $request->language_id);
            return view('management.multilingle.testimonial_edit', $data);
        } else if ($request->multi_criteria == "hotel") {
            $data['countries'] = country::get();
            $data['multi_data'] = MultiLingleController::getHotel($id, $request->language_id);
            return view('management.multilingle.hotel_edit', $data);
        } else if ($request->multi_criteria == "package") {
            $data['cate'] = categories::leftJoin('category_details', 'categories.id', '=', 'category_details.category_id')
                ->where('categories.reference_type', 'package')
                ->select('categories.id', 'category_details.title')
                ->get();
            $data['multi_data'] = MultiLingleController::getPackage($id, $request->language_id);
            $data['hotel'] = HotelPackage::get();
            $data['countries'] = country::get();
            $data['highlights'] = Highlights::where('package_id',$id)->get();
            $data['itinerary'] = Itinerary::where('package_id', $id)->get()->first();
            $data['itinerary_detail'] = ItineraryDetail::where('itinerary_id',$data['itinerary']->id)->get();
            $data['inclusion_exclusion'] = InclusionsExclusions::where('package_id', $id)->get()->first();
            $data['faqs'] = FAQs::where('package_id',$id)->get();
            return view('management.multilingle.package_edit', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MultiLingle $multiLingle
     * @return \Illuminate\Http\Response
     */
    public function edit(MultiLingle $multiLingle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MultiLingle $multiLingle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->multi_criteria == "categories") {
            $data = CategoryDetail::where('category_id', $id)->where('language_id', $request->language_id)->delete();
            CategoryDetail::create([
                'title' => $request->title,
                'category_id' => $id,
                'language_id' => $request->language_id,
                'description' => $request->description,
            ]);
        } else if ($request->multi_criteria == "blog") {
            $data = BlogDetail::where('blog_id', $id)->where('language_id', $request->language_id)->delete();
            BlogDetail::create([
                'title' => $request->title,
                'blog_id' => $id,
                'language_id' => $request->language_id,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);
        } else if ($request->multi_criteria == "testimonials") {
            $data = TestimonialDetail::where('testimonial_id', $id)->where('language_id', $request->language_id)->delete();
            TestimonialDetail::create([
                'testimonial_id' => $id,
                'language_id' => $request->language_id,
                'title' => $request->title,
                'description' => $request->description,
                'comment' => $request->comment,
            ]);
        } else if ($request->multi_criteria == "hotel") {
            $data = HotelDetail::where('hotel_id', $id)->where('language_id', $request->language_id)->delete();
            HotelDetail::create([
                'hotel_id' => $id,
                'language_id' => $request->language_id,
                'title' => $request->title,
                'country' => $request->country,
                'city' => $request->city,
                'description' => $request->description,
                'address' => $request->address,
            ]);
        }
        else if ($request->multi_criteria == "package") {
            $data = PackageDetail::where('package_id', $id)->where('language_id', $request->language_id)->delete();
            PackageDetail::create([
                'package_id' => $id,
                'language_id' => $request->language_id,
                'title' => $request->title,
                'country' => $request->country,
                'city' => $request->city,
                'description' => $request->description,
            ]);
            MultiLingleController::highlightsData($request,$id);
            MultiLingleController::itineraryData($request,$id);
            MultiLingleController::inclusionsExclusionsData($request,$id);
            MultiLingleController::faqsData($request,$id);
        }
        return redirect()->back()->with('success', 'Language Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MultiLingle $multiLingle
     * @return \Illuminate\Http\Response
     */
    public function destroy(MultiLingle $multiLingle)
    {
        //
    }

    public function getCategory($id, $lang_id)
    {
        $already = CategoryDetail::where('category_id', $id)->where('language_id', $lang_id)->first();
        $data = categories::Leftjoin('category_details', 'categories.id', '=', 'category_details.category_id');
        if ($already != null) {
            $data = $data->where('categories.id', $id)->where('category_details.language_id', $lang_id);
        } else {
            $data = $data->where('categories.id', $id)->where('category_details.language_id', DefaultLanguage::SelectedLanguage()->id);
        }
        $data = $data->select('categories.id', 'category_details.language_id', 'category_details.title', 'category_details.description')->get()->first();
        return $data;
    }

    public function blogPost($id, $lang_id)
    {
        $already = BlogDetail::where('blog_id', $id)->where('language_id', $lang_id)->first();
        $data = blog::Leftjoin('blog_details', 'blogs.id', '=', 'blog_details.blog_id');
        if ($already != null) {
            $data = $data->where('blogs.id', $id)->where('blog_details.language_id', $lang_id);
        } else {
            $data = $data->where('blogs.id', $id)->where('blog_details.language_id', DefaultLanguage::SelectedLanguage()->id);
        }
        $data = $data->select('blogs.id', 'blog_details.language_id', 'blog_details.title', 'blog_details.short_description', 'blog_details.long_description')->get()->first();
        return $data;
    }

    public function getTestimonial($id, $lang_id)
    {
        $already = TestimonialDetail::where('testimonial_id', $id)->where('language_id', $lang_id)->first();
        $data = Testimonial::Leftjoin('testimonial_details', 'testimonials.id', '=', 'testimonial_details.testimonial_id');
        if ($already != null) {
            $data = $data->where('testimonials.id', $id)->where('testimonial_details.language_id', $lang_id);
        } else {
            $data = $data->where('testimonials.id', $id)->where('testimonial_details.language_id', DefaultLanguage::SelectedLanguage()->id);
        }
        $data = $data->select('testimonials.id', 'testimonial_details.language_id', 'testimonial_details.title', 'testimonial_details.description', 'testimonial_details.comment')->get()->first();
        return $data;
    }

    public function getHotel($id, $lang_id)
    {
        $already = HotelDetail::where('hotel_id', $id)->where('language_id', $lang_id)->first();
        $data = HotelPackage::Leftjoin('hotel_details', 'hotel_packages.id', '=', 'hotel_details.hotel_id');
        if ($already != null) {
            $data = $data->where('hotel_packages.id', $id)->where('hotel_details.language_id', $lang_id);
        } else {
            $data = $data->where('hotel_packages.id', $id)->where('hotel_details.language_id', DefaultLanguage::SelectedLanguage()->id);
        }
        $data = $data->select('hotel_packages.id', 'hotel_details.language_id', 'hotel_details.title', 'hotel_details.country', 'hotel_details.city', 'hotel_details.description', 'hotel_details.address')->get()->first();
        return $data;
    }
    public function getPackage($id, $lang_id)
    {
        $already = PackageDetail::where('package_id', $id)->where('language_id', $lang_id)->first();
        $data = Package::Leftjoin('package_details', 'packages.id', '=', 'package_details.package_id');
        if ($already != null) {
            $data = $data->where('packages.id', $id)->where('package_details.language_id', $lang_id);
        } else {
            $data = $data->where('packages.id', $id)->where('package_details.language_id', DefaultLanguage::SelectedLanguage()->id);
        }
        $data = $data->select('packages.id', 'packages.category_id','packages.hotel_id','package_details.language_id', 'package_details.title', 'package_details.country', 'package_details.city', 'package_details.description')->get()->first();
        return $data;
    }
    public function itineraryData(Request $request,$id)
    {
        $itinerary = [
            'package_id' => $id,
        ];
        $data_itinerary = Itinerary::create($itinerary);
        $i = 0;
        foreach ($request->itinerary_name as $data)
        {
            $itinerary_detail = [
                'itinerary_id' => $data_itinerary->id,
                'language_id' => $request->language_id,
                'itinerary_name' => $data,
                'itinerary_description' => $request->itinerary_description[$i],
            ];
            $detail_itinerary = ItineraryDetail::create($itinerary_detail);
            $i++;
        }
    }
    public function highlightsData(Request $request, $id)
    {
        foreach ($request->highlights as $value) {
            $highlights = [
                'package_id' => $id,
                'language_id' => $request->language_id,
                'highlights' => $value,
            ];
            Highlights::create($highlights);
        }
    }
    public function inclusionsExclusionsData(Request $request, $id)
    {
        $inclusions_exclusion = [
            'package_id' => $id,
            'language_id' => $request->language_id,
            'inclusions' => $request->inclusions,
            'exclusions' => $request->exclusions,
        ];
        InclusionsExclusions::create($inclusions_exclusion);
    }
    public function faqsData(Request $request, $id)
    {
        $i=0;
        foreach ($request->faqs_question as $value) {
            $faqs = [
                'package_id' => $id,
                'language_id' => $request->language_id,
                'faqs_question' => $value,
                'faqs_answer' => $request->faqs_answer[$i],
            ];
            FAQs::create($faqs);
            $i++;
        }
    }
}
