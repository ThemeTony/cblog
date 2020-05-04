<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    //
    public function get($id){
        $tag=Tag::findOrFail($id);
        $articles=$tag->articles()->with(['cate:id,name','tags'])->orderBy('articles.sticky','desc')->orderBy('id','desc')->select(['articles.id','title','rendered','created_at','cate_id','sticky','views','image','kind'])->paginate(10);
        return view('tag',['tag'=>$tag,'articles'=>$articles]);
    }
}
