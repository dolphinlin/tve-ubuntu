<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Netres;
use App\NetresFilter;

use Auth;
use Illuminate\Support\Facades\Validator;

class NetresController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

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
          'name' => 'required|max:255',
          'url' => 'required',
          'filter' => 'required',
        ]);
        if ($v->passes()) {
          Netres::create($request->all());
        }
        return redirect('admin/netres/new');
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
      $q = Netres::find($id);
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
        $p = Netres::find($id);
        $filters = NetresFilter::all();
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
    if (Auth::check()) {
      $q = Netres::find($id);
      $q->update($request->all());
      return redirect('admin/netres/');
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
        $p = Netres::where('id', $id)->delete();
        return redirect('admin/netres');
    }else{
        return redirect('/');
    }
  }

  public function all()
  {
    $q = Netres::all();
    return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
  }
  public function filters()
  {
    $q = NetresFilter::all();
    return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
  }
}
