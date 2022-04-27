<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppConfig;
use Illuminate\Http\Request;

class AppConfigController extends Controller
{
    function index(){
    	$config=AppConfig::first();
    	return view('config.index',['config'=>$config]);
    }
    // Store
    function saveConfig(Request $request){
    	$countData=AppConfig::count();
    	if($countData==0){
	    	$data=new AppConfig;
			// //logo
		
			
	        $data->name=$request->name;
	        $data->description=$request->description;
	        $data->address=$request->address;
	        $data->telephone=$request->telephone;
	        $data->mobile=$request->mobile;
			
			$logo = $request->file('logo');
			$extension = $logo->getClientOriginalExtension(); // you can also use logo name
			$fileName = time() . '.' . $extension;
			$path = public_path() . '/images';
			$uplaod = $logo->move($path, $fileName);
            $data->logo=$fileName;
	        $data->save();
	    }else{
	    	$firstData=AppConfig::first();
	    	$data=AppConfig::find($firstData->id);
	        $data->name=$request->name;
	        $data->description=$request->description;
	        $data->address=$request->address;
	        $data->telephone=$request->telephone;
	        $data->mobile=$request->mobile;

			$logo = $request->file('logo');
			$extension = $logo->getClientOriginalExtension(); // you can also use logo name
			$fileName = time() . '.' . $extension;
			$path = public_path() . '/images';
			$uplaod = $logo->move($path, $fileName);
            $data->logo=$fileName;
	        $data->save();
	    }

        return redirect('config')->with('success','Data has been updated.');
    }}
