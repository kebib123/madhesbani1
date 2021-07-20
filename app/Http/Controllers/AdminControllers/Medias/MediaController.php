<?php

namespace App\Http\Controllers\AdminControllers\Medias;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Medias\MediaModel;
use Image;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MediaModel::all();
        return view('admin.medias.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = MediaModel::max('ordering');
        $_ordering = 0;
        if( $ordering !== NULL ){
            $_ordering = $ordering + 1;
        }
       return view('admin.medias.create',compact('_ordering'));
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
        'thumbnail'=> 'required'
        ]);

       $medium_width = env('MEDIUM_WIDTH');
       $medium_height = env('MEDIUM_HEIGHT');

       $data = $request->all();
//       $file =  $request->file('thumbnail');
//       $thumb_name = '';
//       if($request->hasfile('thumbnail')){
//        $thumb = $request->file('thumbnail')->getClientOriginalName();
//        $extension = $request->file('thumbnail')->getClientOriginalExtension();
//        $thumb = explode('.', $thumb);
//        $thumb_name = str_slug($thumb[0]) . '-' . str_random(40) . '.' . $extension;
//
//        $destinationPath_medium = public_path('uploads/medium');
//        $destinationOriginal = public_path('uploads/original');
//
//        $thumb_picture = Image::make($file->getRealPath());
//        $width = Image::make($file->getRealPath())->width();
//        $height = Image::make($file->getRealPath())->height();
//
//        $thumb_picture->resize($medium_width, $medium_height, function($constraint){
//            $constraint->aspectRatio();
//        })->save($destinationPath_medium .'/'. $thumb_name );
//
//        /*Upload Original Image*/
//        $thumb_picture->resize($width, $height, function($constraint){
//            $constraint->aspectRatio();
//        })->save($destinationOriginal .'/'. $thumb_name );
//    }

//    $data['thumbnail'] = $thumb_name;
    $result = MediaModel::create($data);
    $last_id = $result->id;
    if($result){
       return  redirect('admin/media/' . $last_id . '/edit')->with('message','Update Successful.');
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
       $data = MediaModel::find($id);
       return view('admin.medias.edit', compact('data'));
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
        $medium_width = env('MEDIUM_WIDTH');
        $medium_height = env('MEDIUM_HEIGHT');

        $data = MediaModel::find($id);

        $data->name = $request->name;
        $data->thumbnail=$request->thumbnail;
        $data->ordering = $request->ordering;
        if($data->save()){
            return redirect()->back()->with('message','Update Sucessful.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = MediaModel::find($id);
       $data->delete();
        return 'Are you sure to delete?';
    }

      // Delete Post Thumbnail
     function delete_thumbnail(MediaModel $mediaModel, $id){
         $data = MediaModel::find($id);
         if($data->thumbnail){

                if(file_exists(public_path('uploads/medium/' .  $data->thumbnail))){
                    unlink('uploads/medium/' . $data->thumbnail);
                }
                if(file_exists(public_path('uploads/original/' .  $data->thumbnail))){
                    unlink('uploads/original/' . $data->thumbnail);
                }

            }
         $data->thumbnail = NULL;
         $data->save();
         return response('Delete Successful.');
    }

}
