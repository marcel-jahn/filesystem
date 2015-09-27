<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileuploadController extends Controller
{
	function getShow($id = null){
		if(!$id){
			$id = \Auth::user()->id;
		}
		$files = \Auth::user()->getMedia()->all();
		return view('filemanager.files.index')->with('files', $files);
    }
}
