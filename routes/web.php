<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontendControllers\FrontpageController@index')->name('index');
Auth::routes();
// $this->get('adminisclient', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('adminisclient', 'Auth\LoginController@login');
// $this->post('adminlogout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'FrontendControllers\FrontpageController@index');
//================================= Frontend Routes ============================//
Route::redirect('/dashboard', '/admin/dashboard', 301);
Route::get('/newstype-{newstype}','FrontendControllers\FrontpageController@newstype')->name('news.newstype');
//Route::get('{newstype}/{newscategory}','FrontendControllers\FrontpageController@newscategory')->name('news.newscategory');
Route::get('/details-{newstype?}/{uri}','FrontendControllers\FrontpageController@newsdetail')->name('news.newsdetail');
Route::get('/headline-{newstype?}/{uri}','FrontendControllers\FrontpageController@headline')->name('headline.newsdetail');
Route::get('/author-profile/{id?}','FrontendControllers\FrontpageController@author_profile')->name('news.author-profile');

Route::get('page/{uri}.html','FrontendControllers\FrontpageController@pagedetail')->name('page.pagedetail');
Route::get('page/{parenturi}/{uri}.html','FrontendControllers\FrontpageController@pagedetail_child')->name('page.pagedetail_child');
Route::get('{newstype}/test','FrontendControllers\FrontpageController@test');

//Comments
Route::post('page/add_comments','FrontendControllers\FrontpageController@add_comments')->name('add_comments');

// Send Mail
Route::post('contact/sendmail','FrontendControllers\FrontpageController@sendmail')->name('sendmail');
Route::post('page/contentsearch','FrontendControllers\FrontpageController@content_search')->name('page.content_search');
Route::post('page/epaper-search','FrontendControllers\FrontpageController@epaper_search')->name('page.epaper_search');

//================================= Backend Routes ============================//
Route::middleware(['auth'])->group(function () {
	Route::get('admin/dashboard','DashboardController@index')->name('dashboard');
	Route::get('admin-user','AdminControllers\Members\UserController@admin_user');
	Route::get('agent-user','AdminControllers\Members\UserController@agent_user');

	Route::resources([
		'admin/adminmenu'=>'AdminControllers\AdminMenu\AdminMenuController',
		'admin/user'=>'AdminControllers\Members\UserController',
		'admin/member'=>'AdminControllers\Members\MemberController',
		'admin/role'=>'AdminControllers\Members\RoleController',
		'admin/banner'=>'AdminControllers\Banners\BannerController',
		'admin/settings'=>'AdminControllers\Settings\SettingController',
		'admin/postcategory'=>'AdminControllers\Posts\PostCategoryController',
		'admin/newstype'=>'AdminControllers\News\NewsTypeController',
		'admin/newscategory'=>'AdminControllers\News\NewsCategoryController',
		'admin/author'=>'AdminControllers\Authors\AuthorController',
		'admin/contentwriter'=>'AdminControllers\News\ContentWriterController',
		'admin/media'=>'AdminControllers\Medias\MediaController',
		'admin/advertisement'=>'AdminControllers\Advertisement\AdvertisementController',
	]);

	Route::get('admin/permissionedit/{user}','AdminControllers\Members\UserController@permission_edit')->name('user.permissionEdit');;
	Route::put('admin/permissionedit/{user}','AdminControllers\Members\UserController@permission_update')->name('user.permissionUpdate');;

	Route::get('admin/assignroles/{id}','AdminControllers\Members\UserController@assign_roles')->name('user.assignroles');
	Route::put('admin/assignroles/{user}','AdminControllers\Members\UserController@update_roles')->name('user.update_roles');

	Route::get('admin/assignnewstype/{id}','AdminControllers\Members\UserController@assign_newstype')->name('user.assign_newstype');
	Route::put('admin/assignnewstype/{user}','AdminControllers\Members\UserController@update_newstype')->name('user.update_newstype');

	Route::get('admin/userprofile','AdminControllers\Members\UserController@userprofile')->name('admin.userprofile');
	Route::put('admin/update_password','AdminControllers\Members\UserController@update_password')->name('admin.update_password');
	Route::get('admin/changepassword','AdminControllers\Members\UserController@changepassword')->name('admin.changepassword');

	// For posttype
	Route::get('type/{posttype}', 'AdminControllers\Posts\PostTypeController@index')->name('type.posttype.index');
	Route::get('type/{posttype}/create', 'AdminControllers\Posts\PostTypeController@create')->name('type.posttype.create');
	Route::post('type/{posttype}/store', 'AdminControllers\Posts\PostTypeController@store')->name('type.posttype.store');
	Route::post('type/{posttype}/{id}', 'AdminControllers\Posts\PostTypeController@update')->name('type.posttype.update');
	Route::get('type/{posttype}/{id}/edit', 'AdminControllers\Posts\PostTypeController@edit')->name('type.posttype.edit');
	Route::delete('type/{posttype}/{id}', 'AdminControllers\Posts\PostTypeController@destroy')->name('type.posttype.destroy');
	Route::delete('delete_posttype_thumb/{id}','AdminControllers\Posts\PostTypeController@delete_posttype_thumb');

    // For post
	Route::get('editor/{post}', 'AdminControllers\Posts\PostController@index')->name('editor.post.index');
	Route::get('editor/{post}/create', 'AdminControllers\Posts\PostController@create')->name('editor.post.create');
	Route::post('editor/{post}/store', 'AdminControllers\Posts\PostController@store')->name('editor.post.store');
	Route::put('editor/{post}/{id}', 'AdminControllers\Posts\PostController@update')->name('editor.post.update');
	Route::get('editor/{post}/{id}/edit', 'AdminControllers\Posts\PostController@edit')->name('editor.post.edit');
	Route::get('editor/{post}/{id}', 'AdminControllers\Posts\PostController@childlist')->name('post.childlist');
	Route::delete('editor/{post}/{id}', 'AdminControllers\Posts\PostController@destroy')->name('editor.post.destroy');
	Route::delete('delete_post_thumb/{id}','AdminControllers\Posts\PostController@delete_post_thumb');
	Route::delete('delete_cover/{id}','AdminControllers\Posts\PostController@delete_cover');
	Route::delete('delete_icon/{id}','AdminControllers\Posts\PostController@delete_icon');
	Route::delete('delete_thumb/{id}','AdminControllers\Posts\AssociatedPostController@delete_thumb');
    Route::delete('delete_audio/{id}', 'AdminControllers\Posts\PostController@delete_audio');


    // for post category
	Route::delete('admin/delete_category_thumb/{id}','AdminControllers\Posts\PostCategoryController@delete_category_thumb');
	Route::delete('delete_thumbnail/{id}','AdminControllers\Medias\MediaController@delete_thumbnail');

	// Upload multiple document
	Route::get('doc/multipledocument/{post_id}','AdminControllers\Posts\PostDocController@index')->name('doc.multipledocument');
	Route::get('doc/multipledocument/{post_id}/create','AdminControllers\Posts\PostDocController@create');
	Route::post('doc/multipledocument/store','AdminControllers\Posts\PostDocController@store')->name('multipledocument.store');
	Route::get('doc/multipledocument/{post_id}/{id}/edit','AdminControllers\Posts\PostDocController@edit');
	Route::post('doc/multipledocument/{post_id}','AdminControllers\Posts\PostDocController@update');
	Route::delete('doc/deleterow/{id}','AdminControllers\Posts\PostDocController@destroy');
	Route::delete('doc/multipledocument/{id}','AdminControllers\Posts\PostDocController@delete_doc_file');
	Route::delete('doc/doc_thumb/{id}','AdminControllers\Posts\PostDocController@delete_doc_thumb');

    // Upload multiple image
	Route::get('admin/multiplephoto/{post_id}','AdminControllers\Posts\PostImageController@upload_form')->name('admin.multiplephoto');
	Route::post('multiplephoto/store','AdminControllers\Posts\PostImageController@store')->name('multiplephoto.store');
	Route::delete('admin/multiplephoto/{id}','AdminControllers\Posts\PostImageController@destroy');

	// Upload multiple video
	Route::get('admin/multiplevideo/{post_id}','AdminControllers\Posts\MultipleVideoController@index');
	Route::get('admin/multiplevideo/{post_id}/create','AdminControllers\Posts\MultipleVideoController@create');
	Route::get('admin/multiplevideo/{post_id}/{id}/edit','AdminControllers\Posts\MultipleVideoController@edit');
	Route::post('admin/multiplevideo','AdminControllers\Posts\MultipleVideoController@store');
	Route::put('admin/multiplevideo/{post_id}','AdminControllers\Posts\MultipleVideoController@update');
	Route::delete('admin/multiplevideo/{id}','AdminControllers\Posts\MultipleVideoController@destroy');

	View::composer(['*'], function($view){
		$newstype = App\Models\News\NewsTypeModel::orderBy('ordering', 'asc')->get();
		$view->with('newstype', $newstype);
	});

		View::composer(['*'], function($view){
		$posttype = App\Models\Posts\PostTypeModel::orderBy('ordering', 'asc')->get();
		$view->with('posttype', $posttype);
	});


	// For News
	Route::get('admin/type/{type?}','AdminControllers\News\NewsController@news_list')->name('news.list');
	Route::get('admin/type/{type?}/create','AdminControllers\News\NewsController@create')->name('news.create');
	Route::post('admin/type/{type?}/store','AdminControllers\News\NewsController@store')->name('news.store');
	Route::get('admin/type/{type?}/{id}/edit','AdminControllers\News\NewsController@edit')->name('news.edit');
	Route::put('admin/type/{type?}/{id}','AdminControllers\News\NewsController@update')->name('news.update');
	Route::delete('admin/type/{type?}/{id}','AdminControllers\News\NewsController@destroy');
	Route::delete('delete_news_thumbnail/{id}','AdminControllers\News\NewsController@delete_news_thumbnail');
	Route::get('admin/newstype/{id}/child','AdminControllers\News\NewsTypeController@listchild')->name('news.listchild');


    Route::post('admin/type/{type?}/{id}/newsstatus','AdminControllers\News\NewsController@news_status');

	//
	Route::get('admin/breaking-news', 'AdminControllers\News\NewsController@headlines' )->name('news.headlines');
	Route::get('admin/headline-news', 'AdminControllers\News\NewsController@breaking_news' )->name('news.breaking-news');
});
