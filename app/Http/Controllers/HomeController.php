<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use GuzzleHttp\Client;
use App\Models\MovieType;

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

        $client = new Client();
        $keyword = $request->keyword;
        if (!empty($keyword)) {
            $res = $client->get('http://api.tvmaze.com/search/shows?q=' . $keyword);
            $movies = json_decode($res->getBody());
        } else {
            $res = $client->get('http://api.tvmaze.com/shows');
        }
        $movies = json_decode($res->getBody());
        $movie_type = MovieType::all();
        return view("site.index", compact('movies', 'movie_type'));
    }
    public function search(Request $request)
    {
        $search = $request->search_keyword;
        $client = new Client();
        $res = $client->get('http://api.tvmaze.com/search/shows?q=' . $search);
        $movie_search = json_decode($res->getBody());
        return view("search", compact('movie_search'));
    }
}
