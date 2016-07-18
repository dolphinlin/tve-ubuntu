<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Formdl;
use App\FormFilter;
use App\Post;
use App\Filter;

class AdminController extends Controller
{
	public function index()
    {
        if (Auth::check()) {
            $query = Post::orderBy('id', 'DESC')->get();
            $filters = Filter::all();
            return view('post.index', compact('query', 'filters'));
        }else{
            return response()->json([
                'error' => 'Permission Denied.'
            ], 401);
        }

    }
    public function newPost()
    {
        if (Auth::check()) {
            return view('admin.news.newpost');
        }else{
            return response()->json([
                'error' => 'Permission Denied.'
            ], 401);
        }
    }
    public function newTc()
    {
        if (Auth::check()) {
            return view('admin.tc.newtc');
        }else{
            return response()->json([
                'error' => 'Permission Denied.'
            ], 401);
        }
    }
		public function formdata()
		{
				if (Auth::check()) {
					$query = Formdl::all();
					$filters = FormFilter::all();
					return view('admin.res.formdata', compact('query', 'filters'));
				}else {
					return response()->json([
							'error' => 'Permission Denied.'
					], 401);
				}
		}
		public function newFd()
		{
			if (Auth::check()) {
				return view('admin.res.newdata');
			}else {
				return response()->json([
						'error' => 'Permission Denied.'
				], 401);
			}

		}
		public function test()
		{
			$filters = FormFilter::all();
			return $filters;
		}
}
