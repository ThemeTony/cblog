<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Nav extends Model
{
    public function parent()
    {
        return $this->belongsTo(Nav::class);
    }
    public function children()
    {
        return $this->hasMany(Nav::class, 'parent_id');
    }
    public function allChildren(){
        return $this->children()->orderBy('sort')->with('allChildren');
    }
    //
}
