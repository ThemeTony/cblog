<div id="nav">
    <div id="header">
        <header id="header-div" class="tony-header-fixed">
            <div class="header-div1-1">
                <a href="/" class="nuxt-link-exact-active nuxt-link-active" style="display: inline-block;">
                    <img
                        src="{{config('cblog.avatar')}}">
                </a>
                <a>
                    <button type="button" class="btn btn-light" id="search-btn">Search</button>
                </a>
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
            <div class="search_form_play" style="display:none" >
                <div class="search-bg">
                    <div class="search-div1">
                        <h3>
                            Search
                            <button
                                type="button"
                                class="btn btn-primary"
                                style="font-weight: 600;padding: 4px 14px;font-size: .9rem;margin-top: 6px;margin-left: 10px;float: right;"
                                id="closeSearch"
                            >Close</button>
                        </h3>
                        <p>Search this website.</p><div style="width: 120px"><a href="https://algolia.com"><img alt="Search by algolia" link="algolia.com"  src="https://res.cloudinary.com/hilnmyskv/image/upload/q_auto/v1587462408/Algolia_com_Website_assets/images/search/search-by-algolia.svg"></a></div>
                        <input
                            class="uk-input"
                            type="text"
                            placeholder="Type in what you'd like to know and press Enter"
                            id="search-input"
                        />
                    </div>
                    <div class="search-div2">
                        <ul id="search-list">

                            <li id="search-none">
                                <h4 style="color:#777"></h4>
                                <p></p>
                            </li>
                        </ul>
                        <ul id="search-loading" style="display: none">
                            <div class="skeleton" style="padding:0px">
                                <div class="skeleton-body" style="margin: 0px;">
                                    <div class="skeleton-title" style="width:100%"></div>
                                    <div class="skeleton-content"></div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
{{--            <div id="view-div" class="center-info" style="display: none;">--}}
{{--                    <p id="view-text" style="font-weight: 600; font-size: 1.2rem; color: rgb(85, 85, 85);">-&nbsp;All--}}
{{--                            Posts&nbsp;-</p>--}}
{{--                </div>--}}
    </div>
</div>
<script>
    $.getScript('//cdn.staticfile.org/algoliasearch/4.2.0/algoliasearch-lite.umd.js',function () {
        const client = algoliasearch('{{config("cblog.algolia_id")}}','{{config("cblog.algolia_only_search_key")}}');
        index = client.initIndex('articles');
    })
    let timer,last="";
    $("#search-btn").click(function () {
        $(".search_form_play").show(150);
        timer = setInterval(search, 2000);
    });
    $('#closeSearch').click(function () {
        $(".search_form_play").hide(150);
        clearInterval(timer)
    })
    $('#search-input').keyup(function (e) {
        if (e.which == 13) {
            search()
        }
    })
    function search() {
        let sc=$('#search-input').val()
        if(sc!= last){
            $('.search-one').remove()
            $('#search-loading').show()
            $('#search-none').hide()
            index.search(sc).then(({ hits }) => {
                $('#search-loading').hide()
                console.log(hits)
                if(hits.length){
                    hits.forEach(function (i) {
                        $('#search-list').append('<li class="search-one"><a href="'+i.url+'"><h4>'+i.title+'</h4><p>'+ i.rendered+'</p></a></li>');
                    })
                    $('.search-one').click(function () {
                        $(".search_form_play").hide(150);
                    })
                }else{
                    $('#search-none').show();
                }
            });
            last=sc
        }
    }
</script>
