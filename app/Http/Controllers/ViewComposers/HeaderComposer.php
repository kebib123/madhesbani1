<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\News\NewsTypeModel;
use App\Models\Settings\SettingModel;
use App\Models\Posts\PostTypeModel;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostCategoryModel;

class HeaderComposer{

	 public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){
		$view->with('navigations', NewsTypeModel::where(['is_menu'=>'1','parent_id'=>'0','status'=>1])
			->orderBy('ordering','asc')
			->get());	
		
		$view->with('header_type', PostTypeModel::where(['is_menu'=>'1','status'=>1])
			->orderBy('ordering','asc')
			->get());	
						
		$view->with('setting', SettingModel::where('id',1)
			->first());	
	}
	
}