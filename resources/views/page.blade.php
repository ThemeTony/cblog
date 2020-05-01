@extends('layouts.base')
@section('main')
    <div id="page">
        <div class="grid grid-centered">
            <div class="grid-cell" id="grid-cell">
                <article class="article reveal comment-article">
                    <div id="load">
                        <header class="article-header comment-header">
                            <h2 class="single-h2 page-title">{{$page->title}}</h2>
                            <div class="article-list-footer page-footer">
                                <span class="article-list-date" data-toggle="tooltip" title="created time:{{ $page->created_at }}  |  updated time:{{ $page->updated_at }}">{{ $page->created_at->diffForHumans() }}</span>
                                <span class="article-list-divider">/</span>
                                <span class="article-list-minutes">{{ $page->views }}&nbsp;Views</span>
                                <span class="article-list-divider">/</span>
                                <span class="article-list-minutes">About {{ mb_strlen(strip_tags($page->rendered),'utf-8') }}&nbsp;Words</span>
                            </div>
                            <div class="single-line"></div>
                        </header>
                        <div class="article-content">{!! $page->rendered !!}</div>
                        <!-- 评论 -->
                        <div id="vcomments"></div>
                        <!-- 评论 -->
                    </div>
                </article>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function Onload() {
            var element = document.createElement("script");
            element.src = "https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML";
            document.body.appendChild(element);

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
        }

        if (window.addEventListener)
            window.addEventListener("load", Onload, false);
        else if (window.attachEvent)
            window.attachEvent("onload", Onload);
        else
            window.onload = Onload;
    </script>
@endsection
