<?php

use App\Models\News\NewsCategoryModel;
use App\Models\News\NewsModel;
use App\Models\News\ContentWriterModel;
use App\Models\News\NewsTypeModel;
use App\Models\News\NewsTypeUserModel;
use App\Models\Authors\AuthorModel;
use App\Models\Advertisement\AdvertisementModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostModel;
use Illuminate\Http\Request;
use App\Models\AdminMenu\AdminMenuUserModel;

function author_details($id)
{
    $data=AuthorModel::where('id',$id)->first();
    return $data;
}

function news_countby_author($id){
	$data = NewsModel::where('content_writer',$id)->count();
	return $data;
}

function advertisement($position){
  $data = AdvertisementModel::where(['position'=>$position,'status'=>'1'])->first();
  if($data){
    return $data;
  }
  return false;
}

// Check if category has child
function has_child($id){
  $data = NewsTypeModel::where('parent_id',$id)->count();
  if($data > 0){
    return true;
  }
}

function sub_type($id){
  $data = NewsTypeModel::where('parent_id',$id)->orderBy('ordering','asc')->get();
  return $data;
}

function sub_type_limit($id,$limit){
 $data = NewsTypeModel::where(['parent_id'=>$id,'status'=>'1'])->where('id','<>',18)->orderBy('ordering','asc')->limit($limit)->get();
 return $data;
}


/**/
function show_newscategory($newstype){
  $data = NewsCategoryModel::where('news_type',$newstype)->get();
  return $data;
}
function is_empty_newscategory($id){
  $data = NewsModel::where(['news_category'=>$id,'status'=>'1'])->count();
  if( $data > 0){
    return true;
  }
  return false;
}

function postby($id){
 $data = ContentWriterModel::where('id',$id)->first();
 return $data['name'];
}

function splitTimeStamp($date_time,$uri){
  $timestamp = date('Y-m-d',strtotime($date_time));
  $sp = explode('-',$timestamp);
  $data = $sp[0].'/'.$sp[1].'/'.$sp[2].'/'.$uri.'.html';
  return $data;
}


function sidebar_news_latest($newstype_id){
  $news = NewsModel::orderBy('id','desc')->get();
  $sidebar_news = array();
  foreach($news as $row){
    $filter = explode(",", $row->news_type);
    if(in_array($newstype_id,$filter)){
      $sidebar_news[] = $row;
    }
  }
  return $sidebar_news;
}

function get_newstype($newstype){
  $data = NewsTypeModel::where('id',$newstype)->first();
  return $data;
}

function newslist($id,$limit='',$offset=''){
 $newstype_id = $id;
 if($limit){
   $data = NewsTypeModel::find($newstype_id)->news()->where(['is_specialnews'=>'0','status'=>'1'])->orderBy('ordering','desc')->offset($offset)->limit($limit)->get();
 }else{
   $data = NewsTypeModel::find($newstype_id)->news()->where(['is_specialnews'=>'0','status'=>'1'])->orderBy('ordering','desc')->get();
 }
 if($data->count() > 0){
  return $data;
}
return false;
}

function newstop($id){
  $newstype_id = $id;
  $data = NewsTypeModel::find($newstype_id)->news()->where(['is_specialnews'=>'0','status'=>'1'])->orderBy('ordering','desc')->first();
  if($data <> NULl ){
    return $data;
  }
  return false;
}

function is_empty_posttype($id){
  $data = PostModel::where(['post_type'=>$id])->count();
  if( $data > 0){
    return true;
  }
  return false;
}

function is_empty_newstype($id){
    $data = NewsModel::where(['news_type'=>$id])->count();
    if( $data > 0){
        return true;
    }
    return false;
}


// Check whether this category has post or not.
function is_empty_category($id){
  $data = PostModel::where(['post_category'=>$id])->count();
  if( $data > 0){
    return true;
  }
  return false;
}

// Check and List Child Post
function has_child_post($id){
  $check_child = PostModel::where('post_parent',$id)->count();
  $data = PostModel::where(['post_parent'=>$id])->orderBy('post_order','asc')->get();
  return $data;
}

function check_child_post($id){
  $data = PostModel::where('post_parent',$id)->count();
  return $data;
}
function has_posts($post_type){
  $data = PostModel::where(['post_type'=>$post_type,'post_parent'=>'0','status'=>1])->orderBy('post_order','asc')->get();
  if($data->count() > 1){
  return $data;
  }
  return false;
}

function has_post_type($post_type){
  $data = PostModel::where(['post_parent'=>$post_type])->orderBy('post_order','asc')->get();
  if($data->count() > 1){
  return $data;
  }
  return false;
}


function has_single_post($post_type){
  $data = PostModel::where(['post_type'=>$post_type,'post_parent'=>'0','status'=>1])->orderBy('post_order','asc')->first();
  if($data){
    return $data;
  }
  return false;
}

function geturl($uri){
  $count = PostModel::where(['uri'=>$uri])->count();
  $data = PostModel::where(['uri'=>$uri])->first();

  if($count > 1){
    return $data->page_key.'.html';
  }
 return 'page/'.$data->uri.'.html';
}

function geturl_child($uri){
  $count = PostModel::where(['uri'=>$uri])->count();
  $data = PostModel::where(['uri'=>$uri])->first();

  if($count > 1){
    return $data->page_key.'.html';
  }
 return $data->uri.'.html';
}

function check_uri($uri){
     $data = PostModel::where(['uri'=>$uri])->first();
     if($data){
      return true;
     }
     return false;
}

function check_uri2($uri){
    $count = PostModel::where(['uri'=>$uri])->count();
  $data = PostModel::where(['uri'=>$uri])->first();

  if($count > 1){
    return $data->page_key;
  }
  return 'page/'.$data->uri;
}

function viewsIndicator($views){

  if($views > 1000){
    return '<span class="badge badge-success badge-pill"><i class="fa fa-eye"></i> '. $views/1000 .'K+ </span>';
  }

  if($views == 1000){
    return '<span class="badge badge-success badge-pill"><i class="fa fa-eye"></i> '. $views/1000 .'K </span>';
  }

  if($views < 1000 && $views >= 500){
    return '<span class="badge badge-primary badge-pill"><i class="fa fa-eye"></i> '. $views .' </span>';
  }

  if($views < 500 && $views >= 100){
    return '<span class="badge badge-info badge-pill"><i class="fa fa-eye"></i> '. $views .' </span>';
  }

  if($views < 100){
    return '<span class="badge badge-warning badge-pill"><i class="fa fa-eye"></i> '. $views .' </span>';
  }

}

function checkAuth($id){
  if(Auth::id() == 1){
    return true;
  }else{
    $data = AdminMenuUserModel::where(['user_id'=>Auth::id(),'adminmenu_id'=>$id])->first();
    if($data){
      return true;
    }
  }
  return false;
}

function checkUser($id){
  if(Auth::id() == 1){
    return true;
  }else{
    $data = NewsTypeUserModel::where(['user_id'=>Auth::id(),'newstype_id'=>$id])->first();
    if($data){
      return true;
    }
  }
  return false;
}



if (!function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}


