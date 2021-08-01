@extends('app')
@section('content')
    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <img src="assets/img/user.png" alt="Stanley">
                    <h1>{{ $user->name }}</h1>
                    <p>{{ $user->email }}</p>
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                    <button type="submit">LOGOUT</button>
                    </form>
                    {{-- <a href="{{route('user.destroy', Auth::id())}}"> <button>DELETE</button></a> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="container pt">
        <h2><b>RECENTLY ADDED </b></h2>
        <div class="row mt centered">
            @foreach ($watchlists as $item)
                <div class="col-lg-3">
                    <span><img src="{{ $item->cover_photo }}" width="200"></span>
                    <p>{{ $item->movie_name }}</p>
                </div>
            @endforeach
        </div>
    </div>

@endsection
