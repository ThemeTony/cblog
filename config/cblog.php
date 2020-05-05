<?php
return [
    'website_name'=>"MatrixCoder's Blog",
    'description'=>'An Poor Programmer and Student',
    'avatar'=>'https://file.moetu.org/images/2020/03/20/k5NQhBId6H1D9tT71a9bbd12b762d30.jpg',
    'github'=>'https://github.com/MatrixCoder-Chen',
    'your_name'=>'MatrixCoder',
    'math_tex'=>true,
    'prism'=>true,
    'registration'=>'123',
    'algolia_id'=>env('ALGOLIA_APP_ID'),
    'algolia_only_search_key'=>env('ALGOLIA_ONLY_SEARCH_KEY'),
    'comment'=>[
        'placeholder'=>"来啊，快活啊 ( ゜- ゜)",
        'noComment'=>'快来成为第一个评论的人吧~',
        'defaultAvatar'=> 'mp',
        'pageKey'=> 'window.location.pathname',
        'serverUrl'=> env('APP_URL').':8080',
        'sendBtn'=>'Send',
        'readMore'=> [
            'pageSize'=> 10,
            'autoLoad'=> true
        ]
    ]
];
