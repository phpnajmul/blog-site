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


}
