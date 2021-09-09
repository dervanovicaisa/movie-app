$(function() {
    $("#search").on("keyup", function() {
        var value = $(this).val();

        $.ajax({
            url: window.location.href,
            type: "get",
            data: {
                keyword: value
            },
            success: function(response) {
                $('.movieslist').html(jQuery(response).find('.movieslist').html());
            }
        });
    });
});
