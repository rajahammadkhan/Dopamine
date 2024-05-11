<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\CategoryDetail;
use App\Models\Language;
use App\Models\Product;
use App\Models\coupon;
use App\Models\media;
use App\Helpers\DefaultLanguage;
use App\Models\ProductInCategory;
use App\Models\store;
use App\Models\seo;
use Illuminate\Http\Request;
use Route;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['type'])) {

            $category = categories::leftJoin('media', function ($join) {
                $join->on('categories.id', '=', 'media.reference_id');
            })
                ->leftjoin('category_details', function ($join) {
                    $join->on('categories.id', '=', 'category_details.category_id');
                })
                ->where('category_details.language_id', DefaultLanguage::SelectedLanguage()->id)
                ->where('categories.reference_type', base64_decode($_GET['type']))
                ->where('media.reference_type', '=', 'categories')
                ->select('categories.id', 'categories.reference_type', 'categories.slug', 'categories.parent_category', 'categories.status', 'category_details.title', 'category_details.description', 'category_details.language_id', 'media.image')
                ->get();
            return view('management/categories/index', compact('category'));
        } else {
            return abort('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        if (isset($_GET['type'])) {
            $cate = categories::leftJoin('category_details', 'categories.id', '=', 'category_details.category_id')
                ->select('categories.*', 'category_details.title')
                ->get();
            $language = DefaultLanguage::SelectedLanguage();
            return view('management/categories/create', compact('cate', 'language'));
        } else {
            return abort('404');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->image;
        $category_type = base64_decode($_GET['type']);
        if (isset($_GET['type'])) {
            if ($request->file('image')) {
                $mainext = $request->file('image')->getClientOriginalExtension();
                $main_file = 'categories' . time() . rand(1000, 14000000000) . '.' . $mainext;
                $request->image->move(public_path('images/media'), $main_file);
            } else {
                $main_file = null;
            }
            $category_type = base64_decode($_GET['type']);
            $data = [
                'title' => $request->title,
                'user_id' => $request->user_id,
                'reference_type' => $category_type,
                'parent_category' => $request->parent_category,
                'status' => $request->status,
            ];
            $categories = categories::create($data);
            $category = [
                'title' => $request->title,
                'category_id' => $categories->id,
                'language_id' => $request->language_id,
                'description' => $request->description,
            ];
            $categorydetail = CategoryDetail::create($category);
            $multi_image =
                [
                    'reference_id' => $categories->id,
                    'reference_type' => 'categories',
                    'image' => $main_file,
                ];
            $multi = media::create($multi_image);
            $seo = [
                'reference_id' => $categories->id,
                'language_id' => $request->language_id,
                'meta_title' => $request->meta_title,
                'reference_type' => $category_type,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ];
            $search = seo::create($seo);
            return redirect()->back()->with('success', 'Category Created successfully');

        } else {
            return abort('404');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\categories $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories, $id)
    {

        $multi = media::where('reference_id', $id)->where('reference_type', 'categories')->get()->first();
        $category = categories::where('id', $id)->get()->first();
        $categoryDetail = CategoryDetail::where('category_id', $id)->get()->first();
        $all_category = categories::leftJoin('category_details', 'categories.id', '=', 'category_details.category_id')
            ->select('categories.*', 'category_details.title')
            ->get();
        $language = Language::where('id', $categoryDetail->language_id)->get()->first();
        $seo = seo::where('reference_id', $category->id)->get()->first();
        return view('management/categories/edit', compact('category', 'language', 'multi', 'seo', 'all_category', 'categoryDetail'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\categories $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\categories $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $multi = media::where('reference_id', $id)->where('reference_type', 'categories')->get()->first();
        $categories = categories::where('id', $id)->get()->first();
        $categoryDetail = CategoryDetail::where('category_id', $id)->get()->first();
        $category_type = base64_decode($_GET['type']);
        if ($request->file('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $main_file = 'categories' . time() . rand(1000, 14000000000) . '.' . $ext;
            $request->image->move(public_path('images/media'), $main_file);
        } else {
            $main_file = $multi->image;
        }
        $categories->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'reference_type' => $category_type,
            'parent_category' => $request->parent_category,
        ]);

        $categoryDetail->update([
            'title' => $request->title,
            'category_id' => $categories->id,
            'language_id' => $request->language_id,
            'description' => $request->description,
        ]);

        $seo = seo::where('reference_id', $categories->id)->get()->first();
        $seo->update([
            'reference_id' => $categories->id,
            'language_id' => $request->language_id,
            'meta_title' => $request->meta_title,
            'reference_type' => $category_type,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        if ($multi != null) {
            $multi->update([
                'image' => $main_file,
            ]);
        } else {
            $multi_image =
                [
                    'reference_id' => $id,
                    'reference_type' => 'categories',
                    'image' => $main_file,
                ];
            media::create($multi_image);
        }
        return redirect()->back()->with('success', 'Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\categories $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = categories::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');

    }

}

