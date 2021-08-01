@extends('app')
@section('content')

    <div class="container pt">
        <div class="w-100">
            <input class="w-100" type="search" name="search" id="search" placeholder=" Movie name...">
        </div>
        <div class="row mt centered">
            <div id="search_result">

            </div>
            @if (isset($movies))
                @foreach ($movies as $movie)
                    <input type="text" value="{{ Auth::id() }}" class="user_id" hidden>
                    <div class="col-lg-4 movie_id movies" style="margin-bottom: 3%;" value="{{ $movie->id }}">
                        <div style="margin-bottom: 3%;">
                            <select name="mark" id="mark" class="mark" value="{{ $movie->id }}">
                                @foreach ($movie_type as $mt)
                                    <option value="{{ $mt->id }}" class="movie_type" value="{{ $movie->id }}">
                                        {{ $mt->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a class="zoom green  img__wrap" id="movie_id" href="{{ route('movie.show', $movie->id) }}">
                            <div class="img__wrap">
                                @if ($movie->image != null)

                                    <img class="img-responsive" src="{{ $movie->image->original }}"
                                        value="{{ $movie->id }}" />

                                @endif
                                <div class="movie-description">
                                    <div class="text">
                                        <p id="moviename" class="moviename" value="{{ $movie->id }}">
                                            <b>{{ $movie->name }}</b>
                                        </p>
                                        @foreach ($movie->genres as $genre)
                                            <h6 class="genre"  value="{{ $movie->id }}">{{ $genre }} </h6>
                                        @endforeach
                                    </div>
                                </div>
                        </a>
                    </div>
        </div>
        @endforeach
        @endif
    </div>
    </div>
    <script src="assets/js/storeMovieAjax.js"></script>
    <script src="assets/js/search.js"></script>
@endsection
