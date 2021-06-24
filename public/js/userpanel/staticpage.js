$(function() {
    $.ajax({
        method: "GET",
        url: "/get-header-footer",
        async: false,
        success: function(data) {
            $("#nav-contents").html(data.navContents);
            $("#footer").html(data.footer);
        }
    });
});