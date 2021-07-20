<?php

namespace App\Http\Controllers\AdminControllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News\NewsCategoryModel;
use App\Models\News\NewsTypeModel;
use Image;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = NewsCategoryModel::orderBy('ordering','asc')->get();
        return view('admin.news-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newstype = NewsTypeModel::all();
        $ordering = NewsCategoryModel::max('ordering');
        $_ordering = 0;
        if( $ordering ){
            $_ordering = $ordering + 1;
        }
        return view('admin.news-category.create', compact('newstype','_ordering'));
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
            'news_type'=>'required',
            'category'=>'required',
            'uri'=>'required',
            'ordering'=>'required',
        ]);
       $data = $request->all();
       $file =  $request->file('thumbnail');
       $file_name = '';
       if($request->hasfile('thumbnail')){
        $category_file = $request->file('thumbnail')->getClientOriginalName();
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        $category_file = explode('.', $category_file);
        $file_name = str_slug( 'category-'.$category_file[0]) . '-' . str_random(40) . '.' . $extension;

        $destinationOriginal = public_path('uploads/original');
        $pic = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height(); 

        $pic->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
        })->save($destinationOriginal .'/'. $file_name );
    }

    $data['uri'] = str_slug($request->uri); 
    $data['thumbnail'] = $file_name;
    $result = NewsCategoryModel::create($data);
    $last_id = $result->id;
    if($result){
      return redirect('admin/newscategory/' . $last_id . '/edit')->with('message','Successfully added.');
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
        $data = NewsCategoryModel::find($id);
        $newstype = NewsTypeModel::all();
        return view('admin.news-category.edit', compact('data','newstype'));
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
            'news_type'=>'required',
            'category'=>'required',
            'uri'=>'required',
            'ordering'=>'required',
        ]);
        
        $data = NewsCategoryModel::find($id);
        $file =  $request->file('thumbnail');
        $file_name = '';
        if($request->hasfile('thumbnail')){
            $data = NewsCategoryModel::find($id);  
            if($data->thumbnail){               
                if(file_exists(public_path('uploads/original/' .  $data->thumbnail))){
                    unlink('uploads/original/' . $data->thumbnail);
                }                  
            }
            $category_file = $request->file('thumbnail')->getClientOriginalName();
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $category_file = explode('.', $category_file);
            $file_name = str_slug($category_file[0]) . '-' . str_random(40) . '.' . $extension;
            
            $destinationOriginal = public_path('uploads/original');            

        $product_picture = Image::make($file->getRealPath());
        $width = Image::make($file->getRealPath())->width();
        $height = Image::make($file->getRealPath())->height();        
      
        /****Upload Original Image****/
        $product_picture->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
             })->save($destinationOriginal .'/'. $file_name ); 

        $data->thumbnail = $file_name;
        }   

        $data->news_type = $request->news_type;
        $data->category = $request->category;
        $data->uri = str_slug($request->uri);  
        $data->ordering = $request->ordering;  
        $data->category_caption = $request->category_caption;
        $data->category_content = $request->category_content;        
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
        $data = NewsCategoryModel::find($id);
         if($data->thumbnail  != NULL){
            unlink('uploads/original/' . $data->thumbnail );
        }
        $data->delete();
        return 'Are you sure to delete?';
    }

      // Delete Post Thumbnail
     function delete_category_thumb(NewsCategoryModel $newsCategoryModel, $id){
         $data = NewsCategoryModel::find($id);
         if($data->thumbnail){                
                if(file_exists(public_path('uploads/original/' .  $data->thumbnail))){
                    unlink('uploads/original/' . $data->thumbnail);
                }                   
            }
         $data->thumbnail = NULL;
         $data->save();
         return response('Delete Successful.');
    }

}
