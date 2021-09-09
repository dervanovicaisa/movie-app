<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class Similarity {

	static function dot_product($a, $b) {
		$products = array_map(function($a, $b) {
			return $a * $b;
		}, $a, $b);
		return array_reduce($products, function($a, $b) {
			return $a + $b;
		});
	}
	static function magnitude($point) {
		$squares = array_map(function($x) {
			return pow($x, 2);
		}, $point);
		return sqrt(array_reduce($squares, function($a, $b) {
			return $a + $b;
		}));
	}
	static public function cosine($a, $b) {
    $a = array_fill_keys($a, 1);
    $b = array_fill_keys($b, 1);
		ksort($a);
		ksort($b);
		return self::dot_product($a, $b) / (self::magnitude($a) * self::magnitude($b)); 
	}
} 



function getNeighbors($movieUserID,$movieUsers, $k){

    $distances = [];
    foreach ($movieUsers as $key => $movie) {
        $dist = computeDistance($movieUserID,$movieUsers[$key]);
        $distances[] = [$movie, $dist];
    }
    sort($distances);
    $neighbors = [];
    for ($i=0; $i < $k ; $i++) { 
        $neighbors[] = $distances[$i][0];
    }
    return $neighbors;
}
function computeDistance($a,$b){
    $genreDistance = Similarity::cosine($a,$b);
    return $genreDistance;
}
