<?php

namespace App\Http\Controllers\Management;

use App\Helpers\DefaultLanguage;
use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\HotelDetail;
use App\Models\HotelPackage;
use App\Models\Language;
use App\Models\media;
use App\Models\country;
use Illuminate\Http\Request;

class HotelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['hotelPackage'] = HotelPackage::get();
        $data['media'] = media::where('reference_type', 'hotel')->get()->groupBy('reference_id');
        return view('management.hotel.index', $data);
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
        $language = DefaultLanguage::SelectedLanguage();
        return view('management.hotel.create', compact('countries', 'language', 'cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $hotelPackage = [
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'hotel_type' => $request->hotel_type,
            'status' => $request->status,
        ];
        $hotel = HotelPackage::create($hotelPackage);
        $dataa = [
            'hotel_id' => $hotel->id,
            'language_id' => $request->language_id,
            'title' => $request->title,
            'country' => $request->country,
            'city' => $request->city,
            'description' => $request->description,
            'address' => $request->address,
        ];
        $sliders = HotelDetail::create($dataa);

        if ($request->file('image')) {
            foreach ($request->file('image') as $image) {
                $mainext = $image->getClientOriginalExtension();
                $main_file = 'hotel' . time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/media'), $main_file);
                $multi_image =
                    [
                        'reference_id' => $hotel->id,
                        'reference_type' => 'hotel',
                        'image' => $main_file,
                    ];
                $multi = media::create($multi_image);
            }
        } else {
            $multi = null;
        }
        return redirect()->back()->with('success', 'HotelPackage Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\HotelPackage $hotelPackage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate = categories::leftJoin('category_details', 'categories.id', '=', 'category_details.category_id')
            ->where('categories.reference_type', 'package')
            ->select('categories.id', 'category_details.title')
            ->get();
        $countries = country::get();
        $hotelPackage = HotelPackage::where('id', $id)->get()->first();
        $hotelDetail = HotelDetail::where('hotel_id', $id)->get()->first();
        $language = Language::where('id', $hotelDetail->language_id)->get()->first();
        $media = media::where('reference_id', $id)->where('reference_type', 'hotel')->get();
        return view('management/hotel/edit', compact('language', 'cate', 'hotelPackage', 'media', 'countries', 'hotelDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\HotelPackage $hotelPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelPackage $hotelPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelPackage $hotelPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $media = media::where('reference_id', $id)->where('reference_type', 'hotel')->delete();
        $hotelPackage = HotelPackage::where('id', $id)->get()->first();
        $hotelDetail = HotelDetail::where('hotel_id', $id)->get()->first();
        $hotelPackage->update([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'hotel_type' => $request->hotel_type,
            'status' => $request->status,
        ]);
        $hotelDetail->update([
            'hotel_id' => $hotelPackage->id,
            'language_id' => $request->language_id,
            'title' => $request->title,
            'country' => $request->country,
            'city' => $request->city,
            'description' => $request->description,
            'address' => $request->address,
        ]);

        if ($request->file('image')) {
            foreach ($request->file('image') as $image) {
                $mainext = $image->getClientOriginalExtension();
                $main_file = 'hotel' . time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/media'), $main_file);
                $multi_image =
                    [
                        'reference_id' => $hotelPackage->id,
                        'reference_type' => 'hotel',
                        'image' => $main_file,
                    ];
                $multi = media::create($multi_image);
            }
        } else {
            if ($request->image_update != null) {
                foreach ($request->image_update as $image) {
                    $multi_image =
                        [
                            'reference_id' => $hotelPackage->id,
                            'reference_type' => 'hotel',
                            'image' => $image,
                        ];
                    $multi = media::create($multi_image);
                }
            }
        }
        return redirect()->back()->with('success', 'HotelPackage Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\HotelPackage $hotelPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seos = HotelPackage::where('id', $id)->delete();
        return redirect()->back()->with('success', 'HotelPackage Deleted Successfully');
    }
}
