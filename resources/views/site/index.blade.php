@extends('app')
@section('content')
    <div class="container pt">
        <div class="w-100">
            <input class="w-100" type="search" name="search" id="search" placeholder=" Movie name...">
        </div>
        <div class="row-lg-6">
            <div class="col-lg-6 movieslist" style="border-right: 1px solid;"> 
                <h4>All movies / TV Shows</h4>
                @foreach ($movies as $movie)
                    <div class="col-lg-5 user_id" value="{{Auth::id()}}">
                        @if (isset($movie->image))
                            <img src="{{ $movie->image->original }}" class="img-responsive"
                                value="{{ isset($movie->id) ? $movie->id : 1 }}">
                        @elseif(isset($movie->show->image))
                            <img class="img-responsive" src="{{ $movie->show->image->original }}"
                                value="{{ isset($movie->id) ? $movie->id : 1 }}" />
                        @endif
                    </div>
                    <div class="movie-description col-lg-7 movie_id" style="height: 30vh;" value="{{ isset($movie->id) ? $movie->id : 1 }}" >

                        <p id="moviename" class="moviename" value="{{ isset($movie->id) ? $movie->id : 1 }}">
                            @if (isset($movie->name))
                                <b>{{ $movie->name }}</b>
                            @else
                                <b>{{ $movie->show->name }}</b>

                            @endif
                        </p>
                        @if (isset($movie->genres))

                            @foreach ($movie->genres as $genre)
                                <h6 class="genre" name="genre" value="{{ isset($movie->id) ? $movie->id : 1 }}">
                                    {{ $genre }} </h6>
                            @endforeach
                        @else
                            @foreach ($movie->show->genres as $genre)
                                <h6 class="genre" name="genre"
                                    value="{{ isset($movie->show->id) ? $movie->show->id : 1 }}">
                                    {{ $genre }} </h6>
                            @endforeach
                        @endif
                        @if (isset($movie->rating->average))
                            <h4 name="score" class="score" value="{{ isset($movie->id) ? $movie->id : 1 }}">
                                {{ $movie->rating->average }}</h4>
                        @elseif(isset($movie->show->rating->average))
                            <h4 name="score" class="score"
                                value="{{ isset($movie->show->id) ? $movie->show->id : 1 }}">
                                @if (!empty($movie->show->rating->average) || $movie->show->rating->average != null)
                                    {{ $movie->show->rating->average }}
                                @endif
                            </h4>

                        @endif
                        <button type="submit" name="submit" class="submit" value="{{ isset($movie->id) ? $movie->id : 1 }}">Add to watchlist</button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row-lg-6">
            <div class="col-lg-3">
                <h4>Watchlist</h4>
                @foreach ($watchlists as $watchlist)
                    <p id="moviename" class="moviename"><b>{{ $watchlist->movie_name }}</b></p>
                    <h6 class="genre">{{ $watchlist->genre }}</h6>
                    <h6 class="score" style="color:#a94442;">{{ $watchlist->rating }}</h6>
                @endforeach

            </div>
            <div class="col-lg-3" style="border-left: 1px solid;">
                <h4>Recommended by <span style="color: orangered;"> @isset($user->name) {{ $user->name }} @endisset </span> </h4>
                <div>
                    @if(isset($movies_alike) && !empty($movies_alike))
                    @forelse ($movies_alike as $key=>$movie)
                        <a id="movie_id" href="{{ route('movie.show', $movie['movie_id']) }}">
                            <p id="moviename" class="moviename">
                                <b style="color: #a94442">{{ $movie['movie_name'] }}</b>
                            </p>
                            @if (isset($movie['genre']))
                                <h6 class="genre" style="color:#a94442;">{{ $movie['genre'] }}</h6>
                            @endif
                            <h6 class="score" style="color:#a94442;">{{ $movie['rating'] }}</h6>
                        </a>
                    @empty
                        <div>
                            Empty
                        </div>
                    @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="assets/js/storeMovieAjax.js"></script>
    <script src="assets/js/search.js"></script>
@endsection
