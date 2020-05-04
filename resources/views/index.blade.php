@extends('layouts.base')
@section('title','Home')
@section('main')
    <div id="index">
        <div class="grid grid-centered" style="max-width: 660px;padding: 0px 20px;margin-top: 80px">
            <div id="grid-cell" class="grid-cell">
                <div id="header_info" class="index-top">
                    <nav class="header-nav reveal">
                        <img src="{{config('cblog.avatar')}}" class="header-avatar-top"/>
                        <a href="" title="TonyHe" class="header-logo" style="text-decoration:none;">{{config('cblog.your_name')}}</a>
                        <p class="lead" style="margin-top: 0px;margin-left:5px">{{config('cblog.description')}}</p>
                    </nav>
                    @include('components.topInsideCate')
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
