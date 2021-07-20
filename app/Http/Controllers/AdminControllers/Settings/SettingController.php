<?php

namespace App\Http\Controllers\AdminControllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SettingModel;

class SettingController extends Controller
{
    public function index(){
    	$data = SettingModel::where('id',1)->first();    	
    	return view('admin.settings.setting', compact('data'));
    }

    public function store(Request $request){
    	return $request;
    }

     public function edit(Request $request){
    	$data = SettingModel::where('id',1)->first();    	
    	return view('admin.settings.setting');
    }

     public function update(Request $request, $id){

     	$data = SettingModel::where('id',$id)->first();
        $data->site_name = $request->site_name;
        $data->path = $request->path;
        $data->reg_number = $request->reg_number;
        $data->phone = $request->phone;
        $data->phone2 = $request->phone2;
        $data->name1 = $request->name1;
        $data->phone3 = $request->phone3;
        $data->name2 = $request->name2;
        $data->phone4 = $request->phone4;
        $data->email3 = $request->email3;
        $data->email4 = $request->email4;
        $data->email_primary = $request->email_primary;
        $data->email_secondary = $request->email_secondary;
        $data->address = $request->address;
        $data->team = $request->team;
        $data->facebook_link = $request->facebook_link;
        $data->linkedin_link = $request->linkedin_link;  
        $data->youtube_link = $request->youtube_link;      
        $data->twitter_link = $request->twitter_link;
        $data->meta_key = $request->meta_key;
        $data->meta_description = $request->meta_description;
        $data->google_map = $request->google_map;
        $data->google_map2 = $request->google_map2;
        $data->welcome_text = $request->welcome_text; 
        $data->copyright_text = $request->copyright_text;         
        
        if($data->save()){
            return redirect()->back()->with('message','Update Sucessfully.');
        }

    }
}
