<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
	function getShow($id = null){
		if(!$id){
			$id = \Auth::user()->id;
		}
		return view('filemanager.files.index');
    }

    function postUpload(Request $request){
    	$file = $request->file('upl');
    	$user = \Auth::user();


    	$path = storage_path().'/uploads/'.$user->id;
    	$name = $file->getClientOriginalName();
    	$file->move($path, $name);

    	$user->addMedia($path . '/' . $name)->toMediaLibrary();

    	return $file;
    }
}
