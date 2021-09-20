<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use GuzzleHttp\Client;
use App\Models\MovieType;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $watchlists = Watchlist::where('user_id', Auth::id())->get();
        $moviesNeighbors = HomeController::exploreMovie();
        $user = $movies_alike = "";
        foreach ($moviesNeighbors as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if (!empty($value1)) {
                    $movies_alike = $value1;
                    $user = User::where('id', $value1[$key1]['user_id'])->first();
                }
            }
        }

        $client = new Client();
        $keyword = $request->keyword;
        if (!empty($keyword)) {
            $res = $client->get('http://api.tvmaze.com/search/shows?q=' . $keyword);
            $movies = json_decode($res->getBody());
        } else {
            $res = $client->get('http://api.tvmaze.com/shows');
        }
        $movies = json_decode($res->getBody());
        return view("site.index", compact('movies', 'watchlists', 'user', 'movies_alike'));
    }

    public function search(Request $request)
    {
        $search = $request->search_keyword;
        $client = new Client();
        $res = $client->get('http://api.tvmaze.com/search/shows?q=' . $search);
        $movie_search = json_decode($res->getBody());
        return view("search", compact('movie_search'));
    }

    public static function exploreMovie()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $user = User::where('id', Auth::id())->get();
        foreach ($user  as $key => $value) {
            if ($value->id == Auth::id()) {
                $movie[$key] = array(Watchlist::where('user_id', $value->id)->get()->toArray());
            }
        }
        foreach ($users as $key => $value) {
            if ($value->id != Auth::id()) {
                $movies[$key] = array(Watchlist::where('user_id', '=', $value->id)->get()->toArray());
            }
        }
        // $wat = Watchlist::where('user_id', '!=', Auth::id())->get()->toArray();
        // $count = count($wat);
        $k = 1;

        // for ($i = 0; $i < sizeof($k); $i++) {
        //     if (round($k[$i]) % 2 != 0) {
        //         $k_no = array(round($k[$i]));
        //     } else {
        //         $k_no = array(round($k[$i])-1);
        //     }
        // }
        //  u helepers.php se nalazi metoda getNeighbors
        return getNeighbors($movie[0], $movies, $k);
    }

    
}
