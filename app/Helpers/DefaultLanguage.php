<?php

namespace App\Helpers;

use App\Models\Language;
use Request;

class DefaultLanguage
{
    public static function SelectedLanguage()
    {
        $data = Language::where('bydefault', 1)->get()->last();
        return $data;
    }

    public static function AllLanguage()
    {
        $all_language = Language::where('status', 1)->get();
        return $all_language;
    }

    public static function GetSegment($request)
    {
        $segment = $request->segment(1);
        $get_language = Language::where('status', 1)->where('language_code', $segment)->get()->last();
        if ($get_language != null) {
            return $get_language;
        } else {
            $get_language = Language::where('bydefault', 1)->get()->last();
            return $get_language;
        }
    }
    public static function CurrentSegment($route=null,$function=null)
    {
        $segment=Request::segment(1);
        $get_language = Language::where('status', 1)->where('language_code', $segment)->pluck('language_code')->toArray();

        if (in_array($segment,$get_language)) {
            return url('/').'/'.$segment.'/'.$route.'/'.$function;
        } else {
            return url('/').'/'.$route.'/'.$function;
        }
    }
}
