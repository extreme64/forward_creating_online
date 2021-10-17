
(function ($) {
    $(document).ready(function(){
        var menu_ul = $(".menu-header-main-container")
        // $(menu_ul).hide()


        $(".menu-toggle-bars").on('click', function(e) {
            console.log($(menu_ul))
            if ( $(menu_ul).css("display") === 'none' ) {
               $(menu_ul).css("display", "block")
            } else {
                $(menu_ul).css("display", "none")
            }
        })
        
        
        $("#site-navigation").toggleClass("toggled")
        $(".menu-toggle").attr("aria-expanded", "true")
        $(".main-navigation.toggled ul.menu").css("display", "block")

    })
})(jQuery);