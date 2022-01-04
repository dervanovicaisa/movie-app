$(".movie_id").each(function() {
    let movie_id = $(this).attr("value");
    $(".submit[value='" + movie_id + "']").on("click", function() {
        let movieid =  $(this).attr("value");
        // console.log(movieid);
        let user_id = $(".user_id").attr("value");
        let movie_img_url = $(".img-responsive[value='" + movie_id + "']").attr(
            "src"
        );
        let score = $(".score[value='" + movie_id + "']").text();
        let movie_name = $(".moviename[value='" + movie_id + "']").text();
        let movie_genre = $(".genre[value='" + movie_id + "']").text().split(" ");
        movie_genre.pop();
        // console.log(movie_genre);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "post",
            url: "/movie",
            data: {
                user_id: user_id,
                movie_img_url: movie_img_url,
                movie_name: movie_name,
                movie_genre: movie_genre,
                score: score,
                movieID: movieid
            },
            dataType: "text",
            success: function(msg) {
                alert('Movie is added!');
                console.log("date successfull sended!" + "\nMessage: " + msg);
            }
        });
    });
});
