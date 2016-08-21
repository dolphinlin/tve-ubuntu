<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\FormFilter;
use App\Formdl;
use Auth;

class FormFilterController extends Controller
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
          'title' => 'required|max:255',
        ]);
        if ($v->passes()) {
          FormFilter::create($request->all());
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
        $q = FormFilter::find($id);
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
          $q = FormFilter::find($id);
          $f->update($request->all());
          return redirect('admin/res/new');
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
            $affectedRows = Formdl::where('filter', $id)->update(['filter' => 1]);
            $p = FormFilter::where('id', $id)->delete();
            //change original filter to 1(other)
            return response()->json(['info' => 'success'], 200);
        }else{
          return response()->json([
              'error' => 'Permission Denied.'
          ], 401);
        }
    }
}
