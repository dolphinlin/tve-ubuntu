<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

use App\Post;
use App\Filter;

use App\User;
use App\Postfiles;
use File;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Post::orderBy('id', 'DESC')->get();
        $filters = Filter::all();
        return view('post.index', compact('query', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Auth::check()){
            $v = Validator::make($request->all(),[
                    'title' => 'required|max:255',
                    'content' => 'required',
                    'filter' => 'required',
                ]);

            if ($v->fails()) {
                $messages = $v->messages();
            }else{
                $po = Post::create(['title' => $request->title, 'content' => $request->content, 'filter' => $request->filter]);
                if ($request->hasFile('files')) {
                  $files = Input::file('files');
                  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                  if(is_array($files) && !empty($files)){
                    foreach($files as $file) {
                      $validator = Validator::make(array('file'=> $file), $rules);
                      if(!$validator->passes()){
                        return '檔案上傳失敗';
                      }
                    }
                    foreach($files as $file) {
                      $destinationPath = 'uploads/annex';
                      $dt = date('YmdHis');
                      $filename = $dt . rand(11111,99999) . $file->getClientOriginalName();
                      $upload_success = $file->move($destinationPath, $filename);
                      Postfiles::create(['postid' => $po->id, 'path' => $filename ]);
                    }
                    Session::flash('success', 'Upload successfully');
                  }else{
                    return '檔案上傳失敗';
                  }
                }
                $messages = "Create successfully!";
            }
            return redirect('admin');
        }else{
            return response()->json([
                'error' => 'Permission Denied.'
            ], 401);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $query = Post::find($id);
        return response()->json($query, 200, [], JSON_NUMERIC_CHECK );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::check()) {
            $p = Post::find($id);
            $filters = Filter::all();
            if (!is_null($p)) {
                return View('admin.news.edit', compact('p', 'filters'));
            }else{
                return 'error';
            }
        }else{
            return response()->json([
                'error' => 'Permission Denied.'
            ], 401);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (Auth::check()) {
          $p = Post::find($id);
          $p->title = $request->title;
          $p->content = $request->content;
          $p->filter = $request->filter;

          //delete file form db and public/uploads
          if ($request->delFile || $request->hasFile('files')) {
            $allFile = Postfiles::where('postid', $id)->get();
            foreach ($allFile as $f) {
              File::delete('uploads/annex/' . $f->path);
            }
            Postfiles::where('postid', $id)->delete();
            if ($request->hasFile('files')) {
              $files = Input::file('files');
              $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
              if(is_array($files) && !empty($files)){
                foreach($files as $file) {
                  $validator = Validator::make(array('file'=> $file), $rules);
                  if(!$validator->passes()){
                    return '檔案上傳失敗';
                  }
                }
                foreach($files as $file) {
                  $destinationPath = 'uploads/annex';
                  $dt = date('YmdHis');
                  $filename = $dt . rand(11111,99999) . $file->getClientOriginalName();
                  $upload_success = $file->move($destinationPath, $filename);
                  Postfiles::create(['postid' => $id, 'path' => $filename ]);
                }
                Session::flash('success', 'Upload successfully');
              }else{
                return '檔案上傳失敗';
              }
            }
          }


          $p->save();
          $p->push();
          Session::flash('success', 'Upload successfully');
          return redirect('admin');
        }else{
          return response()->json([
              'error' => 'Permission Denied.'
          ], 401);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::check()) {
            $p = Post::where('id', $id)->delete();
            return redirect('admin');
        }else{
            return redirect('/');
        }

    }

    public function admin(){
        if (Auth::check()) // here checking by slug. You can pass an id or slug
        {
            $query = Post::select('id', 'title', 'filter', 'created_at')->orderBy('id', 'DESC')->get();
            $filters = Filter::all();
            return view('admin.news.index', compact('query', 'filters'));
        }else{
            return redirect('login');
        }
    }

    public function all()
    {
        $query = Post::select('id', 'title', 'filter', 'created_at')->orderBy('id', 'DESC')->paginate(10);
        $filters = Filter::all();

        return response()->json($query, 200, [], JSON_NUMERIC_CHECK);
    }
    public function test()
    {
        $posts = Post::paginate(10);
        return $posts;
    }
}
