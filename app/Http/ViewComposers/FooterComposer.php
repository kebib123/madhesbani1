<?php

namespace App\Http\ViewComposers;

use App\Models\Posts\PostModel;
use Illuminate\Contracts\View\view;
use App\Models\Settings\SettingModel;
use App\Models\News\NewsTypeModel;

class FooterComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){

		$view->with('footernews_section1', NewsTypeModel::where(['is_menu'=>'1','parent_id'=>'0','status'=>1])
			->orderBy('ordering','asc')
			->get());

		$view->with('footernews_section2', NewsTypeModel::where(['is_menu'=>'1','parent_id'=>'3','status'=>1])
			->orderBy('ordering','asc')
			->get());

		$view->with('setting', SettingModel::where('id',1)
			->first());

        $view->with('about', PostModel::where('id',24)
            ->first());
        $view->with('contact', PostModel::where('id',10)
            ->first());

        $view->with('ad', PostModel::where('id',25)
            ->first());
    }
}
