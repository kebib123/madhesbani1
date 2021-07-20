<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Models\Advertisement\AdvertisementModel;
use App\Models\Authors\AuthorModel;
use App\Models\Medias\MediaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News\NewsTypeModel;
use App\Models\News\NewsModel;
use App\Models\Comments\CommentModel;
use App\Models\Settings\SettingModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\PostDocModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class FrontpageController extends Controller
{
    public function index()
    {
        $mukhya_khabar = NewsModel::where(['news_type' => 80, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $uri = NewsTypeModel::where('id', 80)->first();
        $samachar = NewsModel::where(['news_type' => 61, 'status' => '1'])->orderBy('ordering', 'desc')->take(8)->get();
        $rajniti = NewsModel::where(['news_type' => 62, 'status' => '1'])->orderBy('ordering', 'desc')->take(8)->get();
        $corporate = NewsModel::where(['news_type' => 83, 'status' => '1'])->orderBy('ordering', 'desc')->take(5)->get();
        $share_bazar = NewsModel::where(['news_type' => 85, 'status' => '1'])->orderBy('ordering', 'desc')->take(6)->get();
        $bank_bitt = NewsModel::where(['news_type' => 75, 'status' => '1'])->orderBy('ordering', 'desc')->take(5)->get();
        $business = NewsModel::where(['news_type' => 63, 'status' => '1'])->orderBy('ordering', 'desc')->take(8)->get();
        $paryatan = NewsModel::where(['news_type' => 86, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $rojgar = NewsModel::where(['news_type' => 87, 'status' => '1'])->orderBy('ordering', 'desc')->take(5)->get();
        $manoranjan = NewsModel::where(['news_type' => 67, 'status' => '1'])->orderBy('ordering', 'desc')->take(7)->get();
        $swastha = NewsModel::where(['news_type' => 76, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $samaj = NewsModel::where(['news_type' => 68, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $khelkud = NewsModel::where(['news_type' => 81, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $artha_sambad = NewsModel::where(['news_type' => 82, 'status' => '1'])->orderBy('ordering', 'desc')->take(3)->get();
        $corporate_movement = NewsModel::where(['news_type' => 84, 'status' => '1'])->orderBy('ordering', 'desc')->take(3)->get();
        $jiwanshaili = NewsModel::where(['news_type' => 65, 'status' => '1'])->orderBy('ordering', 'desc')->take(3)->get();
        $bigyan_pravidhi = NewsModel::where(['news_type' => 65, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $antarastriya = NewsModel::where(['news_type' => 74, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $ad = AdvertisementModel::where('status', '1')->get();
        $most_read = NewsModel::where('status', '1')->orderBy('visiter', 'desc')->take(4)->get();
        $headline = NewsModel::where(['is_specialnews' => '1', 'status' => '1'])->orderBy('ordering', 'desc')->take(5)->get();
        $breaking_news = NewsModel::where(['is_specialnews' => '2', 'status' => '1'])->orderBy('ordering', 'desc')->take(5)->get();
        $video = MediaModel::orderby('ordering', 'asc')->get();
        $photo_feature = NewsModel::where(['news_type' => 68, 'status' => '1'])->orderBy('ordering', 'desc')->take(6)->get();

        return view('themes.default.frontpage', compact('photo_feature', 'breaking_news', 'video', 'swastha', 'headline', 'khelkud', 'most_read', 'ad', 'antarastriya', 'bigyan_pravidhi', 'jiwanshaili', 'corporate_movement', 'artha_sambad', 'samaj', 'manoranjan', 'rojgar', 'paryatan', 'mukhya_khabar', 'samachar', 'rajniti', 'corporate', 'share_bazar', 'bank_bitt', 'business'));
    }

    public function headline($type_title, $uri)
    {
        $uri_1 = NewsTypeModel::where('news_type', $type_title)->first();
        $type_title = $uri_1['news_type'];

        $newstype_id = $uri_1['id'];
        $related_news = NewsTypeModel::find($newstype_id)->news()->orderBy('ordering', 'desc')->limit(12)->get();
        $uri = explode('.', $uri);
        $_uri = $uri[0];
        $data = NewsModel::where('uri', $_uri)->first();
        return view('themes.headline', compact('data', 'type_title', 'related_news'));
    }

    public function newstype($newstype)
    {
        $news_type = NewsTypeModel::where('uri', $newstype)->first();
        $newstype_id = $news_type['id'];
        $news = NewsTypeModel::find($newstype_id)->news()->where(['status' => '1'])->orderBy('ordering', 'desc')->paginate(25);
//        dd($news_type->id);
//        $news = NewsModel::where('news_type', $news_type->id)->orderBy('ordering', 'desc')->paginate(25);
        $type_title = $news_type['uri'];
        $newstype_id = $news_type['id'];
        $article = NewsModel::where(['news_type' => 80, 'status' => '1'])->orderBy('ordering', 'desc')->take(5)->get();
        $rajniti = NewsModel::where(['news_type' => 62, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $khelkud = NewsModel::where(['news_type' => 81, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();

        return view('themes.default.news-list', compact('khelkud', 'article', 'rajniti', 'news', 'type_title', 'newstype_id', 'news_type'));
    }

    // public function newstype($newstype){
    //       $uri = NewsTypeModel::where('uri',$newstype)->first();
    //       $type_title = $uri['news_type'];
    //       $newstype_id = $uri['id'];
    //       $news = NewsModel::orderBy('id','desc')->get();

    //       $data = array();
    //       foreach($news as $row){
    //         $filter = explode(",", $row->news_type);
    //         if(in_array($newstype_id,$filter)){
    //           $data[] = $row;
    //         }
    //       }
    //       return view('themes.default.news-list', compact('data','type_title','newstype_id'));
    // }

    public function newsdetail($type_title, $uri)
    {
        $uri_1 = NewsTypeModel::where('uri', $type_title)->first();
        $type_title = $uri_1['news_type'];
        $newstype_id = $uri_1['id'];
        $related_news = NewsTypeModel::find($newstype_id)->news()->orderBy('ordering', 'desc')->limit(12)->get();

        $uri = explode('.', $uri);
        $_uri = $uri[0];
        $data = NewsModel::where('uri', $_uri)->first();

        if ($data->id) {
            $visiter = $data->visiter + 1;
            DB::table('cl_news')
                ->where('id', $data->id)
                ->update(['visiter' => $visiter]);
        }
        $mukhya_khabar = NewsModel::where(['news_type' => 80, 'status' => '1'])->orderBy('ordering', 'desc')->take(3)->get();
        $rajniti = NewsModel::where(['news_type' => 62, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $khelkud = NewsModel::where(['news_type' => 81, 'status' => '1'])->orderBy('ordering', 'desc')->take(4)->get();
        $article = NewsModel::where(['news_type' => 80, 'status' => '1'])->orderBy('ordering', 'desc')->take(5)->get();

        return view('themes.default.news-single', compact('article', 'rajniti', 'khelkud', 'mukhya_khabar', 'data', 'type_title', 'related_news', '_uri'));
    }

    /***********************************
     ******** Root Navigation ***********
     ************************************/

    public function sendmail()
    {
        $data = SettingModel::where('id', 1)->first();
        Mail::to($data->email_primary)->send(new SendMail());
        return redirect()->back()->with('message', 'Contact message successfully sent.');
    }

    private function news_block_one($id, $limit)
    {
        $newstype_id = $id;
        $data = NewsTypeModel::find($newstype_id)->news()->where('is_headline', '0')->where('is_breaking_news', '0')->orderBy('ordering', 'desc')->limit($limit)->get();
        return $data;
    }

    private function news_block_one1($newstype, $limit)
    {
        $news = NewsModel::orderBy('ordering', 'desc')->limit(1)->get();
        $data = array();
        $i = 1;
        foreach ($news as $row) {
            $type = explode(',', $row->news_type);
            if (in_array($newstype, $type)) {
                $data[] = $row;
                if ($i >= 1) {
                    continue;
                }
            }
            $i++;
        }
        return $data;
    }

    public function content_search(Request $request)
    {
        if ($request->has('content_search')) {
            $content_search = $request->content_search;
            $data = NewsModel::where('news_title', 'like', '%' . trim($content_search) . '%')->orWhere('news_content', 'like', '%' . trim($content_search) . '%')->paginate(20);
            return view('themes.default.search', compact('data'));
        }
    }

    public function pagedetail($uri)
    {
        if (!check_uri($uri)) {
            abort(404);
        }
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        $tmpl['template'] = 'single';
        if ($tmpl['template']) {
            $data['template'] = $data['template'];
        }

        $data_child = PostModel::where('post_parent', $data['id'])->paginate(12);
        $post_id = $data->id;
        $documents = PostDocModel::where('post_id', $data['id'])->orderBy('ordering', 'desc')->paginate(10);
        $category = PostCategoryModel::all();
        $setting = SettingModel::where('id', 1)->first();
        $article = NewsModel::where(['news_type' => 80, 'status' => '1'])->orderBy('ordering', 'desc')->take(5)->get();

        return view('themes.default.' . $data['template'] . '', compact('article', 'setting', 'data', 'data_child', 'documents', 'category'));
    }

    public function pagedetail_child($parenturi, $uri)
    {
        $data = PostModel::where('uri', $uri)->orWhere('page_key', $uri)->first();
        $tmpl['template'] = 'single';
        if ($tmpl['template']) {
            $data['template'] = $data['template'];
        }
        $data_child = PostModel::where('id', $data['post_parent'])->first();
        if ($data_child) {

            $data['template'] = $data_child['template_child'];
        }

        $data_child2 = PostModel::where('post_parent', $data['id'])->paginate(12);
        $post_id = $data->id;
        $downloads = PostDocModel::where('post_id', $post_id)->get();

        return view('themes.default.' . $data['template'] . '', compact('data', 'data_child', 'data_child2', 'downloads'));
    }

    public function epaper_search(Request $request)
    {
        $year_search = $request->year_search;
        $month_search = $request->month_search;
        $date_search = $request->date_search;
        $epaper_search = '';
        if ($year_search) {
            $epaper_search = PostDocModel::where('post_category', $year_search)->get();
        }
        if ($month_search) {
            $epaper_search = PostDocModel::where('month', $month_search)->get();
        }
        if ($date_search) {
            $epaper_search = PostDocModel::where('cat_id', $date_search)->get();
        }
        if ($year_search && $month_search) {
            $epaper_search = PostDocModel::where(['post_category' => $year_search, 'month' => $month_search])->get();
        }
        if ($year_search && $date_search) {
            $epaper_search = PostDocModel::where(['post_category' => $year_search, 'cat_id' => $date_search])->get();
        }
        if ($month_search && $date_search) {
            $epaper_search = PostDocModel::where(['month' => $month_search, 'cat_id' => $date_search])->get();
        }
        if ($year_search && $month_search && $date_search) {
            $epaper_search = PostDocModel::where(['post_category' => $year_search, 'month' => $month_search, 'cat_id' => $date_search])->get();
        }

        $category = PostCategoryModel::all();
        // print_r($epaper_search); die;
        return view('themes.default.epaper-search', compact('epaper_search', 'category'));
    }

    public function add_comments(Request $request)
    {
        $news = NewsModel::find($request->id);
        $comment = new CommentModel();
        $comment->comment = $request->comment;
        $news->comments()->save($comment);
        return redirect()->back();
    }

    public function author_profile(Request $request)
    {
        $authors[] = DB::table('cl_news')
            ->where('author', $request->id)
            ->get();
        $paginate = $this->paginate($authors, 5, $request);
//        dd($paginate);
        $author = AuthorModel::where('id', $request->id)->first();
//        dd($author->news->first()->newstype->first()->news_type);
        return view('themes.default.author-profile', compact('author', 'paginate'));
    }

    protected function paginate($items, $perPage, $request)
    {
//        $page = Input::get('page', 1); // Get the current page or default to 1
        $page = $request->input('page') ?: 1;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(
            array_slice($items, $offset, $perPage, true),
            count($items), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }


}
