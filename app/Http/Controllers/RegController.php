<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use Auth;
use App\Reg;
use App\RegFilter;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      if (Auth::check()) {
        $v = Validator::make($request->all(),[
          'name' => 'required',
          'day' => 'required',
          'number' => 'required',
          'url' => 'required',
          'filter' => 'required',
        ]);
        if ($v->passes()) {
          Reg::create($request->all());
        }
        return redirect('admin/reg/new');
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
        $q = Reg::find($id);
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
          $p = Reg::find($id);
          $filters = RegFilter::all();
          if (!is_null($p)) {
              return View('admin.reg.edit', compact('p', 'filters'));
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
          $q = Reg::find($id);
          $q->update($request->all());
          return redirect('admin/reg');
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
        $q = Reg::find($id)->delete();
        return redirect('admin/reg');
      }else{
        return response()->json([
            'error' => 'Permission Denied.'
        ], 401);
      }
    }
    public function all()
    {
        $q = Reg::all();
        return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
    }
    public function filters()
    {
      $q = RegFilter::all();
      return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
    }
}
