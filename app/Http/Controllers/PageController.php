<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PageInfo;

use Illuminate\Support\Facades\Validator;

use Auth;


class PageController extends Controller
{
    public function calendar()
    {
        $c = PageInfo::where('type', 'calendar')->first();
        return response()->json($c, 200, [], JSON_NUMERIC_CHECK);
    }
    public function carousel()
    {
      $query = PageInfo::where('type', 'carousel')->get();
      return response()->json($query, 200, [], JSON_NUMERIC_CHECK);
    }
    public function calendarUpdate(Request $request)
    {
      if (Auth::check()) {
        $q = PageInfo::where('title', 'calendar')->update(['url' => $request->url]);
        return redirect('admin/calendar');
        # code...
      }else{
        return response()->json([
            'error' => 'Permission Denied.'
        ], 401);
      }
    }
    public function carouselCreate(Request $request)
    {
      if (Auth::check()) {
        $v = Validator::make($request->all(),[
          'url' => 'required',
          'title' => 'required',
        ]);
        if ($v->passes()) {
          // array_push
          $arr = $request->all();
          $arr['type'] = 'carousel';
          PageInfo::create($arr);
        }
        return redirect('admin/carousel');
        # code...
      }else{
        return response()->json([
            'error' => 'Permission Denied.'
        ], 401);
      }
    }
}
