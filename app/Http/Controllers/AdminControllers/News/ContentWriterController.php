<?php

namespace App\Http\Controllers\AdminControllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News\ContentWriterModel;
use App\Models\News\NewsModel;

class ContentWriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ContentWriterModel::all();
        return view('admin.content-writer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content-writer.create');
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
            'name'=>'required',
            'email'=>'required|email|unique:cl_content_writer',
            'phone'=>'required',
            'description'=>'required'
        ]);

        $data = $request->all();
        $result = ContentWriterModel::create($data);
        $last_id = $result->id;
        if($result){
            return redirect('admin/contentwriter/'.$last_id.'/edit')->with('message','Added successful.');
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
        $data = NewsModel::where('content_writer',$id)->get();
         return view('admin.content-writer.newslist-index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ContentWriterModel::where('id',$id)->first();
         return view('admin.content-writer.edit', compact('data'));
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
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'description'=>'required'
        ]);

        $data = ContentWriterModel::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->description = $request->description;
        if($data->save()){
            return redirect()->back()->with('message','Update successful.');
        }else{
            return "Error";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ContentWriterModel::find($id);
        $data->delete();
        return 'Are you sure to delete?';
    }
    
}
