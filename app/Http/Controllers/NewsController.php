<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function view(){
        $data['allData'] = News::paginate();
        return view('backend.news.view_news', $data);
    }

    public function create(){
        return view('backend.news.create_news');
    }

    public function store(Request $request){

        $dataValidate = $request->validate([
            'title' => 'required|max:255|unique:news',
            'description' => 'required|max:100',
            'paragraph' => 'required',
            'image' => 'required',
        ]);

        $data = new News();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->paragraph = $request->paragraph;
        $data->added_by = Auth::user()->id;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news/'),$filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message'    => 'News created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.news')->with($notification);
    }

    public function edit($id){
        $data['editData'] = News::find($id);
        return view('backend.news.edit_news', $data);
    }

    public function update(Request $request, $id){

        //dd($request->all());

        $data = News::find($id);


        $dataValidate = $request->validate([
            'title' => 'required|max:255|unique:news,title,' . $data->id,
            'description' => 'required|max:100',
            'paragraph' => 'required',
        ]);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->paragraph = $request->paragraph;
        $data->updated_by = Auth::user()->id;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/news/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news/'),$filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message'    => 'News updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.news')->with($notification);

    }

    public function delete($id){

        $data = News::find($id);
        @unlink(public_path('upload/news/'.$data->image));
        $data->delete();

        $notification = array(
            'message'    => 'News removed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



}
