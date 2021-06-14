$(function() {
    $('#main-menu').smartmenus({
        mainMenuSubOffsetX: -1,
        subMenusSubOffsetX: 10,
        subMenusSubOffsetY: 0
    });
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

// menu plugin
$(function() {
    // init zeynepjs side menu
    var zeynep = $('.zeynep').zeynep({
        opened: function() {
            // log
            console.log('the side menu opened')
        },
        closed: function() {
            // log
            console.log('the side menu closed')
        }
    })

    // dynamically bind 'closing' event
    zeynep.on('closing', function() {
        // log
        console.log('this event is dynamically binded')
    })

    // handle zeynepjs overlay click
    $('.zeynep-overlay').on('click', function() {
        zeynep.close()
    })

    // open zeynepjs side menu
    $('.btn-open').on('click', function() {
        zeynep.open()
    })
})