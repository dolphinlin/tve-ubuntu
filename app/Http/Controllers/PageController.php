<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PageInfo;


class PageController extends Controller
{
    public function calendar()
    {
        $c = PageInfo::where('title', 'calendar')->first();
        return response()->json($c, 200, [], JSON_NUMERIC_CHECK);
    }
}
