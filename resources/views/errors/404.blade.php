@extends('layouts.base')
@section('main')
<div id="header_info">
    <nav class="header-nav reveal error-page">
        <a
            href="/"
            style="text-decoration:none;"
            class="header-logo"
        >404 :)</a>
        <p class="lead" style="margin-top: 0px;display:block">抱歉，你请求的内容消失嘞</p>
        <a href="/">
            <button variant="primary" class="back-home btn btn-primary">Back to Home | 返回首页</button>
        </a>
    </nav>
</div>
@endsection
