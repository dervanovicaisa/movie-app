@extends('app')
@section('content')
    <div class="container pt">
        <h4 class="p-5">Movies recommendation from {{ $user->name }}</h4>
        <div class="row mt centered">
            @if (is_array($movies_alike) || is_object($movies_alike))
                @forelse ($movies_alike as $key=>$movie)
                    <div class="col-lg-4 movie_id movies" style="margin-bottom: 3%;">
                        <a class="zoom green  img__wrap" id="movie_id"
                            href="{{ route('movie.show', $movie['movie_id']) }}">
                            <div class="img__wrap">
                                @isset($movie['cover_photo'])
                                    <img class="img-responsive" src="{{ $movie['cover_photo'] }}" />
                                @endisset
                                <div class="movie-description">
                                    <div class="text">
                                        <p id="moviename" class="moviename">
                                            <b>{{ $movie['movie_name'] }}</b>
                                        </p>
                                        @if (isset($movie['genre']))
                                            <h6 class="genre">{{ $movie['genre'] }}</h6>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div>
                        Empty
                    </div>
                @endforelse
            @else
                <div>
                    <div class="text-center">
                        <h2>Empty</h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
