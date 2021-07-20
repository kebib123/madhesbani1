<?php

namespace App\Http\Controllers\AdminControllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts\PostDocModel;
use App\Models\Posts\PostCategoryModel;
use Validator;
use Image;

class PostDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = PostDocModel::where('post_id',intval($id))->paginate(20);
        return view('admin.multiple-doc.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post_id = intval($id);
        $ordering = PostDocModel::max('ordering');
        $ordering = $ordering + 1;
         $category = PostCategoryModel::all();
        return view('admin.multiple-doc.create', compact('post_id','ordering','category'));
    }

    /**
     * Store a newly created resource in storage.,
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation = Validator::make($request->all(), [
        'document' => 'required',
         'document.*' => 'mimes:doc,pdf,docx,ppt,pptx,xls,xlsx,jpeg,png,jpg,gif'
    ]);

       if($validation->passes()){
         $medium_width = env('MEDIUM_WIDTH');
         $medium_height = env('MEDIUM_HEIGHT');

        $data = $request->all();
        $file =  $request->file('doc_thumb');
         $product_name = '';
           if($request->hasfile('doc_thumb')){
        $product = $request->file('doc_thumb')->getClientOriginalName();
        $extension = $request->file('doc_thumb')->getClientOriginalExtension();
        $product = explode('.', $product);
        $product_name = str_slug($product[0]) . '-' . str_random(40) . '.' . $extension;

        $destinationPath_medium = public_path('uploads/medium');
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
        $doc = $request->file('document')->getClientOriginalName();
        $extension = $request->file('document')->getClientOriginalExtension();
        $doc = explode('.', $doc);
        $document = str_slug($doc[0]) . '-' . uniqid() . '.' . $extension;

        $request->file('document')->move( public_path('uploads/doc/'), $document);      
        $data['key_string'] = str_random(40);
        $data['post_id'] = $request->post_id;
        $data = $request->all();
        $data['document'] = $document;
        $data['doc_thumb'] = $product_name;
        PostDocModel::create($data);

        return redirect()->back()->with('message','File Upload Successful');

    }else{
       return 'Error';
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
    public function edit($postId,$id)
    {
        $post_id = intval($postId);
        $data = PostDocModel::find($id);
         $category = PostCategoryModel::all();
        return view('admin.multiple-doc.edit', compact('data',intval('post_id'),'category'));
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

        $data = PostDocModel::find($id);
         $file =  $request->file('doc_thumb');
         $product_name = '';
        $document = "";

        if($request->hasfile('doc_thumb')){
        $data = PostDocModel::find($id); 
        if($data->doc_thumb){
          if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->doc_thumb)){
            unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->doc_thumb);
          }
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->doc_thumb)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->doc_thumb);
          }
        }
        $product = $request->file('doc_thumb')->getClientOriginalName();
        $extension = $request->file('doc_thumb')->getClientOriginalExtension();
        $product = explode('.', $product);
        $product_name = str_slug($product[0]) . '-' . str_random(40) . '.' . $extension;

        $destinationPath_medium = public_path('uploads/medium');
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

        $data->doc_thumb = $product_name;
      }    
          if($request->hasfile('document')){

            $data = PostDocModel::find($id);
            if($data->document){
             if(file_exists(public_path('uploads/doc/' .  $data->document))){
                unlink('uploads/doc/' . $data->document);
            }
            }

            $doc = $request->file('document')->getClientOriginalName();
            $extension = $request->file('document')->getClientOriginalExtension();
            $doc = explode('.', $doc);
            $document = str_slug($doc[0]) . '-' . uniqid() . '.' . $extension;
            $request->file('document')->move( public_path('uploads/doc/'), $document); 
            

        $data->document = $document;

    } 

    $data->title = $request->title;
    $data->sub_title = $request->sub_title;
    $data->brief = $request->brief;
    $data->ordering = $request->ordering;
    $data->post_category = $request->post_category;
    $data->month = $request->month;
    $data->cat_id = $request->cat_id;

    if($data->save()){
        return redirect()->back()->with('message','Update Sucessful.');
    }else{
        return "Error";
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
         $data = PostDocModel::find($id);
         if($data->document){               
                if(file_exists(public_path('uploads/doc/' .  $data->document))){
                    unlink('uploads/doc/' . $data->document);
                }                   
            }
         $data->delete();
         return response('Delete Successful.');
    }

 // Delete doc file 
     function delete_doc_file(PostDocModel $postDocModel, $id){
         $data = PostDocModel::find($id);
         if($data->document){               
                if(file_exists(public_path('uploads/doc/' .  $data->document))){
                    unlink('uploads/doc/' . $data->document);
                }                   
            }
         $data->document = '';
         $data->save();
         return response('Delete Successful.');
    }

// Delete doc file 
     function delete_doc_thumb(PostDocModel $postDocModel, $id){
       $data = PostDocModel::find($id);
     if($data->doc_thumb){
      if(file_exists(env('PUBLIC_PATH').'uploads/medium/' . $data->doc_thumb)){
        unlink(env('PUBLIC_PATH').'uploads/medium/' . $data->doc_thumb);
      }
      if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->doc_thumb)){
        unlink(env('PUBLIC_PATH').'uploads/original/' . $data->doc_thumb);
      }
    }
    $data->doc_thumb = NULL;
    $data->save();
    return response('Delete Successful.');
  }


}
