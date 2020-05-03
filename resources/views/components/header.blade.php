<div id="nav">
    <div id="header">
        <header id="header-div" class="tony-header-fixed">
            <div class="header-div1-1">
                <a href="/" class="nuxt-link-exact-active nuxt-link-active" style="display: inline-block;">
                    <img
                        src="https://file.moetu.org/images/2020/03/20/k5NQhBId6H1D9tT71a9bbd12b762d30.jpg">
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




                    <div class="dropdown-menu" style="">
                        <div class="dropdown dropleft dropdown-submenu">
                            <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Action</button>

                            <div class="dropdown-menu">
                                <button class="dropdown-item" type="button">Sub action</button>

                                <div class="dropdown dropright dropdown-submenu">
                                    <button class="dropdown-item dropdown-toggle" type="button">Another sub action</button>

                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" type="button">Sub action</button>
                                        <button class="dropdown-item" type="button">Another sub action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>

                                <button class="dropdown-item" type="button">Something else here</button>
                                <button class="dropdown-item" type="button" disabled="">Disabled action</button>

                                <div class="dropdown dropright dropdown-submenu">
                                    <button class="dropdown-item dropdown-toggle" type="button">Another action</button>

                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" type="button">Sub action</button>
                                        <button class="dropdown-item" type="button">Another sub action</button>
                                        <button class="dropdown-item" type="button">Something else here</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-header">Dropdown header</div>

                        <div class="dropdown dropright dropdown-submenu">
                            <button class="dropdown-item dropdown-toggle" type="button">Another action</button>

                            <div class="dropdown-menu">
                                <button class="dropdown-item" type="button">Sub action</button>
                                <button class="dropdown-item" type="button">Another sub action</button>
                                <button class="dropdown-item" type="button">Something else here</button>
                            </div>
                        </div>

                        <button class="dropdown-item" type="button">Something else here</button>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item" type="button">Separated link</button>

                    </div>

            </div> <!----> <!---->
        </header>
{{--            <div id="view-div" class="center-info" style="display: none;">--}}
{{--                    <p id="view-text" style="font-weight: 600; font-size: 1.2rem; color: rgb(85, 85, 85);">-&nbsp;All--}}
{{--                            Posts&nbsp;-</p>--}}
{{--                </div>--}}
    </div>
</div>
