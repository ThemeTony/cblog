<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function cate(){
        return $this->belongsTo(Cate::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function setContentAttribute($value)
    {
        $this->attributes['content']=$value;
        $parsedown=new \ParsedownMath();
        $this->attributes['rendered'] = $parsedown->enableMath()->text($value);
    }
    public function addViews(){
        $this->timestamps=false;
        $this->increment('views');
        $this->timestamps=true;
    }
    //
}
