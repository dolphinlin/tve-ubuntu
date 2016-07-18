<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Input;


use App\Http\Requests;
use DateTime;
use App\Postfiles;
class UploadController extends Controller
{
    //
    public function index()
    {
      return View('upload.index');
    }

    public function upload()
    {
      // getting all of the post data
         $files = Input::file('files');
         // Making counting of uploaded images
         $file_count = count($files);
         // start count how many uploaded
         $uploadcount = 0;
         $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
         if(is_array($files) && !empty($files)){
           foreach($files as $file) {
             $validator = Validator::make(array('file'=> $file), $rules);
             if(!$validator->passes()){
               return '檔案上傳失敗';
             }
           }
           foreach($files as $file) {
             $destinationPath = 'uploads';
             $dt = date('YmdHis');
             $filename = $dt . rand(11111,99999) . $file->getClientOriginalName();
             $upload_success = $file->move($destinationPath, $filename);
           }
           Session::flash('success', 'Upload successfully');
           return redirect('/');
         }else{
           return 'error';
         }

    }
    public function queryID($id)
    {
      $q = Postfiles::where('postid', $id)->get();
      return response()->json($q, 200, [], JSON_NUMERIC_CHECK);
    }
}
