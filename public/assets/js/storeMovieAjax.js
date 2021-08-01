$(".movie_id").each(function() {
    let movie_id = $(this).attr("value");
    $(".mark[value='" + movie_id + "']").on("change", function() {
        let user_id = $(".user_id").attr("value");
        let movie_type_id = $(this).val();
        let movie_img_url = $(".img-responsive[value='" + movie_id + "']").attr(
            "src"
        );
        let movie_name = $(".moviename[value='" + movie_id + "']").text();
        let movie_genre = $(".genre[value='" + movie_id + "']")
            .text()
            .split(" ");
        movie_genre.pop();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "post",
            url: "/movie",
            data: {
                user_id: user_id,
                movie_type_id: movie_type_id,
                movie_img_url: movie_img_url,
                movie_name: movie_name,
                movie_genre: movie_genre
            },
            dataType: "text",
            success: function(msg) {
                console.log("date successfull sended!" + "\nMessage: " + msg);
            }
        });
    });
});
