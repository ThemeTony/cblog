<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Events\ReadPage;

class PageController extends Controller
{
    public function get($id){
        $page=Page::select(['id','title','rendered','created_at','views','updated_at'])->findOrFail($id);
        event(new ReadPage($page));
        return view('page',['page'=>$page]);
    }
    //
}
