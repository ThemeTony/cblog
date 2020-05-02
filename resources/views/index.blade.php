@extends('layouts.base')
@section('title','Home')
@section('main')
    <div id="index">
        <div class="grid grid-centered" style="max-width: 660px;padding: 0px 20px;margin-top: 80px">
            <div id="grid-cell" class="grid-cell">
                <div id="header_info" class="index-top">
                    <nav class="header-nav reveal">
                        <img src="https://file.moetu.org/images/2020/03/20/k5NQhBId6H1D9tT71a9bbd12b762d30.jpg" class="header-avatar-top"/>
                        <a href="" title="TonyHe" class="header-logo" style="text-decoration:none;">MatrixCoder</a>
                        <p class="lead" style="margin-top: 0px;margin-left:5px">An Poor Programmer and Student</p>
                    </nav>
                    @include('components.topInsideCate')
                    @include('components.allTags')
                </div>
                @component('components.article_list',['articles'=>$articles])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
