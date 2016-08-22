<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Teacher;

use Auth;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = Teacher::select('id', 'name', 'title', 'sort')->orderBy('sort')->get();
        return response()->json($query, 200, [], JSON_NUMERIC_CHECK);
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
        $request->merge(['sort' => Teacher::all()->count() + 1]);
        if (Auth::check()) {
          $v = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'name' => 'required',
          ]);
          if ($v->passes()) {
            Teacher::create($request->all());
          }
          return redirect('admin/tc/new');
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
        $query = Teacher::find($id);
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
          $q = Teacher::find($id);
          return View('admin.tc.edit', compact('q'));
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
          $f = Teacher::find($id);
          $f->update($request->all());
          return redirect('admin/tc');
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
          $f = Teacher::find($id)->delete();
          return redirect('admin/tc');
      }else{
          return response()->json([
              'error' => 'Permission Denied.'
          ], 401);
      }
    }

    public function all()
    {
        $query = Teacher::select('id', 'name', 'title', 'sort')->orderBy('sort')->get();
        return response()->json($query, 200, [], JSON_NUMERIC_CHECK);
    }
    public function test()
    {
        return Teacher::count();
    }
    public function view()
    {
        if (Auth::check()) {
            $query = Teacher::select('id', 'name', 'title', 'sort')->orderBy('sort')->get();
            return View('admin.tc.index', compact('query'));
        }else{
            return response()->json([
                'error' => 'Permission Denied.'
            ], 401);
        }


    }
}
