@extends('app')
@section('content')

    <div id="white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="col-lg-4">
                        <img src="{{ $movie_details->image->original }}" width="200">
                    </div>
                    <div class="col-lg-8">
                        <p>Title:
                            <bd>{{ $movie_details->name }} </bd>
                        </p>
                        <p> Language:
                            <bd>{{ $movie_details->language }}</bd>
                        </p>
                        <p>
                            Genre:
                        </p>
                        @foreach ($movie_details->genres as $genre)

                            <bd>{{ $genre }} |</bd>

                        @endforeach
                        <p> Premiered:
                            <bd>{{ $movie_details->premiered }}</bd>
                        </p>
        
                        @foreach ($movie_details->rating as $rating)
                        <p>
                            Rating:
                            <bd>{{ $rating }}</bd>
                        </p>

                        @endforeach
                    </div>
                    <div class="col-lg-12">
                        <h4>Plot</h4>
                        <p>{{ $movie_details->summary }}</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
