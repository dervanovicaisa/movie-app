@extends('app')
@section('content')
    <div class="container pt">
        <div class="row mt centered">
            @if (is_array($movies_alike) || is_object($movies_alike))
                @forelse ($movies_alike as $m)
                    @foreach ($m as $movie)

                        <div class="col-lg-4 movie_id movies" style="margin-bottom: 3%;">
                            <a class="zoom green  img__wrap" id="movie_id"
                                href="{{ route('movie.show', $movie->show->id) }}">
                                <div class="img__wrap">
                                    <img class="img-responsive" src="{{ $movie->show->image->original }}" />
                                    <div class="movie-description">
                                        <div class="text">
                                            <p id="moviename" class="moviename">
                                                <b>{{ $movie->show->name }}</b>
                                            </p>
                                            @if (isset($movie->show->genres))
                                                @foreach ($movie->show->genres as $key => $value)
                                                    <h6 class="genre">{{ $value }}</h6>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
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
