<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use James\Sortable\SortableTrait;
use James\Sortable\Sortable;

class NavCate extends Model
{
    public $timestamps = false;
    //
    use SortableTrait;

    public $sortable = [
        'sort_field' => 'sort',       // 排序字段
        'sort_when_creating' => true,   // 新增是否自增，默认自增
    ];
}
