require('./bootstrap');
// nav
$('#header-div').hover(
    function () {
        $('#header-div').attr('class', 'tony-header-scoll')
    },
    function () {
        $('#header-div').attr('class', 'tony-header-fixed')
    }
)
$(window).scroll(function () {
    var a = $(document).scrollTop()
    if (a <= 0) {
        $('#header-div').attr('class', 'tony-header-fixed')
        $('#view-div').css('display', 'none')
        $('#header-div').hover(
            function () {
                $('#header-div').attr('class', 'tony-header-scoll')
            },
            function () {
                $('#header-div').attr('class', 'tony-header-fixed')
            }
        )
    } else {
        $('#header-div').attr('class', 'tony-header-scoll')
        $('#view-div').css('display', 'block')
        $('#header-div').hover(
            function () {
                $('#header-div').attr('class', 'tony-header-scoll')
            },
            function () {
                $('#header-div').attr('class', 'tony-header-scoll')
            }
        )
    }
})
// footer
$(window).scroll(function () {
    if ($(window).scrollTop() >= 100) {
        $(".go-top-button").fadeIn();
    } else {

        $(".go-top-button").fadeOut();
    }
});

$(".go-top-button").click(function (event) {
    $('html,body').animate({scrollTop: 0}, 500);
    return false;
});
$('[data-submenu]').submenupicker();
