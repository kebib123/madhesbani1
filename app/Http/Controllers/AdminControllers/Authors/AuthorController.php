<?php

namespace App\Http\Controllers\AdminControllers\Authors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Authors\AuthorModel;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AuthorModel::all();
        return view('admin.authors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create');
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
            'email'=>'required|email|unique:cl_authors',
            'phone'=>'required',
            'description'=>'required'
        ]);

        $data = $request->all();
        $result = AuthorModel::create($data);
        $last_id = $result->id;
        if($result){
            return redirect('admin/author/'.$last_id.'/edit')->with('message','Author added successfully.');
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
        $data = AuthorModel::where('id',$id)->first();
        return view('admin.authors.edit', compact('data'));
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
            'name'=>'required|unique:cl_authors',
            'email'=>'required',
            'phone'=>'required',
            'description'=>'required'
        ]);

        $data = AuthorModel::find($id);
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
        $data = AuthorModel::find($id);
        $data->delete();
        return 'Are you sure to delete?';
    }
}
