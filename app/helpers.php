<?php

use App\Models\MovieGenres;
use Illuminate\Support\Facades\Auth;

function explore_alike_genre(array $a)
{
    $user = MovieGenres::where('user_id', Auth::id())->get()->pluck('genre')->toArray();
    $distance = [];
    for ($i = 0; $i < sizeof(getSameGenre($a)); $i++) {
        $result[$i] = eucDistanceFormula(getSameGenre($a)[$i],   array_count_values($user));
        $distance[$i] = array(
            'distance' => $result[$i],
            'genre' => getSameGenre($a)[$i]
        );
    }
    for ($i = 0; $i < sizeof($distance); $i++) {
        if (min($result) == $distance[$i]['distance']) {
            $new_array =  array_keys($distance[$i]['genre']);

        }
    }
    // dd($new_array);
    return $new_array;
}


function getSameGenre(array $a)
{
    for ($i = 0; $i < sizeof($a); $i++) {

        $getArrayOfGenre[$i] = array_count_values($a[$i]['genres']);
    }
    return $getArrayOfGenre;
}

function eucDistanceFormula(array $a, array $b)
{

    // $a = array_intersect_key($a, $b); 
    // $b = array_intersect_key($b, $a);


    return
        array_sum(
            array_map(
                function ($x, $y) {
                    return abs($x - $y) ** 2;
                },
                $a,
                $b
            )
        ) ** (1 / 2);
}

function  myArrayFunc($arr)
{
    $newArray =  array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        $newArray[$i] =   '"' . $arr[$i] . '"';
    }
    return $newArray;
}
