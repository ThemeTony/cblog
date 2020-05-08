@extends('layouts.base')
@section('title','Tag '.$tag->name)
@section('main')
    <div class="cates">
        <div class="grid grid-centered" style="max-width: 660px;padding: 0px 20px;margin-top: 80px">
            <div class="grid-cell" id="grid-cell">
                <div id="header_info">
                    <nav class="header-nav reveal cate-top">
                        <div class="cate-nav">
                            <div>
                                <a href="/" class="top1 header-logo cate-name">{{$tag->name}}</a>
                            </div>
                            <div>
                                <a href="/">
                                    <button
                                        variant="primary"
                                        class="cate-back-en btn btn-primary"
                                    >
                                        <i class="ri-arrow-left-line"></i>
                                        Back to Home
                                    </button>
                                </a>
                            </div>
                        </div>
                        <p class="top2 lead archive-p">文章总数:{{ $articles->total() }}</p>
                    </nav>
                    @include('components.allTags')
                </div>
                @component('components.article_list',['articles'=>$articles])
                @endcomponent
            </div>
        </div>
    </div>
    <script>
        if(getCookie('read-cookie-notice'))
            $('#cookie-notice').hide()
        $('#cookie-notice').click(function(){
            $(this).hide(500);
            setCookie('read-cookie-notice','1','0s','/');
        })
    </script>
@endsection
