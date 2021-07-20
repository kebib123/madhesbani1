<?php

namespace App\Http\Controllers\AdminControllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\News\NewsTypeModel;
use App\Models\News\NewsCategoryModel;
use App\Models\News\NewsModel;
use App\Models\News\ContentWriterModel;
use App\Models\Authors\AuthorModel;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // List Template
        $fileList = scandir(resource_path('views/themes/default/'));
        $filterArray = $this->filter_template($fileList);

        $filename = array();
        foreach ($filterArray as $filterArr) {
          $filename[] = $this->remove_extention($filterArr);
      }
      $file1 = array('single'=>'Choose Template');
      $file1 = array();
      foreach ($filename as $file) {
          $file1[$file] = $file;
      }
      $templates = $file1;

      /**/
      $ordering = NewsModel::max('ordering');
      $_ordering = 0;
      if( $ordering ){
        $_ordering = $ordering + 1;
    }

    $newtype = NewsTypeModel::all();
    $content_writers = ContentWriterModel::all();
    $authors=AuthorModel::all();
    $category = NewsCategoryModel::all();
    return view('admin.news.create', compact('authors','newtype','category','templates','content_writers','_ordering'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'news_title'=>'required',
            'news_type'=> 'required',
//            'nepali_date'=> 'required',
//            'content_writer'=> 'required',
        ]);

        $medium_width = env('MEDIUM_WIDTH');
        $medium_height = env('MEDIUM_HEIGHT');
        $data = $request->all();
        $file =  $request->file('news_thumbnail');
        $thumb_name = '';

        //upload audio
        if ($request->hasFile('audio')) {
            $image = $request->file('audio');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/audio/');

            $image->move($destinationPath, $name);
            $data['audio'] = $name;
        }
        if($request->hasfile('news_thumbnail')){
            $thumb = $request->file('news_thumbnail')->getClientOriginalName();
            $extension = $request->file('news_thumbnail')->getClientOriginalExtension();
            $thumb = explode('.', $thumb);
            $thumb_name = Str::slug($thumb[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationPath_medium = public_path('uploads/medium');
            $destinationOriginal = public_path('uploads/original');

            $thumb_picture = Image::make($file->getRealPath());
            $width = Image::make($file->getRealPath())->width();
            $height = Image::make($file->getRealPath())->height();

            $thumb_picture->resize($medium_width, $medium_height, function($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath_medium .'/'. $thumb_name );

            /*Upload Original Image*/
            $thumb_picture->resize($width, $height, function($constraint){
                $constraint->aspectRatio();
            })->save($destinationOriginal .'/'. $thumb_name );
        }

        $data['news_thumbnail'] = $thumb_name;
        if($request->news_type){
         $data['news_type'] = implode(',',$request->news_type);
     }
     if($request->news_category){
         $data['news_category'] = implode(',',$request->news_category);
     }

     if($request->author == NULL){
        $data['author'] = "";
    }

    $data['uri'] = time() . rand(5000000,90000000);

     $data['is_specialnews'] = '0';
    if($request->is_specialnews == '1'){
          $old_specialnews = NewsModel::where('is_specialnews','1')->orderBy('ordering','asc')->first();
           $count = NewsModel::where('is_specialnews','1')->count();

          if( $old_specialnews && $count >= 3){
          $oldid = $old_specialnews->id;
          $old_data = NewsModel::find($oldid);
          $old_data->is_specialnews = '0';
          $old_data->save();
          }
          $data['is_specialnews'] = $request->is_specialnews;
    }

     if($request->is_specialnews == '2'){
          $old_specialnews = NewsModel::where('is_specialnews','2')->orderBy('ordering','asc')->first();
          $count = NewsModel::where('is_specialnews','2')->count();
          if( $old_specialnews && $count >= 6){
          $oldid = $old_specialnews->id;
          $old_data = NewsModel::find($oldid);
          $old_data->is_specialnews = '0';
          $old_data->save();
          }
          $data['is_specialnews'] = $request->is_specialnews;
    }

    $result = NewsModel::create($data);
    $last_id = $result->id;

    $url = url()->current();
    $_url = explode('/',$url);
    $new_type = $_url[5];

    /*****Attach******/
    $_data = NewsModel::find($last_id);
    $_data->newstype()->attach($request->news_type);
    /*****************/

    if($result){
       return  redirect('admin/type/' . $new_type . '/' . $last_id . '/edit')->with('message','News Post Successful.');
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
    public function edit($newstype,$id)
    {
        $_data = NewsModel::find($id);
        $check_newstype = array();
        foreach ($_data->newstype as $value) {
          $check_newstype[] = $value->pivot->newstype_id;
         }

        $fileList = scandir(resource_path('views/themes/default/'));
        $filterArray = $this->filter_template($fileList);

        $filename = array();
        foreach ($filterArray as $filterArr) {
          $filename[] = $this->remove_extention($filterArr);
      }
      $file1 = array('single'=>'Choose Template');
      $file1 = array();
      foreach ($filename as $file) {
          $file1[$file] = $file;
      }
      $templates = $file1;

      /**/
      $ordering = NewsModel::max('ordering');
      $_ordering = 0;
      if( $ordering ){
        $_ordering = $ordering + 1;
    }

    $url = url()->current();
    $_url = explode('/',$url);
    $new_type = $_url[5];

    $data = NewsModel::find($id);
    $newtype = NewsTypeModel::all();
    $content_writers = ContentWriterModel::all();
    $category = NewsCategoryModel::all();
    $authors=AuthorModel::all();

    $_newstype = explode(",",$data->news_type);
    $_newscategory = explode(",",$data->news_category);

    return view('admin.news.edit', compact('authors','data','newtype','category','content_writers' ,'_newstype','_newscategory','check_newstype'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $newstype, $id)
    {
      // return $request->supporting_title;
        $request->validate([
            'news_title'=>'required',
            'news_type'=> 'required',
//            'nepali_date'=> 'required',
//            'content_writer'=> 'required',
        ]);

        $medium_width = env('MEDIUM_WIDE');
        $medium_height = env('MEDIUM_HEIGHT');

        $data = NewsModel::find($id);
        $file =  $request->file('news_thumbnail');
        $thumb_name = '';

        //upload audio
        if ($request->hasFile('audio')) {
            $data = NewsModel::find($id);
            if($data->audi){
                if(file_exists(env('PUBLIC_PATH').'audio/' . $data->audio)){
                    unlink(env('PUBLIC_PATH').'audio/' . $data->audio);
                }
                if(file_exists(env('PUBLIC_PATH').'audio/' . $data->audio)){
                    unlink(env('PUBLIC_PATH').'audio/' . $data->audio);
                }
            }
            $image = $request->file('audio');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/audio/');

            $image->move($destinationPath, $name);
            $data['audio'] = $name;
        }

        if($request->hasfile('news_thumbnail')){
            $data = NewsModel::find($id);
            if($data->news_thumbnail){

                if(file_exists(public_path('uploads/medium/' .  $data->news_thumbnail))){
                    unlink('uploads/medium/' . $data->news_thumbnail);
                }
                if(file_exists(public_path('uploads/original/' .  $data->news_thumbnail))){
                    unlink('uploads/original/' . $data->news_thumbnail);
                }

            }
            $thumb = $request->file('news_thumbnail')->getClientOriginalName();
            $extension = $request->file('news_thumbnail')->getClientOriginalExtension();
            $thumb = explode('.', $thumb);
            $thumb_name = Str::slug($thumb[0]) . '-' . Str::random(40) . '.' . $extension;

            $destinationPath_medium = public_path('uploads/medium');
            $destinationOriginal = public_path('uploads/original');

            $thumb_picture = \Intervention\Image\Facades\Image::make($file->getRealPath());
            $width = Image::make($file->getRealPath())->width();
            $height = Image::make($file->getRealPath())->height();

            $thumb_picture->resize($medium_width, $medium_height, function($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath_medium .'/'. $thumb_name );

            /* upload original image */
            $thumb_picture->resize($width, $height, function($constraint){
                $constraint->aspectRatio();
            })->save($destinationOriginal .'/'. $thumb_name );

            $data->news_thumbnail = $thumb_name;
        }

        if($request->author == NULL){
            $data->author = "";
        }else{
            $data->author = $request->author;
        }
        $data->content_writer = $request->content_writer;
        $data->news_title = $request->news_title;
        $data->sub_title = $request->sub_title;
        $data->supporting_title = $request->supporting_title;
        $data->news_content = $request->news_content;
        $data->news_excerpt = $request->news_excerpt;
        $data->thumbnail_caption = $request->thumbnail_caption;

        if($request->news_type){
             $data->news_type = implode(',',$request->news_type);
         }
        if($request->news_category){
             $data->news_category = implode(',',$request->news_category);
        }

        $data->ordering = $request->ordering;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->seo_title = $request->seo_title;
        $data->custom_link = $request->custom_link;
        $data->nepali_date = $request->nepali_date;
        $data->hour = $request->hour;
        $data->minute = $request->minute;
        $data->is_headline = ($request->is_headline)?$request->is_headline:'0';
        $data->is_breaking_news = ($request->is_breaking_news)?$request->is_breaking_news:'0';
        $data->news_video = $request->news_video;
        $data->video_status = ($request->video_status)?$request->video_status:'0';
        $data->thumbnail_status = ($request->thumbnail_status)?$request->thumbnail_status:'0';

         /*****Dettach******/
        $_data = NewsModel::find($id);
        $_data->newstype()->detach();
        $_data->newstype()->attach($request->news_type);
        /*****************/

        $data->is_specialnews = '0';
       if($request->is_specialnews == '1'){

          $old_specialnews = NewsModel::where('is_specialnews','1')->orderBy('ordering','asc')->first();
          $count =  NewsModel::where('is_specialnews','1')->count();
          if( $old_specialnews && $count > 3){
          $oldid = $old_specialnews->id;
          $old_data = NewsModel::find($oldid);
          $old_data->is_specialnews = '0';
          $old_data->save();
          }
          $data->is_specialnews = $request->is_specialnews;

    }
    if($request->is_specialnews == '2'){

          $old_specialnews = NewsModel::where('is_specialnews','2')->orderBy('ordering','asc')->first();
          $count =  NewsModel::where('is_specialnews','2')->count();
          if( $old_specialnews && $count >= 6){
          $oldid = $old_specialnews->id;
          $old_data = NewsModel::find($oldid);
          $old_data->is_specialnews = '0';
          $old_data->save();
          }
          $data->is_specialnews = $request->is_specialnews;
    }

        if($data->save()){
            return redirect()->back()->with('message','Update Sucessfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($newstype,$id)
    {
        $data = NewsModel::find($id);
        if($data->news_thumbnail){
         if(file_exists(public_path('uploads/medium/' .  $data->news_thumbnail))){
                unlink('uploads/medium/' . $data->news_thumbnail );
            }
         if(file_exists(public_path('uploads/original/' .  $data->news_thumbnail))){
                unlink('uploads/original/' . $data->news_thumbnail );
            }
          }

        /*****Dettach******/
        $_data = NewsModel::find($id);
        $_data->newstype()->detach();
        /********/

        $data->delete();
        //return 'Are you sure to delete?';
         return response('Delete Successful.');
    }

    public function news_list($newstype){

        $uri = NewsTypeModel::where('uri',$newstype)->first();
        $newstype_id = $uri['id'];
        $data = NewsTypeModel::find($newstype_id)->news()->orderBy('ordering','desc')->get();
        return view('admin.news.index', compact('data'));
    }

     // Filter Template
    private function filter_template($template){
        $tmpl = array();
        if(!empty($template)){
            foreach($template as $tmp){
                if(strpos($tmp, "template-") !== false){
                    $tmpl[] = $tmp;
                }
            }
        }
        return $tmpl;
    }

     // Remove Extention
    private function remove_extention($filename){
        $exp = explode('.',$filename);
        $file = $exp[0];
        return $file;
    }

     // Return Post Type uri
    private function getNewsTypeId($uri){
        $data = NewsTypeModel::where('uri',$uri)->first();
        return $data;
    }

        // Delete Post Thumbnail
    function delete_news_thumbnail(NewsModel $newsModel, $id){
     $data = NewsModel::find($id);
     if($data->news_thumbnail){

        if(file_exists(public_path('uploads/medium/' .  $data->news_thumbnail))){
            unlink('uploads/medium/' . $data->news_thumbnail);
        }
        if(file_exists(public_path('uploads/original/' .  $data->news_thumbnail))){
            unlink('uploads/original/' . $data->news_thumbnail);
        }
    }
    $data->news_thumbnail = NULL;
    $data->save();
    return response('Delete Successful.');
}

function headlines(){
    $data = NewsModel::where('is_specialnews','2')->orderBy('ordering','desc')->get();
    return view('admin.custom.headline_news', compact('data'));
}

function breaking_news(){
    $data = NewsModel::where('is_specialnews','1')->orderBy('ordering','desc')->get();
    return view('admin.custom.breaking_news', compact('data'));
}

function news_status(Request $request,$type,$id){
    $data = NewsModel::find($id);
   if($data->status == 0){
       $data['status'] = '1';
   }else if($data->status == 1){
         $data['status'] = '0';
   }
    $data->save();
    return "Success!";
}


    // Delete Post Audio
    function delete_audio(NewsModel $postModel, $id){
        $data = NewsModel::find($id);
        if($data->audio){
            if(file_exists(env('PUBLIC_PATH').'audio/' . $data->audio)){
                unlink(env('PUBLIC_PATH').'audio/' . $data->audio);
            }
            if(file_exists(env('PUBLIC_PATH').'audio/' . $data->audio)){
                unlink(env('PUBLIC_PATH').'audio/' . $data->audio);
            }
        }
        $data->audio = NULL;
        $data->save();
        return response('Audio Delete Successful.');
    }


}
