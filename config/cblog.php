<?php
return [
    'website_name'=>"MatrixCoder's Blog", # 网站名
    'description'=>'An Poor Programmer and Student',# 网站描述
    'avatar'=>'https://file.moetu.org/images/2020/03/20/k5NQhBId6H1D9tT71a9bbd12b762d30.jpg',# 头像
    'github'=>'https://github.com/MatrixCoder-Chen',# github地址，没有请填写 null
    'your_name'=>'MatrixCoder',# 你的名字
    'math_tex'=>true,# 是否渲染数学公式
    'prism'=>true,# 是否使用prism美化代码
    'registration'=>null,# 备案号，没有请填写 null
    'algolia_id'=>env('ALGOLIA_APP_ID'),# 不需要管
    'algolia_only_search_key'=>env('ALGOLIA_ONLY_SEARCH_KEY'),# 不需要管
    'comment'=>[
        'placeholder'=>"来啊，快活啊 ( ゜- ゜)",# 评论框的占位符
        'noComment'=>'快来成为第一个评论的人吧~',# 没有评论时的显示
        'defaultAvatar'=> 'mp',
        'pageKey'=> 'window.location.pathname',# 页面唯一标识，如果您不知道这是什么，可以不管
        'serverUrl'=> env('APP_URL').':8080',# Artalk的地址
        'sendBtn'=>'Send',# 发送按钮的字符
        'readMore'=> [
            'pageSize'=> 10,# 每页显示评论个数
            'autoLoad'=> true# 是否自动加载
        ]
    ]
];
