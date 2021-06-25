$(function() {
    $.ajax({
        method: "GET",
        url: "/get-header-footer",
        async: false,
        success: function(data) {
            $("#header-container").html(data.headerContents);
            $("#footer").html(data.footer);
        }
    });
});