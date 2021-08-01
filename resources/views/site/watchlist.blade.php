@extends('app')
@section('content')
    <div class="container pt">
        <div class="row mt centered">

            <div class="col-lg-12" style="margin-bottom: 3%; float:left;">
                <h4 style="float:left;">Watched</h4>
            </div>
            @foreach ($watchlists as $watchlist)
                @if ($watchlist->movie_type_id == 1)
                <div class="col-lg-4 movie_id" style="margin-bottom: 3%;">
                    <a class="zoom green  img__wrap">
                        <div class="img__wrap">
                            @if ($watchlist->cover_photo != null)

                                <img class="img-responsive" src="{{ $watchlist->cover_photo }}" />

                            @endif
                        </div>
                        <div class="movie-description">
                            <div class="text">
                                <p id="moviename" class="moviename"><b>{{ $watchlist->movie_name }}</b></p>
                                <h6 class="genre">{{ $watchlist->gender }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
            <div class="col-lg-12" style="margin-bottom: 3%;float:left;">
                <h4 style="float:left;">Not finished</h4>
            </div>
            @foreach ($watchlists as $watchlist)
                @if ($watchlist->movie_type_id == 2)
                <div class="col-lg-4 movie_id" style="margin-bottom: 3%;" >
                    <a class="zoom green  img__wrap">
                        <div class="img__wrap">
                            @if ($watchlist->cover_photo != null)

                                <img class="img-responsive" src="{{ $watchlist->cover_photo }}" />

                            @endif
                        </div>
                        <div class="movie-description">
                            <div class="text">
                                <p id="moviename" class="moviename"><b>{{ $watchlist->movie_name }}</b></p>
                                <h6 class="genre">{{ $watchlist->gender }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
            <div class="col-lg-12" style="margin-bottom: 3%;float:left;">
                <h4 style="float:left;">Want to watch</h4>
            </div>
            @foreach ($watchlists as $watchlist)
                @if ($watchlist->movie_type_id == 3)
                <div class="col-lg-4 movie_id" style="margin-bottom: 3%;">
                    <a class="zoom green  img__wrap">
                        <div class="img__wrap">
                            @if ($watchlist->cover_photo != null)

                                <img class="img-responsive" src="{{ $watchlist->cover_photo }}" />

                            @endif
                        </div>
                        <div class="movie-description">
                            <div class="text">
                                <p id="moviename" class="moviename"><b>{{ $watchlist->movie_name }}</b></p>
                                <h6 class="genre">{{ $watchlist->gender }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
            <div class="col-lg-12" style="margin-bottom: 3%;float:left;">
                <h4 style="float:left;">Watching</h4>
            </div>
            @foreach ($watchlists as $watchlist)
                @if ($watchlist->movie_type_id == 4)
                <div class="col-lg-4 movie_id" style="margin-bottom: 3%;">
                    <a class="zoom green  img__wrap">
                        <div class="img__wrap">
                            @if ($watchlist->cover_photo != null)

                                <img class="img-responsive" src="{{ $watchlist->cover_photo }}" />

                            @endif
                        </div>
                        <div class="movie-description">
                            <div class="text">
                                <p id="moviename" class="moviename"><b>{{ $watchlist->movie_name }}</b></p>
                                <h6 class="genre">{{ $watchlist->gender }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
