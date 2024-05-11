<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\country;
use App\Models\FAQs;
use App\Models\Highlights;
use App\Models\HotelPackage;
use App\Models\InclusionsExclusions;
use App\Models\Itinerary;
use App\Models\ItineraryDetail;
use App\Models\Language;
use App\Models\media;
use App\Models\Package;
use App\Models\PackageDetail;
use App\Helpers\DefaultLanguage;
use App\Models\seo;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['package'] = Package::get();
        $data['media'] = media::where('reference_type', 'package')->get()->groupBy('reference_id');
        return view('management.package.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = categories::leftJoin('category_details', 'categories.id', '=', 'category_details.category_id')
            ->where('categories.reference_type', 'package')
            ->select('categories.id', 'category_details.title')
            ->get();
        $countries = country::get();
        $hotel = HotelPackage::get();
        $language = DefaultLanguage::SelectedLanguage();
        return view('management.package.create', compact('hotel','countries', 'language', 'cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);
        $data = [
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'hotel_id' => json_encode($request->hotel_id),
            'title' => $request->title,
            'status' => $request->status,
            'select_package' => $request->select_package,
        ];
        $package = Package::create($data);

        $value = [
            'package_id' => $package->id,
            'language_id' => $request->language_id,
            'title' => $request->title,
            'country' => $request->country,
            'city' => $request->city,
            'description' => $request->description,
        ];
        $packagedetail = PackageDetail::create($value);

        if ($request->file('image')) {
            foreach ($request->file('image') as $image) {
                $mainext = $image->getClientOriginalExtension();
                $main_file = 'package' . time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/media'), $main_file);
                $multi_image =
                    [
                        'reference_id' => $package->id,
                        'reference_type' => 'package',
                        'image' => $main_file,
                    ];
                $multi = media::create($multi_image);
            }
        } else {
            $multi = null;
        }
        $seo = [
            'reference_id' => $package->id,
            'language_id' => $request->language_id,
            'reference_type' => 'package',
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];
        seo::create($seo);
        PackageController::highlightsData($request, $package->id);
        PackageController::itineraryData($request,$package->id);
        PackageController::inclusionsExclusionsData($request, $package->id);
        PackageController::faqsData($request, $package->id);
        return redirect()->back()->with('success', 'Package Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['cate'] = categories::leftJoin('category_details', 'categories.id', '=', 'category_details.category_id')
            ->where('categories.reference_type', 'package')
            ->select('categories.id', 'category_details.title')
            ->get();
        $data['hotel'] = HotelPackage::get();
        $data['countries'] = country::get();
        $data['package'] = Package::where('id', $id)->get()->first();
        $data['package_detail'] = PackageDetail::where('package_id', $id)->get()->first();
        $data['highlights'] = Highlights::where('package_id', $id)->get();
        $data['itinerary'] = Itinerary::where('package_id', $id)->get()->first();
        $data['itinerary_detail'] = ItineraryDetail::where('itinerary_id',$data['itinerary']->id)->get();
        $data['inclusion_exclusion'] = InclusionsExclusions::where('package_id', $id)->get()->first();
        $data['faqs'] = FAQs::where('package_id',$id)->get();
        $data['language'] = Language::where('id',$data['package_detail']->language_id)->get()->first();
        $data['media'] = media::where('reference_id',$id)->where('reference_type', 'package')->get();
        $data['media_iter'] = media::where('reference_id',$data['itinerary']->id)->where('reference_type', 'itinerary')->get();
        $data['seo'] = seo::where('reference_id',$id)->where('reference_type', 'package')->get()->first();
        return view('management/package/edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $package = Package::where('id', $id)->get()->first();
        $package_detail = PackageDetail::where('package_id', $id)->get()->first();
        $seo = seo::where('reference_id',$id)->where('reference_type', 'package')->get()->first();
        $highlights = Highlights::where('package_id', $id)->delete();
        $itinerary = Itinerary::where('package_id', $id)->get()->first();
        $inclusion_exclusion = InclusionsExclusions::where('package_id', $id)->delete();
        $faqs = FAQs::where('package_id',$id)->delete();
        $media = media::where('reference_id',$id)->where('reference_type', 'package')->delete();
        $media_iter = media::where('reference_id',$itinerary->id)->where('reference_type', 'itinerary')->delete();
        $iti = Itinerary::where('package_id', $id)->delete();
        $package->update([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'hotel_id' => json_encode($request->hotel_id),
            'title' => $request->title,
            'status' => $request->status,
            'select_package' => $request->select_package,
        ]);

        $package_detail->update([
            'package_id' => $id,
            'language_id' => $request->language_id,
            'title' => $request->title,
            'country' => $request->country,
            'city' => $request->city,
            'description' => $request->description,
        ]);
        if ($request->file('image')) {
            foreach ($request->file('image') as $image) {
                $mainext = $image->getClientOriginalExtension();
                $main_file = 'package' . time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/media'), $main_file);
                $multi_image =
                    [
                        'reference_id' => $package->id,
                        'reference_type' => 'package',
                        'image' => $main_file,
                    ];
                $multi = media::create($multi_image);
            }
        } else {
            if ($request->image_update != null) {
                foreach ($request->image_update as $image) {
                    $multi_image =
                        [
                            'reference_id' => $package->id,
                            'reference_type' => 'package',
                            'image' => $image,
                        ];
                    $multi = media::create($multi_image);
                }
            }
        }
        $seo->update([
            'reference_id' => $package->id,
            'language_id' => $request->language_id,
            'reference_type' => 'package',
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        PackageController::highlightsData($request,$id);
        PackageController::itineraryData($request,$id);
        PackageController::inclusionsExclusionsData($request,$id);
        PackageController::faqsData($request,$id);
        return redirect()->back()->with('success', 'Package Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itinerary = Itinerary::where('package_id', $id)->get()->first();
        $media = media::where('reference_id',$id)->where('reference_type', 'package')->delete();
        $media_iter = media::where('reference_id',$itinerary->id)->where('reference_type', 'itinerary')->delete();
        $package = Package::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Package Delete successfully');
    }

    public function itineraryData(Request $request,$id)
    {
        $itinerary = [
            'package_id' => $id,
        ];
        $data_itinerary = Itinerary::create($itinerary);
        if ($request->file('itinerary_image')) {
            foreach ($request->file('itinerary_image') as $image) {
                $mainext = $image->getClientOriginalExtension();
                $main_file = 'itinerary' . time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/media'), $main_file);
                $multi_image =
                    [
                        'reference_id' => $data_itinerary->id,
                        'reference_type' => 'itinerary',
                        'image' => $main_file,
                    ];
                $multi = media::create($multi_image);
            }
        } else {
            if ($request->itinerary_update != null) {
                foreach ($request->itinerary_update as $image) {
                    $multi_image =
                        [
                            'reference_id' => $data_itinerary->id,
                            'reference_type' => 'itinerary',
                            'image' => $image,
                        ];
                    $multi = media::create($multi_image);
                }
            }
        }
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
