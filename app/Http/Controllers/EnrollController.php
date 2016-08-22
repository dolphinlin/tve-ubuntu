<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Enroll;
use Auth;

class EnrollController extends Controller
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
          'title' => 'required',
          'url' => 'required',
          'type' => 'required',
        ]);
        if ($v->passes()) {
          Enroll::create($request->all());
        }
        return redirect('admin/enroll/new');
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
        $q = Enroll::find($id);
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
      if (Auth::check()) {
          $f = Enroll::find($id);
          $f->update($request->all());
          return redirect('admin/enroll');
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
          $$affectedRows = Enroll::where('id', $id)->delete();
          return redirect('admin/enroll');
      }else{
        return response()->json([
            'error' => 'Permission Denied.'
        ], 401);
      }
    }
    public function doctor()
    {
        $q = Enroll::where('type', 1)->paginate(10);
        return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
    }
    public function master()
    {
        $q = Enroll::where('type', 2)->paginate(10);
        return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
    }
    public function nightclass()
    {
        $q = Enroll::where('type', 3)->paginate(10);
        return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
    }
    public function exam()
    {
        $q = Enroll::where('type', 4)->paginate(10);
        return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
    }
}
