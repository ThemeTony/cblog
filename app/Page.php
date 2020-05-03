<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
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
