<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Events\ReadArticle;

class ArticleController extends Controller
{
    public function get($id){
        $article=Article::with(['cate:id,name','tags'])->select(['id','title','rendered','created_at','cate_id','sticky','views','updated_at'])->findOrFail($id);
        $prev_article = Article::where('id','<',$id)->orderBy('id','desc')->select(['id','title'])->first();
        $next_article = Article::where('id','>',$id)->orderBy('id','asc')->select(['id','title'])->first();
        event(new ReadArticle($article));
        return view('article',['article'=>$article,'prev_article'=>$prev_article,'next_article'=>$next_article]);
    }
    //
}
