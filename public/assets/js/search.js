var searchRequest = null;
$(function() {
    $("#search").on("keyup", function() {
        var that = this,
            value = $(this).val();
        if (searchRequest != null) searchRequest.abort();
        searchRequest = $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "get",
            url: "/search",
            data: {
                search_keyword: value
            },
            dataType: "text",
            success: function(msg) {
                if (value == $(that).val()) {
                    var url =  "http://127.0.0.1:8000/search?search_keyword=" + value;
                    history.replaceState(
                        { page: window.location.hostname + "/search" },
                        "",
                        "/search?search_keyword=" + value
                    );
                    // console.log(value);
                    var xmlHttp = new XMLHttpRequest();
                    console.log(url);
                    xmlHttp.open("get", url, false); // false for synchronous request
                    xmlHttp.send(null);
                    $(".search_result").append(xmlHttp.responseText);
                }
            }
        });
    });
});
