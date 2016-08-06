<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Formdl;
use App\FormFilter;
use App\Post;
use App\Filter;
use App\Netres;
use App\NetresFilter;
use App\Paper;
use App\PaperT;
use Illuminate\Support\Facades\Input;

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
		public function netres()
		{
			if (Auth::check()) {
				$query = Netres::all();
				$filters = NetresFilter::all();
				return view('admin.netres.index', compact('query', 'filters'));
			}else {
				return response()->json([
						'error' => 'Permission Denied.'
				], 401);
			}
		}
		public function newNr()
		{
			if (Auth::check()) {
				return view('admin.netres.newres');
			}else {
				return response()->json([
						'error' => 'Permission Denied.'
				], 401);
			}
		}
		public function paper()
		{
			if (Auth::check()) {
				$query = Paper::all();
				$qt = PaperT::all();
				return view('admin.paper.index', compact('query', 'qt'));
			}else {
				return response()->json([
						'error' => 'Permission Denied.'
				], 401);
			}
		}
		public function newPaper()
		{
			if (Auth::check()) {
				return view('admin.paper.new');
			}else {
				return response()->json([
						'error' => 'Permission Denied.'
				], 401);
			}
		}
		public function testGet()
		{
			$filters = FormFilter::where('id', 1)->get();
			return View('view.test', compact('filters'));
		}
		public function testPost()
		{
			$search = Input::get('search');
			return $search;
		}
}
