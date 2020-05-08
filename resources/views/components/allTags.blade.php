<div class="tags-div" style="margin: 20px 0px;">
{{--    <!-- 滑动左侧 -->--}}
    <a class="tags-scroll-right scroll-left" id="tags-scroll-left">
        <i class="ri-arrow-left-line"></i>
    </a>
{{--    <!-- 滑动左侧 -->--}}

    <ul class="post_tags post_tags_noscroll">
        @foreach(\App\Tag::all() as $tag)
        <li class="cat-real">
            <a href="{{route('tag',['id'=>$tag->id])}}"># {{$tag->name}}</a>
        </li>
        @endforeach
    </ul>

{{--    <!-- 滑动右侧 -->--}}
    <a class="tags-scroll-right" id="tags-scroll-right">
        <i class="ri-arrow-right-line"></i>
    </a>
{{--    <!-- 滑动右侧 -->--}}
</div>
<script>
    var tx=0
    $('#tags-scroll-left').click(function(){
        if (tx - 60 >= 0) {
            tx -= 60
        } else {
            tx = 0
        }
        tags_scroll()
    })
    $("#tags-scroll-right").click(function () {
        if (tx >= 0 && tx < 360) {
            tx+=60;
        }
        tags_scroll()
    })
    function tags_scroll() {
        let k = $(".post_tags").children()
        for (let i = 0; i < k.length; ++i) {
            k[i].setAttribute(
                'style',
                'transform:translateX(-' + tx + 'px)'
            )
        }
    }
</script>
