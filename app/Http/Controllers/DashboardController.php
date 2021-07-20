<?php

namespace App\Http\Controllers;
use App\Models\News\NewsModel;
use App\Models\News\NewsTypeModel;
use App\Models\News\NewsCategoryModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Settings\SettingModel;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = NewsTypeModel::orderBy('ordering', 'asc')->get();
        $recent_news = NewsModel::orderBy('id','desc')->take(10)->get();
        $total_news = NewsModel::count();
        $news_visiters = NewsModel::sum('visiter');
        $max_viewed = NewsModel::orderBy('visiter','desc')->take(10)->get();
        $total_category = NewsCategoryModel::count();
        $num_of_inquiries = SettingModel::first()->num_of_inquiries;
        return view('admin.dashboard',compact('recent_news','total_news','total_category','news_visiters','max_viewed','num_of_inquiries'));
    }
}
