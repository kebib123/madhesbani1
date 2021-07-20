<?php

namespace App\Http\Controllers\AdminControllers\Posts;
use Illuminate\Support\Str;
use App\Models\Posts\PostTypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class PostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PostTypeModel::orderBy('ordering','asc')->get();
        return view('admin.post-type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = PostTypeModel::max('ordering');
        $ordering = $ordering + 1;
         return view('admin.post-type.create',compact('ordering'));
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
            'post_type'=> 'required',
            'uri'=>'required|unique:cl_post_type'
        ]);

         $medium_width = env('MEDIUM_WIDTH');
      $medium_height = env('MEDIUM_HEIGHT');

      $data = $request->all();      
      $file =  $request->file('thumbnail');
      $product_name = '';
      if($request->hasfile('thumbnail')){
        $product = $request->file('thumbnail')->getClientOriginalName();
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        $product = explode('.', $product);
        $product_name = Str::slug($product[0]) . '-' . str_random(40) . '.' . $extension;

        $destinationPath_medium = public_path('uploads/thumbnail');
        $destinationOriginal = public_path('uploads/original');

        $product_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();      

        $product_picture->resize($medium_width, $medium_height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath_medium .'/'. $product_name ); 

        /*Upload Original Image*/
        $product_picture->resize($width, $height, function($constraint){
          $constraint->aspectRatio();
        })->save($destinationOriginal .'/'. $product_name ); 

      }

        $data = $request->all();
        $data['uri'] = Str::slug($request->uri);
        $data['thumbnail'] = $product_name;
       // print_r($data);die;
        $result = PostTypeModel::create($data);
        if($result){
            return redirect()->back()->with('message','Stored Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts\PostTypeModel  $postTypeModel
     * @return \Illuminate\Http\Response
     */
    public function show(PostTypeModel $postTypeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts\PostTypeModel  $postTypeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PostTypeModel $postTypeModel, $posttype, $id)
    {
        $data = PostTypeModel::find( $id );
        return view('admin.post-type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts\PostTypeModel  $postTypeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostTypeModel $postTypeModel, $posttype, $id)
    {
        $request->validate([
            'post_type'=> 'required',
            'uri'=>'required'
        ]);
        $data = PostTypeModel::find($id);
        $data->post_type = $request->post_type;
        $data->sub_title = $request->sub_title;
        $data->post_excerpt = $request->post_excerpt;
        $data->uri = Str::slug($request->uri);
        $data->ordering = $request->ordering;
        $data->is_menu = $request->is_menu;        
        $data->save();
        return redirect()->back()->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts\PostTypeModel  $postTypeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostTypeModel $postTypeModel, $posttype, $id)
    {   
        $data = PostTypeModel::find($id);
        $data->delete();
    }

    // Delete Post Thumbnail
    function delete_posttype_thumb(PostTypeModel $posttypeModel, $id){

     $data = PostTypeModel::find($id);
     if($data->thumbnail){
      if(file_exists(env('PUBLIC_PATH').'uploads/thumbnail/' . $data->thumbnail)){
        unlink(env('PUBLIC_PATH').'uploads/thumbnail/' . $data->thumbnail);
      }
      if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
        unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
      }
    }
    $data->thumbnail = NULL;
    $data->save();
    return response('Delete Successful.');
  }

}
