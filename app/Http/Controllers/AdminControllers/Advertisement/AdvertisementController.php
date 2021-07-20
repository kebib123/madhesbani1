<?php

namespace App\Http\Controllers\AdminControllers\Advertisement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Advertisement\AdvertisementModel;
use Image;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AdvertisementModel::orderBy('position','asc')->get();
        return view('admin.advertisement.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
//            'position'=>'required',
//            'start_date'=>'required',
//            'end_date'=>'required',
        ]);
       $data = $request->all();
       $file =  $request->file('add_image');
       $file_name = '';
       if($request->hasfile('add_image')){
        // $advt_file = $request->file('add_image')->getClientOriginalName();
        // $extension = $request->file('add_image')->getClientOriginalExtension();
        // $advt_file = explode('.', $advt_file);
        // $file_name = Str::slug( 'category-'.$advt_file[0]) . '-' . Str::random(40) . '.' . $extension;

        // $destinationOriginal = public_path('uploads/advertisement');
        // $pic = Image::make($file->getRealPath());
        // $width = Image::make($file->getRealPath())->width();
        // $height = Image::make($file->getRealPath())->height();

        // $pic->resize($width, $height, function($constraint){
        //     $constraint->aspectRatio();
        // })->save($destinationOriginal .'/'. $file_name );

        $advt_file = $request->file('add_image')->getClientOriginalName();
        $destinationOriginal = public_path('uploads/advertisement');

        $extension = $request->file('add_image')->getClientOriginalExtension();
        $advt_file = explode('.', $advt_file);
        $file_name = Str::slug( 'category-'.$advt_file[0]) . '-' . Str::random(40) . '.' . $extension;

        $file->move($destinationOriginal, $file_name);

    }

    $data['add_image'] = $file_name;
    $result = AdvertisementModel::create($data);
    if($result){
      return redirect()->back()->with('message','Successfully added.');
    }else{
        return "Error";
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = AdvertisementModel::find($id);
        return view('admin.advertisement.edit', compact('data'));
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
        $request->validate([
            'title'=>'required',
//            'position'=>'required',
//            'start_date'=>'required',
//            'end_date'=>'required',
        ]);

        $data = AdvertisementModel::find($id);
        $file =  $request->file('add_image');
        $file_name = '';
        if($request->hasfile('add_image')){
            $data = AdvertisementModel::find($id);
            if($data->add_image){
                if(file_exists(public_path('uploads/advertisement/' .  $data->add_image))){
                    unlink('uploads/advertisement/' . $data->add_image);
                }
            }

        //     $advt_file = $request->file('add_image')->getClientOriginalName();
        //     $extension = $request->file('add_image')->getClientOriginalExtension();
        //     $advt_file = explode('.', $advt_file);
        //     $file_name = Str::slug($advt_file[0]) . '-' . Str::random(40) . '.' . $extension;

        //     $destinationOriginal = public_path('uploads/advertisement');

        // $product_picture = Image::make($file->getRealPath());
        // $width = Image::make($file->getRealPath())->width();
        // $height = Image::make($file->getRealPath())->height();

        // /****Upload Original Image****/
        // $product_picture->resize($width, $height, function($constraint){
        //     $constraint->aspectRatio();
        //      })->save($destinationOriginal .'/'. $file_name );

        $advt_file = $request->file('add_image')->getClientOriginalName();
        $destinationOriginal = public_path('uploads/advertisement');

        $extension = $request->file('add_image')->getClientOriginalExtension();
        $advt_file = explode('.', $advt_file);
        $file_name = Str::slug( 'category-'.$advt_file[0]) . '-' . Str::random(40) . '.' . $extension;

        $file->move($destinationOriginal, $file_name);

        $data->add_image = $file_name;
        }

        $data->title = $request->title;
        //$data->add_size = $request->add_size;
        $data->position = $request->position;
        $data->client_name = $request->client_name;
        $data->client_link = $request->client_link;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AdvertisementModel::find($id);
        $data->delete();
        return "Delete Successful.";
    }
}
