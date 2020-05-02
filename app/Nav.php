<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
class Nav extends Model
{
    use ModelTree, AdminBuilder;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('name');
    }
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
