<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Album;
use App\Photo;

use Auth;
use File;

class AlbumsController extends Controller
{
  public function albumList()
  {
    $albums = Album::paginate(6);
    foreach ($albums as $arr) {
      $cover = Photo::select('image')->where('album_id', $arr->id)->first();
      $arr->cover = $cover->image;
    }

    return response()->json($albums, 200, [], JSON_NUMERIC_CHECK);
  }
  public function getAlbum($id)
  {
    $album = Album::with('photos')->find($id);
    $json = array('id' => $album->id, 'title' => $album->title, 'description' => $album->description, 'created_at' => Date($album->created_at), 'photos' => []);
    foreach ($album->photos as $a) {
      array_push($json['photos'], ['src' => '/albums/' . $a->image, 'thumb' => '/albums/' . $a->image, 'subHtml' => '']);
    }
    return response()->json($json, 200, [], JSON_NUMERIC_CHECK);
  }
  public function getForm()
  {
    return View::make('createalbum');
  }
  public function albumCreate()
  {
    if (Auth::check()) {

      $rules = array(

        'title' => 'required',
        'description' => 'required',
        'files' => 'required'

      );

      $validator = Validator::make(Input::all(), $rules);
      if($validator->fails()){

        return redirect('admin/album')
        ->withErrors($validator)
        ->withInput();
      }

      $files = Input::file('files');
      $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
      if(is_array($files) && !empty($files)){
        foreach($files as $file) {
          $validator = Validator::make(array('file'=> $file), $rules);
          if(!$validator->passes()){
            return '檔案上傳失敗';
          }
        }
        //Create Album
        $album = Album::create(array(
          'title' => Input::get('title'),
          'description' => Input::get('description'),
        ));

        $count = 0;
        $rnd = date('YmdHis') . rand(11111,99999) . '_' . $album->id . '_';
        foreach($files as $file) {
          $count++;
          $destinationPath = 'albums/';
          $filename = $rnd . $count . '.' . $file->getClientOriginalExtension();
          $upload_success = $file->move($destinationPath, $filename);
          Photo::create(['album_id' => $album->id, 'image' => $filename ]);
        }
        Session::flash('success', 'Upload successfully');
      }else{
        return '檔案上傳失敗';
      }

      return redirect('admin/album');
    }else{
      return redirect('admin');
    }
  }

  public function getDelete($id)
  {
    if (Auth::check()) {
      $album = Album::find($id);

      foreach ($album->photos as $f) {
        File::delete('albums/' . $f->image);
      }

      $album->delete();

      return redirect('admin/album');
    }else{
      return redirect('admin');
    }
  }

  public function albumManage()
  {
    if (Auth::check()) {
      $query = Album::all();
      return view('admin.album.index', compact('query'));
    }else {
      return response()->json([
          'error' => 'Permission Denied.'
      ], 401);
    }
  }

  public function test($id)
  {
      $album = Photo::select('image')->where('album_id', $id)->first();
      return $album;
  }
  public function newAlbum()
  {
      return View('admin.album.new');
  }
}
