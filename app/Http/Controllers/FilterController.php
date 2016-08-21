<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Filter;

use Auth;
use App\User;
use App\Post;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $filters = Filter::where('id', '!=', 999)->get();
        return response()->json($filters);
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
                    'subclass' => 'required|max:255',
                ]);

            if ($v->fails()) {
                $messages = $v->messages();
            }else{
                Filter::create($request->all());
                $messages = "Create successfully!";
            }
            return redirect('admin/newpost');
        }else{
            return response()->json([
                'error' => 'Cant excute the action.'
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
        $q = Filter::find($id);
        return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
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
            $p = Filter::find($id);
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
            $f = Filter::find($id);
            $f->subclass = $request->title;
            $f->save();
            return redirect('admin/newpost');
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
        if (Auth::check() && $id != 1) {
            $affectedRows = Post::where('filter', $id)->update(['filter' => 1]);
            $p = Filter::where('id', $id)->delete();
            //change original filter to 1(other)
            return redirect('admin/newpost');
        }else{
          return response()->json([
              'error' => 'Permission Denied.'
          ], 401);
        }
    }
}
