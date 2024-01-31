<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function viewBlog(){
        $data['allData'] = News::all();
        return view('frontend.blog.view_blog',$data);
    }

    public function newsDetails($id){
        $data['allData'] = News::where('id',$id)->first();

        //dd($data['allData']->toArray());
        return view('frontend.news.news_details',$data);
    }





}
