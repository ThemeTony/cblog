<ul class="article-list">
    <!---->
    <li
        class="article-list-item reveal index-post-list notice-list"
        title="使用本站即视为默认同意本站收集 cookies 数据，网站使用 cookies 技术以提供最佳用户体验"
        id="cookie-notice"
    >
        <div>使用本站即视为默认同意本站收集 cookies 数据，网站使用 cookies 技术以提供最佳用户体验</div>
        <a href="#">已了解</a>
    </li>
    @foreach($articles as $article)
        <li class="article-list-item reveal index-post-list @if($article->sticky)
            sticky-one
@endif">
            @if(empty($article->image))
                <div class="list-show-div"><!---->
                    @if($article->sticky)
                        <em class="article-list-type1 sticky-one-tag">
                            <i class="ri-arrow-up-circle-line"></i>
                            顶置
                        </em>
                    @endif
                    <div class="article-list-tags"><a href="{{route('cate',['id'=>$article->cate->id])}}"
                                                      class="list-normal-tag"
                                                      style="color: rgba(255, 152, 0, 0.83) !important;">{{$article->cate->name}}</a>
                        @foreach($article->tags as $tag)
                            <a style="margin-left: 5px;" href="{{route('tag',['id'=>$tag->id])}}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    <a class=""><a style="text-decoration: none;" href="{{route('article',['id'=>$article->id])}}"><h5>{{ $article->title }}</h5></a></a>
                    <p class="article-list-content">{{mb_substr(strip_tags($article->rendered),0,150,'utf-8')}}</p>
                    <div class="article-list-footer "><span
                            class="article-list-date">{{ $article->created_at->diffForHumans() }} </span><span
                            class="article-list-divider">-</span> <span
                            class="article-list-minutes">{{ $article->views }}&nbsp;Views</span>
                    </div>
                </div>
            @else
                <div class="article-list-img-else">
                    <div
                        class="article-list-img"
                        style="{{'background-image:url('.'/storage/'.$article->image.')'}}"
                    ></div>
                    <div class="article-list-img-right">
                        <!-- 置顶文章提示 -->
                        @if($article->sticky)
                            <em class="article-list-type1 sticky-one-tag">
                                <i class="ri-arrow-up-circle-line"></i>
                                顶置
                            </em>
                        @endif
                        {{--                                    <!-- 置顶文章提示 -->--}}
                        <a
                            href="{{route('cate',['id'=>$article->cate->id])}}"
                            class="img-cate list-normal-tag"
                            style="color: rgba(255, 152, 0, 0.83) !important;"
                        >
                            <b>{{$article->cate->name}}</b>
                        </a>
                        <a>
                            <a style="text-decoration: none;" href="{{route('article',['id'=>$article->id])}}">
                                <h5
                                    style="margin: 0px;padding: 0px;margin-top:15px"
                                >{{$article->title}}</h5>
                            </a>
                        </a>
                        <p class="article-list-content">{{mb_substr(strip_tags($article->rendered),0,150,'utf-8')}}</p>
                        <div class="article-list-footer">
                            <span class="article-list-date">{{$article->created_at->diffForHumans()}}</span>
                            <span class="article-list-divider">-</span>
                            <span
                                class="article-list-minutes"
                            >{{$article->views}}&nbsp;Views</span>
                        </div>
                    </div>
                </div>
            @endif
        </li>
    @endforeach
    <div style="text-align: center;">{{$articles->links()}}</div>
</ul>
