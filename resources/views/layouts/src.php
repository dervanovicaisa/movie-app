<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($movie_search as $movie) { ?> 
        <div class="col-lg-4">
            <div style="margin-bottom: 3%;">
            <select name="mark" id="mark">
                    <option value="watched">watched</option>
                    <option value="not finished">not finished</option>
                    <option value="want to watch">want to watch</option>
                    <option value="watching">watching</option>
                </select>
            </div>
            <a class="zoom green " href="<?php route("movie.show", $movie->show->id) ?>">
             <?php if ($movie->show->image != null) { ?>
                <img class="img-responsive" src="<?php echo $movie->show->image->original; ?>" alt="" />
                <?php } ?>
            </a>
            <p><?php echo $movie->show->name; ?></p>
        </div>
        <?php } ?>

</body>

</html>