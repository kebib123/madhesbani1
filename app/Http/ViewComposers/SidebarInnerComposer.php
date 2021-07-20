<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\News\NewsModel;
use App\Models\Settings\SettingModel;

class SidebarInnerComposer{

	public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){

		$view->with('trending', NewsModel::where('uri','<>','NULL')->orderBy('visiter','desc')->limit(10)->get());

	}

}
