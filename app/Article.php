<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    public function cate(){
        return $this->belongsTo(Cate::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function setContentAttribute($value)
    {
        if($this->attributes['kind']==0) {
            $this->attributes['content'] = $value;
            $parsedown = new \ParsedownMath();
            $this->attributes['rendered'] = $parsedown->enableMath()->text($value);
        }else{
            $this->attributes['rendered']=$this->attributes['content'];
        }
    }
    public function addViews(){
        $this->timestamps=false;
        $this->increment('views');
        $this->timestamps=true;
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['rendered']=strip_tags($this->attributes['rendered']);
        $array['url']=route('article',['id'=>$array['id']]);
        return $array;
    }
}
