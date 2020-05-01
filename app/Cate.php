<?php

namespace App;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
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
        return $this->belongsTo(Cate::class);
    }
    public function children()
    {
        return $this->hasMany(Cate::class, 'parent_id');
    }
    public function getAllChildrenAttribute(){
        return Cate::where('path','like',$this->path.'%')->get();
    }
}
