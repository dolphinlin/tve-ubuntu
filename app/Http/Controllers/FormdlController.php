<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

use App\Formdl;
use App\FormFilter;
use Auth;

class FormdlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $q = Formdl::all();
      return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
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
        if (Auth::check()) {
          $v = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'name' => 'required',
            'url' => 'required',
            'filter' => 'required',
          ]);
          if ($v->passes()) {
            Formdl::create($request->all());
          }
          return redirect('admin/res/new');
          # code...
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
        $q = Formdl::find($id);
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
      if (Auth::check()) {
          $p = Formdl::find($id);
          $filters = FormFilter::all();
          if (!is_null($p)) {
              return View('admin.res.edit', compact('p', 'filters'));
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
          $f = Formdl::find($id);
          $f->title = $request->title;
          $f->name = $request->name;
          $f->url = $request->url;
          $f->filter = $request->filter;

          $f->save();
          return redirect('admin/res');
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
      if (Auth::check()) {
          $p = Formdl::where('id', $id)->delete();
          return redirect('admin/res');
      }else{
        return response()->json([
            'error' => 'Permission Denied.'
        ], 401);
      }
    }

    public function all()
    {
      $q = Formdl::all();
      return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
    }
    public function formfilter()
    {
      $q = FormFilter::all();
      return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
    }
}
