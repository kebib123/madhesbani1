<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Settings\SettingModel;

class ListpageComposer{

	public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

	public function compose(View $view){
		$view->with('setting', SettingModel::where('id',1)
			->first());	
	}
	
}