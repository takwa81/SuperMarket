<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class AppConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::all();
        return view('config.index',compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "logo" => "required",
                "description" => "required",
                "address" => "required",
                "telephone" => "required",
                "mobile" => "required",
            ]
        );
        $file = $request->file('logo');
        $extension = $file->getClientOriginalExtension(); // you can also use file name
        $fileName = time() . '.' . $extension;
        $path = public_path() . '/images';
        $uplaod = $file->move($path, $fileName);

        $config = Config::create([
            
            "logo" => $fileName,
            "name" => $request->name,
            "description" => $request->description,
            "address" => $request->address,
            "telephone"=>$request->telephone,
            "mobile" =>$request->mobile
        ]);
        return redirect()->route('config.index')->with(key: "success", value: "Config added successflly");

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
        return view("config.edit", compact('config'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        if ($request->file('logo') != null) {

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/images/';
            $uplaod = $file->move($path, $fileName);
            if (File::exists(public_path('images/' . $config->logo))) {
                File::delete(public_path('images/' . $config->logo));
            } else {
                dd("error");
            }
            $config->logo = $fileName;
        }
        $config->name = $request->name ?? $config->name;
        $config->description = $request->description ?? $config->description;
        $config->address = $request->address ?? $config->address;
        $config->telephone = $request->telephone ?? $config->telephone;
        $config->phone = $request->phone ?? $config->phone;
        $config->save();

        return redirect()->route("config.index")->with(key: "success", value: "Config update successflly");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
