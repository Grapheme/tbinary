<?php

class DownloadsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$req_path = Input::get('path');
		$path = public_path().Config::get('egg.upload_dir')."/".$req_path;
		$directories_array = File::directories($path);
		$files_array = File::files($path);
		if($req_path != "")
		{
			$ex_path = explode("/", $req_path);
			unset($ex_path[count($ex_path)-1]);
			$back_link = implode("/", $ex_path);
		}
		foreach($directories_array as $dir)
		{
			$url = $req_path."/".basename($dir);
			$dirs[$url] = basename($dir);
		}
		foreach($files_array as $file)
		{
			$url = URL::to(Config::get('egg.upload_dir').$req_path."/".basename($file));
			$files[$url] = array('name' => basename($file), 'size' => round(File::size($file)/1024, 2));
		}

		return View::make('admin.downloads.index', compact('dirs', 'files', 'back_link'));
	}

	public function postUpload()
	{
		$file = Input::file('file');
		$path = Input::get('path');
 
		$destinationPath = public_path().Config::get('egg.upload_dir').$path;
		$extension =$file->getClientOriginalExtension();
		$filename = time()."_".rand(1000,1999).".".$extension; 
		$upload_success = Input::file('file')->move($destinationPath, $filename);
		 
		if( $upload_success ) {
		   return Response::json('success', 200);
		} else {
		   return Response::json('error', 400);
		}
	}

}