<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">Movies</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li><a href="{{route('movie.store')}}">Watchlist</a></li>
                <li><a href="{{route('user.profile')}}">Profile</a></li>
                <li><a href="{{route('movie.explore')}}">Explore</a></li>
            </ul>
        </div>
    </div>
</div>
