<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Album;
use App\Photo;

class AlbumsController extends Controller
{
  public function getList()
  {
    $albums = Album::with('Photos')->get();
    return View::make('index')
    ->with('albums',$albums);
  }
  public function getAlbum($id)
  {
    $album = Album::with('Photos')->find($id);
    return View::make('album')
    ->with('album',$album);
  }
  public function getForm()
  {
    return View::make('createalbum');
  }
  public function albumCreate()
  {
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
  }

  public function getDelete($id)
  {
    $album = Album::find($id);

    $album->delete();

    return Redirect::route('index');
  }

  public function test($id)
  {
      $album = Album::with('photos')->find($id);
      return response()->json($album, 200, [], JSON_NUMERIC_CHECK);
  }
  public function newAlbum()
  {
      return View('admin.album.new');
  }
}
