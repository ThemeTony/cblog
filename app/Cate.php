<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public function parent()
    {
        return $this->belongsTo(Cate::class);
    }
    public function children()
    {
        return $this->hasMany(Cate::class, 'parent_id');
    }
}
