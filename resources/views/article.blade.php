@extends('layouts.base')
@section('title',$article->title)
@section('main')
    <div id="posts">
        <div class="grid grid-centered">
            <div class="grid-cell" id="grid-cell">
                {{-- 左侧区块 --}}
                <div class="single-left" :style="(exist_index ? '' : 'margin-top:-15px')">
                    <div class="index-div">
                        <div class="single-index">
                            <h4>
                                <i class="ri-list-check-2"></i>
                                Index
                            </h4>
                        </div>
                        <ul id="article-index" class="index-ul"></ul>
                    </div>
                    <div class="index-div-next" id="loading_math">
                        <p>
                            <span aria-hidden="true" class="spinner-grow text-secondary"><!----></span>数学公式加载中
                        </p>
                    </div>
                    <div>
                        @if($prev_article)
                        <div
                            class="index-div-next"

                        >
                            <h4>
                                <i class="czs-hande-vertical"></i>
                                Previous
                            </h4>
                            <p>
                                <a href="{{route('article',['id'=>$prev_article->id])}}">{{ $prev_article->title }}</a>
                            </p>
                        </div>
                        @endif
                        @if($next_article)
                        <div
                            class="index-div-next"
                        >
                            <h4>
                                <i class="czs-hand-horizontal"></i>
                                Next
                            </h4>
                            <p>
                                <a href="{{route('article',['id'=>$next_article->id])}}">{{ $next_article->title }}</a>
                            </p>
                        </div>
                        @endif
                        <div
                            class="index-div-next single-donate"
                        >
                            <a class="single-donate-a">
                                贡献
                                <i class="ri-hand-heart-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- 左侧区块 -->

                <!-- 文章主体 -->

                <!-- 阅读进度条 -->
                <div class="reading-bar"></div>
                <!-- 阅读进度条 -->

                <article class="article reveal">
                    <div id="load">
                        <!-- 文章顶部 -->
                        <div class="article-header">
                            <span class="badge badge-pill badge-danger single-badge">
                                <a style="text-decoration:none;text-decoration-color: #1e87f0;color: #1e87f0">
                                  <i class="ri-article-line"></i>
                                  Blog Post
                                </a>
                            </span>
                            <span class="badge badge-pill badge-danger single-badge" style="margin-left: 10px;">
                                <a
                                    class="post-header"
                                    href="{{route('cate',['id'=>$article->cate->id])}}"
                                >{{ $article->cate->name }}</a>
                            </span>
{{--                            {#                            <span#}--}}
{{--                            {#                                    class="badge badge-pill badge-danger single-badge"#}--}}
{{--                            {#                                    style="margin-left: 10px;"#}--}}
{{--                            {#                            >#}--}}
{{--                            {#                                <a#}--}}
{{--                            {#                                        class="post-header"#}--}}
{{--                            {#                                >阅读时长</a>#}--}}
{{--                            {#                            </span>#}--}}
                            <!-- 文章标题 -->
                            <h2 class="single-h2">{{ $article->title }}</h2>
                            <!-- 文章标题 -->

                            <!-- 底部信息 -->
                            <div class="article-list-footer">
                                <span class="article-list-date" data-toggle="tooltip" title="created time:{{ $article->created_at }}  |  updated time:{{ $article->updated_at }}">{{ $article->created_at->diffForHumans() }}</span>
                                <span class="article-list-divider">/</span>
                                <span class="article-list-minutes">{{ $article->views }}&nbsp;Views</span>
                                <span class="article-list-divider">/</span>
                                <span class="article-list-minutes">About {{ mb_strlen(strip_tags($article->rendered),'utf-8') }}&nbsp;Words</span>
{{--                                <span--}}
{{--                                    class="article-list-minutes"--}}
{{--                                >{{ $article.words }}&nbsp;Words</span>--}}
                            </div>
                            <!-- 底部信息 -->

                            <div class="single-line"></div>
                        </div>
                        <!-- 文章顶部 -->

                        <!-- 文章内容 -->
                        <div class="article-content">{!! $article->rendered !!}</div>
                        <!-- 文章内容 -->

                        <!-- 文章标签 -->
                        <div
                            style="text-align: left;margin: 60px 0px 40px 8px;border-radius: 6px;"
                        >
                            <ul
                                class="post_tags"
                                style="margin: 0;padding: 0px;width: 100%;padding-bottom: 15px;"
                            >
                                <li
                                    class="cat-real"
                                    style="display: inline-block;color: rgb(102, 102, 102);font-size: 1.1rem;font-weight: 600;margin: 0px;letter-spacing: 1px;"
                                >
                                    <a
                                        style="background-color: #e7f3ff;color: #2f94fe;padding: 1px 12px 1px;border-radius: 4px;font-size: .9rem;"
                                    ><i class="ri-price-tag-3-line"></i>Tags</a>
                                </li>
                                @foreach($article->tags as $tag)
                                <li
                                    class="cat-real"
                                    style="display: inline-block;"
                                >
                                    <a
                                        style="font-size: .9rem;border-radius: 4px;padding: 1px 12px 1px;"
                                        href="{{route('tag',['id'=>$tag->id])}}"
                                    >{{ $tag->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- 文章标签 -->
                    </div>
                </article>
                <article class="article reveal"><!-- 文章评论 -->
                    <div id="vcomments">
                        <span aria-hidden="true" class="spinner-grow text-secondary"><!----></span>
                        评论系统加载中
                    </div>
                    <!-- 文章评论 -->
                </article>
                <!-- 文章主体 -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function Onload() {
            var element = document.createElement("script");
            element.src = "https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML";
            document.body.appendChild(element);
            element.onload = function () {
                $("#loading_math").slideUp(1500);
            }

            var element = document.createElement("script");
            element.src = "/js/prism.js";
            document.body.appendChild(element);

            $.getScript("//unpkg.com/valine/dist/Valine.min.js", function () {
                new Valine({
                    el: '#vcomments',
                    appId: '{{env('VALINE_ID')}}',
                    appKey: '{{env("VALINE_KEY")}}',
                    recordIP: true,
                    meta: ['nick', 'mail'],
                    mathJax: true,
                })
            })

            createIndex()
            createReadingBar()
        }

        if (window.addEventListener)
            window.addEventListener("load", Onload, false);
        else if (window.attachEvent)
            window.attachEvent("onload", Onload);
        else
            window.onload = Onload;

        function createReadingBar(){
            //文章阅读进度条
            var content_offtop = $('.article-content').offset().top
            var content_height = $('.article-content').innerHeight()
            $(window).scroll(function() {
                if ($(this).scrollTop() > content_offtop) {
                    //滑动到内容部分
                    if ($(this).scrollTop() - content_offtop <= content_height) {
                        //在内容部分内滑动
                        this.reading_p = Math.round(
                            (($(this).scrollTop() - content_offtop) / content_height) * 100
                        )
                    } else {
                        //滑出内容部分
                        this.reading_p = 100
                    }
                } else {
                    //未滑到内容部分
                    this.reading_p = 0
                }
                $('.reading-bar').css('width', this.reading_p + '%')
            })
        }
        function createIndex() {
            /* 文章目录 */
            var h = 0
            var pf = 23
            var i = 0
            $('#article-index').html('')
            var count_in, count_ar, count_sc, count_e
            var count_ti = (count_in = count_ar = count_sc = count_e = 1)
            var offset = new Array()
            var min = 0
            var c = 0
            var icon = ''

            //获取最高级别h标签
            $('.article-content>:header').each(function () {
                h = $(this)
                    .eq(0)
                    .prop('tagName')
                    .replace('H', '')
                if (c == 0) {
                    min = h
                    c++
                } else {
                    if (h <= min) {
                        min = h
                    }
                }
            })

            //获取h标签内容
            $('.article-content>:header').each(function () {
                h = $(this)
                    .eq(0)
                    .prop('tagName')
                    .replace('H', '') //标签级别
                let addCount = Math.abs(h - min)
                for (i = 0; i < addCount; ++i) {
                    //偏移程度
                    pf += 10
                }
                if (pf !== 23) {
                    //图标
                    icon = 'ri-stop-line'
                } else {
                    icon = 'ri-checkbox-blank-circle-line'
                }

                $('#article-index').html(
                    $('#article-index').html() +
                    '<li id="ti' +
                    count_ti++ +
                    '" style="padding-left:' +
                    pf +
                    'px"><a><i class="' +
                    icon +
                    '"></i>&nbsp;&nbsp;' +
                    $(this)
                        .eq(0)
                        .text()
                        .replace(/[ ]/g, '') +
                    '</a></li>'
                ) //创建目录
                $(this)
                    .eq(0)
                    .attr('id', 'in' + count_in++) //添加id
                offset[0] = 0
                offset[count_ar++] = $(this)
                    .eq(0)
                    .offset().top //位置存入数组
                count_e++
                pf = 23 //设置初始偏移值
                i = 0 //设置循环开始
            })

            //跳转对应位置事件
            $('#article-index li').click(function () {
                $('html,body').animate(
                    {
                        scrollTop:
                            $(
                                '#in' +
                                $(this)
                                    .eq(0)
                                    .attr('id')
                                    .replace('ti', '')
                            ).offset().top - 100
                    },
                    500
                )
            })

            if (count_e !== 1) {
                //若存在h3标签

                $(window).scroll(function () {
                    //滑动窗口时
                    var scroH = $(this).scrollTop() + 130
                    var navH = offset[count_sc] //从1开始获取当前h3位置
                    var navH_prev = offset[count_sc - 1] //获取上一个h3位置(以备回滑)
                    if (scroH >= navH) {
                        //滑过当前h3位置
                        $('#ti' + (count_sc - 1)).attr('class', '')
                        $('#ti' + count_sc).attr('class', 'active')
                        $('#article-index').animate(
                            {
                                scrollTop: $('#article-index>#ti' + count_sc)[0].offsetTop
                            },
                            100
                        )
                        count_sc++ //调至下一个h3位置
                    }
                    if (scroH <= navH_prev && count_sc - 2 !== 0) {
                        //滑回上一个h3位置,调至上一个h3位置
                        $('#ti' + (count_sc - 2)).attr('class', 'active')
                        $('#article-index').animate(
                            {
                                scrollTop:
                                    $('#article-index>#ti' + (count_sc - 2))[0].offsetTop - 50
                            },
                            100
                        )
                        count_sc--
                        $('#ti' + count_sc).attr('class', '')
                    }
                    if (scroH <= navH_prev && count_sc - 2 == 0) {
                        //首个标题直接滑动至顶部
                        $('#ti1').attr('class', 'active')
                        $('#article-index').scrollTop(0)
                    }
                })
            } else {
                $('.index-div').css('display', 'none')
                this.exist_index = false
            }
            /* 文章目录 */
        }
    </script>
@endsection
