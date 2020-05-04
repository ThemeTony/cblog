<div id="nav">
    <div id="header">
        <header id="header-div" class="tony-header-fixed">
            <div class="header-div1-1">
                <a href="/" class="nuxt-link-exact-active nuxt-link-active" style="display: inline-block;">
                    <img
                        src="{{config('cblog.avatar')}}">
                </a>
{{--                <a>--}}
{{--                    <button type="button" class="btn btn-light">Search</button>--}}
{{--                </a>--}}
{{--                            <a>--}}
{{--                                    <button type="button" class="btn btn-light">中文版</button>--}}
{{--                                </a>--}}
            </div>
            <div class="header-div2">
                <div class="btn-group">
                    @foreach(\App\Nav::where('parent_id',0)->orderBy('sort')->with('allChildren')->get() as $item)
                        @empty($item->allChildren[0])
                                <a href="{{$item->link}}"><button class="btn btn-light" type="button">{{$item->name}}</button></a>
                        @else
                            <a href="{{$item->link}}" class="btn btn-primary" style="border-top-left-radius: .25em;border-bottom-left-radius: .25em;">{{$item->name}}</a>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" data-submenu="" aria-expanded="false"></button>
                            <div class="dropdown-menu" style="">
                                @foreach($item->allChildren as $child_item)
                                    @component('components.headerItem',['item'=>$child_item])
                                    @endcomponent
                                @endforeach
                            </div>
                        @endempty
                    @endforeach
                </div>
            </div> <!----> <!---->
        </header>
{{--            <div id="view-div" class="center-info" style="display: none;">--}}
{{--                    <p id="view-text" style="font-weight: 600; font-size: 1.2rem; color: rgb(85, 85, 85);">-&nbsp;All--}}
{{--                            Posts&nbsp;-</p>--}}
{{--                </div>--}}
    </div>
</div>
