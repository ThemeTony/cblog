<div class="index-cates">
    @foreach(\App\NavCate::orderBy('sort')->get() as $cate)
        <li class="cat-item cat-item-4 cat-real" style="display: inline-block;">
            <a href="{{$cate->link}}" class="" title="1">
                <div class="header-item-icon-div">
                    <i class="{{$cate->icon}}"></i>
                </div>
                {{$cate->name}}
            </a>
        </li>
    @endforeach
</div>
