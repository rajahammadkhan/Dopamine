<?php

namespace App\Http\Controllers\Management;

use App\Helpers\DefaultLanguage;
use App\Http\Controllers\Controller;
use App\Models\Holidays;
use App\Models\Language;
use App\Models\media;
use Illuminate\Http\Request;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays=Holidays::leftJoin('media', function ($join) {
            $join->on('holidays.id', '=', 'media.reference_id');
        })
            ->where('media.reference_type', '=', 'holidays')
            ->where('holidays.language_id', DefaultLanguage::SelectedLanguage()->id)
            ->select('holidays.id', 'holidays.*','media.image')
            ->get();
        return view('management/holidays/index',compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = DefaultLanguage::SelectedLanguage();
        return view('management/holidays/create', compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);
        $data = [
            'language_id' => $request->language_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ];
        $holidays = Holidays::create($data);
        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'holidays' . time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = null;
        }
        $multi_image =
            [
                'reference_id' => $holidays->id,
                'reference_type' => 'holidays',
                'image' => $main_file,
            ];
        $multi = media::create($multi_image);
        return redirect()->back()->with('success', 'Holidays Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $holidays = Holidays::where('id', $id)->get()->first();
        $language = Language::where('id', $holidays->language_id)->get()->first();
        $media = media::where('reference_id', $id)->where('reference_type', 'holidays')->get()->first();
        return view('management/holidays/edit', compact('language','holidays','media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function edit(Holidays $holidays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $holidays = Holidays::where('id', $id)->get()->first();
        $multi = media::where('reference_id', $id)->where('reference_type', 'holidays')->get()->first();
        $holidays->update([
            'language_id' => $request->language_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        if ($request->file('image')) {
            $mainext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'holidays' . time() . rand(1000, 14000000000) . '.' . $mainext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = $multi->image;
        }

        if ($multi != null) {
            $multi->update([
                'image' => $main_file,
            ]);
        } else {
            $multi_image =
                [
                    'reference_id' => $id,
                    'reference_type' => 'holidays',
                    'image' => $main_file,
                ];

            media::create($multi_image);

        }
        return redirect()->back()->with('success', 'Holidays Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holidays = SafeHolidays::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Holidays deleted successfully');
    }
}
