// SmartMenus init
$(function() {
    $('#main-menu').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });
});

// SmartMenus mobile menu toggle button
$(function() {
    var $mainMenuState = $('#main-menu-state');
    if ($mainMenuState.length) {
        // animate mobile menu
        $mainMenuState.change(function(e) {
            var $menu = $('#main-menu');
            if (this.checked) {
                $menu.hide().slideDown(250, function() { $menu.css('display', ''); });
            } else {
                $menu.show().slideUp(250, function() { $menu.css('display', ''); });
            }
        });
        // hide mobile menu beforeunload
        $(window).bind('beforeunload unload', function() {
            if ($mainMenuState[0].checked) {
                $mainMenuState[0].click();
            }
        });
    }
});
const makeResponsize = () => {
    if ($(window).width() < 998) {
        $(".hide-in-tab").hide();
        $(".left-text-center-in-mobile").css('text-align', 'center');
    } else {
        $(".hide-in-tab").show();
        $(".left-text-center-in-mobile").css('text-align', 'left');
    }

    if ($(window).width() < 608) {
        $(".hide-in-mobile").hide();
        $(".show-in-mobile").show();
    } else {
        $(".hide-in-mobile").show();
        $(".show-in-mobile").hide();
    }
}

makeResponsize();
$(window).resize(makeResponsize);

$(document).ready(function() {
    $(".hide-on-load").slideUp(500);
});
$(document).ready(function() {
    $(".mobile_menu").simpleMobileMenu({
        onMenuLoad: function(menu) {
            console.log(menu)
            console.log("menu loaded")
        },
        onMenuToggle: function(menu, opened) {
            console.log(opened)
        },
        "menuStyle": "slide"
    });
})