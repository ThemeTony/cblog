<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Cate;

class CateController extends Controller
{
    //
    public function get($id){
        $cate=Cate::findOrFail($id);
        $articles=Article::where('cate_id',$id)->with(['tags'])->orderBy('sticky','desc')->orderBy('id','desc')->select(['id','title','rendered','created_at','cate_id','sticky','views','image'])->paginate(10);
        return view('cate',['cate'=>$cate,'articles'=>$articles]);
    }
}
