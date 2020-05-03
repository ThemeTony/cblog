<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class IndexController extends Controller
{
    //
    public function get(){

        $articles=Article::with(['cate:id,name','tags'])->orderBy('sticky','desc')->orderBy('id','desc')->select(['id','title','rendered','created_at','cate_id','sticky','views','image'])->paginate(10);
        $tags=Tag::all();
        return view('index',['articles'=>$articles,'tags'=>$tags]);
    }
}
