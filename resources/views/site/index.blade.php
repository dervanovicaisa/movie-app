@extends('app')
@section('content')

    <div class="container pt">
        <div class="w-100">
            <input class="w-100" type="search" name="search" id="search" placeholder=" Movie name...">
        </div>
        <div class="row mt centered movieslist">
            @forelse ($movies as $movie)

                <input type="text" value="{{ Auth::id() }}" class="user_id" hidden>
                <div class="col-lg-4 movie_id movies" style="margin-bottom: 3%;"
                    value="{{ isset($movie->id) ? $movie->id : 1 }}" name="movie_id">
                    <div style="margin-bottom: 3%;">
                        <select name="mark" id="mark" class="mark"
                            value="{{ isset($movie->id) ? $movie->id : 1 }}">
                            <option class="movie_type" value="choose">
                                choose a type...
                            </option>
                            @foreach ($movie_type as $mt)
                                <option value="{{ $mt->id }}" class="movie_type"
                                    value="{{ isset($movie->id) ? $movie->id : 1 }}">
                                    {{ $mt->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a class="zoom green  img__wrap" id="movie_id"
                        href="{{ route('movie.show', isset($movie->id) ? $movie->id : 1) }}">
                        <div class="img__wrap">

                            @if (isset($movie->image) && $movie->image != null && !empty($movie->image))

                                <img class="img-responsive" src="{{ $movie->image->original }}"
                                    value="{{ isset($movie->id) ? $movie->id : 1 }}" />
                            @elseif($movie->show->image != null && !empty($movie->show->image) )
                                <img class="img-responsive" src="{{ $movie->show->image->original }}"
                                    value="{{ isset($movie->id) ? $movie->id : 1 }}" />
                            @endif
                            <div class="movie-description">
                                <div class="text">
                                    <p id="moviename" class="moviename"
                                        value="{{ isset($movie->id) ? $movie->id : 1 }}">
                                        @if (isset($movie->name))
                                            <b>{{ $movie->name }}</b>
                                        @else
                                            <b>{{ $movie->show->name }}</b>

                                        @endif
                                    </p>
                                    @if (isset($movie->genres))

                                        @foreach ($movie->genres as $genre)
                                            <h6 class="genre" name="genre"
                                                value="{{ isset($movie->id) ? $movie->id : 1 }}">
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
                                        <h4 name="score" class="score"
                                            value="{{ isset($movie->id) ? $movie->id : 1 }}">
                                            {{ $movie->rating->average }}</h4>
                                    @elseif(isset($movie->show->rating->average))
                                        <h4 name="score" class="score"
                                            value="{{ isset($movie->show->id) ? $movie->show->id : 1 }}">
                                            @if(!empty($movie->show->rating->average) || $movie->show->rating->average!=null )
                                            {{ $movie->show->rating->average }}
                                            @endif
                                        </h4>

                                    @endif
                                </div>
                            </div>
                    </a>
                </div>
        </div>
    @empty
        <div class="text-center">
            <div>
                <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_GlZGOi.json" background="transparent"
                    speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
            </div>
        </div>
        @endforelse
    </div>
    </div>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="assets/js/storeMovieAjax.js"></script>
    <script src="assets/js/search.js"></script>
@endsection
