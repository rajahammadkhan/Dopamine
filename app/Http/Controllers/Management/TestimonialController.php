<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;

use App\Helpers\DefaultLanguage;
use App\Models\Language;
use App\Models\seo;
use App\Models\Testimonial;
use App\Models\TestimonialDetail;
use App\Models\media;
use Illuminate\Http\Request;
use PHPUnit\Util\Test;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if(!auth()->user()->hasPermissionTo('testimonial-list')){
//            return abort(401);
//        }
        $data = Testimonial::leftJoin('media', function ($join) {
            $join->on('testimonials.id', '=', 'media.reference_id');
        })
            ->leftJoin('testimonial_details', function ($join) {
                $join->on('testimonials.id', '=', 'testimonial_details.testimonial_id');
            })
            ->where('testimonial_details.language_id', DefaultLanguage::SelectedLanguage()->id)
            ->where('media.reference_type', '=', 'testimonial')
            ->select('testimonials.id', 'testimonial_details.title', 'testimonial_details.description', 'testimonial_details.comment', 'testimonials.status', 'testimonials.orderby', 'media.image')
            ->get();

        return view('management/testimonial/index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if(!auth()->user()->hasPermissionTo('testimonial-create')){
//            return abort(401);
//        }
        $language = DefaultLanguage::SelectedLanguage();
        return view('management/testimonial/create', compact('language'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        if(!auth()->user()->hasPermissionTo('testimonial-create')){
//            return abort(401);
//        }
//        $validatedData = $request->validate([
//            'image' => 'required',
//
//        ]);
        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'testimonial' . time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = null;
        }
        $image_url = asset('images/media/' . $main_file);
        $data = [
            'user_id' => $request->user_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'orderby' => $request->orderby,
            'status' => $request->status,
        ];
        $slider = Testimonial::create($data);
        $dataa = [
            'testimonial_id' => $slider->id,
            'language_id' => $request->language_id,
            'title' => $request->title,
            'description' => $request->description,
            'comment' => $request->comment,
        ];
        $sliders = TestimonialDetail::create($dataa);
        $multi_image =
            [
                'reference_id' => $slider->id,
                'reference_type' => 'testimonial',
                'image' => $main_file,
            ];
        $multi = media::create($multi_image);
        return redirect()->back()->with('success', 'Testimonial added successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\country $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::where('id', $id)->get()->first();
        $testimonial_detail = TestimonialDetail::where('testimonial_id', $id)->get()->first();
        $language = Language::where('id', $testimonial_detail->language_id)->get()->first();
        $media = media::where('reference_id', $id)->where('reference_type', 'testimonial')->get()->first();
        return view('management/testimonial/edit', compact('testimonial', 'testimonial_detail', 'language', 'media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\country $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
//        if(!auth()->user()->hasPermissionTo('testimonial-edit')){
//            return abort(401);
//        }
//        $data['media'] = array();
//        $data = array();


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\country $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        if(!auth()->user()->hasPermissionTo('testimonial-edit')){
//            return abort(401);
//        }
        $testimonial_detail = TestimonialDetail::where('testimonial_id', $id)->get()->first();
        $pages = Testimonial::where('id', $id)->get()->first();
        $multi = media::where('reference_id', $id)->where('reference_type', 'testimonial')->get()->first();
        if ($request->file('image')) {

            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'testimonial' . time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = $multi->image;
        }

        $pages->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'orderby' => $request->orderby,
            'status' => $request->status,
        ]);
        $testimonial_detail->update([
            'testimonial_id' => $pages->id,
            'language_id' => $request->language_id,
            'title' => $request->title,
            'description' => $request->description,
            'comment' => $request->comment,
        ]);

        if ($multi != null) {
            $multi->update([
                'image' => $main_file,
            ]);
        } else {
            $multi_image =
                [
                    'reference_id' => $id,
                    'reference_type' => 'testimonial',
                    'image' => $main_file,
                ];

            media::create($multi_image);

        }

        return redirect()->back()->with('success', 'Pages Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        if(!auth()->user()->hasPermissionTo('testimonial-delete')){
//            return abort(401);
//        }
        $slider = Testimonial::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully');

    }

//    public function theme_setting_fields(Request $request)
//    {
//        $data = [
//            'title' => $request->title,
//            'type' => $request->type,
//            'option_key' => $request->option_key,
//            'input_type' => $request->input_type,
//            'input_type_key' => json_encode($request->input_type_key),
//
//        ];
//        DB::table('settings')->insert($data);
//        return redirect()->back()->with('success', 'Settings Fields Created Successfully');
//
//    }
}
