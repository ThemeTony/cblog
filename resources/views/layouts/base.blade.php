<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title','Hello') - MatrixCoder's Blog</title>
        <link href="/css/app.css" rel="stylesheet">
        <link href="http://cdn.staticfile.org/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://cdn.staticfile.org/bootstrap-submenu/3.0.1/css/bootstrap-submenu.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="loading" style="z-index: 999;background-color: #f6f7f8;height: 100%;width: 100%;position: fixed;margin-top: 0px;top: 0px;"></div>
        <script src="http://cdn.staticfile.org/jquery/3.4.1/jquery.min.js"></script>
        <script>
            function setCookie(name,value,time,path)
            {
                var strsec = getsec(time);
                var exp = new Date();
                exp.setTime(exp.getTime() + strsec*1);
                document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path="+path;
            }
            function getsec(str)
            {
                var str1=str.substring(1,str.length)*1;
                var str2=str.substring(0,1);
                if (str2=="s")
                {
                    return str1*1000;
                }
                else if (str2=="h")
                {
                    return str1*60*60*1000;
                }
                else if (str2=="d")
                {
                    return str1*24*60*60*1000;
                }
            }
            function getCookie(name)
            {
                var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");

                if(arr=document.cookie.match(reg))

                    return unescape(arr[2]);
                else
                    return null;
            }
            function delCookie(name)
            {
                var exp = new Date();
                exp.setTime(exp.getTime() - 1);
                var cval=getCookie(name);
                if(cval!=null)
                    document.cookie= name + "="+cval+";expires="+exp.toGMTString();
            }
        </script>
        <div id="'main">
            @include('components.header')
            @section('main')@show
        </div>
        <script>
            if(getCookie('read-cookie-notice'))
                $('#cookie-notice').hide()
            $('#cookie-notice').click(function(){
                $(this).hide(500);
                setCookie('read-cookie-notice','1','0s','/');
            })
        </script>
        @include('components.footer')
        <script src="http://cdn.staticfile.org/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="http://cdn.staticfile.org/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="http://cdn.staticfile.org/bootstrap-submenu/3.0.1/js/bootstrap-submenu.min.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
