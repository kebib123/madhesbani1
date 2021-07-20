<?php

namespace App\Http\Controllers\AdminControllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\News\NewsTypeModel;

class NewsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = NewsTypeModel::where('parent_id',0)->get();
         return view('admin.news-type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $ordering = NewsTypeModel::max('ordering');
         $_ordering = 0;
        if( $ordering !== NULL ){
            $_ordering = $ordering + 1;
        }
        $newstype1 = NewsTypeModel::where('parent_id','0')->get();
        return view('admin.news-type.create', compact('newstype1','_ordering'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'news_type'=> 'required|unique:cl_news_type',
            'uri'=>'required'
        ]);

        $data = $request->all();
        $data['uri'] = Str::slug($request->uri);
        $result = NewsTypeModel::create($data);
        $last_id = $result->id;
        if($result){
            return redirect( 'admin/newstype/' . $last_id . '/edit' )->with('message','Stored Successfully');
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
    public function edit($id)
    {
     $data = NewsTypeModel::find($id);
     $newstype1 = NewsTypeModel::where('parent_id','0')->get();
     return view('admin.news-type.edit', compact('data','newstype1'));
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
         $request->validate([
            'news_type'=> 'required',
            'uri'=>'required'
        ]);
        $data = NewsTypeModel::find($id);
        $data->news_type = $request->news_type;
        $data->ordering = $request->ordering;
        $data->uri = Str::slug($request->uri);
        $data->is_menu = $request->is_menu;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->parent_id = $request->parent_id;
        $data->save();
        return redirect()->back()->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = NewsTypeModel::find($id);
        $data->delete();
    }

     public function listchild($newstype){
        $newstype = NewsTypeModel::where('uri',$newstype)->first();
        $data = NewsTypeModel::where('parent_id',$newstype->id)->orderBy('ordering','asc')->get();
        return view('admin.news-type.child-index', compact('data'));
    }

}
