@extends('layouts.base')
@section('title','Category '.$cate->name)
@section('main')
    <div class="cates">
        <div class="grid grid-centered" style="max-width: 660px;padding: 0px 20px;margin-top: 80px">
            <div class="grid-cell" id="grid-cell">
                <div id="header_info">
                    <nav class="header-nav reveal cate-top">
                        <div class="cate-nav">
                            <div>
                                <a href="/" class="top1 header-logo cate-name">{{ $cate->name }}</a>
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
                        <p class="top2 lead archive-p">{{ $cate->description }}</p>
                        <p class="top2 lead archive-p">文章总数:{{ $articles->total() }}</p>
                    </nav>
                    <!-- 顶部标题与分类区块 -->

                    <!-- 顶部标题与分类区块 -->
                </div>
                @component('components.article_list',['articles'=>$articles])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
