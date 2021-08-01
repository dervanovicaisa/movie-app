<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieGenres;
use App\Models\User;
use App\Models\Watchlist;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Float_;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watchlists = Watchlist::where('user_id', Auth::id())->get();
        return view('site.watchlist', compact('watchlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'movie_type_id' => 'required',
            'movie_name' => 'required',
            'movie_genre' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $watchlist = new Watchlist();
            $watchlist->movie_name = $request->movie_name;
            $watchlist->cover_photo = $request->movie_img_url;
            $watchlist->movie_type_id = $request->movie_type_id;
            $watchlist->user_id = $request->user_id;
            $watchlist->save();

            $genre = new MovieGenres();
            foreach ($request->movie_genre as $genrerequest) {
                $genre->genre = $genrerequest;
                $genre->movie_id = $watchlist->id;
                $genre->user_id = Auth::id();
            }
            $genre->save();
            return redirect()->back()->with('success', 'Successfully added movie in your watchlist!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = new Client();
        $res = $client->get('http://api.tvmaze.com/shows/' . $id);
        $movie_details = json_decode($res->getBody());
        return view('site.movie_details', compact('movie_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function exploreMovie()
    {


        $genres = MovieGenres::select('genre')->where('user_id', Auth::id())->get()->pluck('genre')->toArray();
        $genreArray = myArrayFunc($genres);
        $arrGenre = implode(",", $genreArray);
        $user_id = DB::select('select  distinct user_id from movie_genres where user_id !=' . Auth::id() . ' and genre IN (' . $arrGenre . ')');
        for ($j = 0; $j < sizeof($user_id); $j++) {
            $similarMovieGenres = DB::select('select genre, user_id from movie_genres where user_id =' . $user_id[$j]->user_id . ' and genre IN (' . $arrGenre . ')');

            for ($i = 0; $i < sizeof($similarMovieGenres); $i++) {
                $getGenre[$i] =  $similarMovieGenres[$i]->genre;
            }
            $create_array[$j] = array(
                'user_id' => $user_id[$j]->user_id,
                'genres' => $getGenre
            );
        }

        $get_alike_genre_movies = explore_alike_genre($create_array);
        for ($i=0; $i < sizeof($get_alike_genre_movies); $i++) {
            $client = new Client();
            $res[$i] = $client->get('http://api.tvmaze.com/search/shows?q=' . $get_alike_genre_movies[$i]);
            $movies_alike[$i] = json_decode($res[$i]->getBody());
        }
        return view('site.explore', compact('movies_alike'));
    }
}
