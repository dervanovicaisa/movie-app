<?php

use App\Models\Watchlist;

// https://github.com/mlwmlw/php-cosine-similarity
class Similarity
{
	static public function dot($tags)
	{
		$tags = array_unique($tags);
		$tags = array_fill_keys($tags, 0);
		ksort($tags);
		return $tags;
	}
	static public function dot_product($a, $b)
	{
		$products = array_map(function ($a, $b) {
			return $a * $b;
		}, $a, $b);
		return array_reduce($products, function ($a, $b) {
			return $a + $b;
		});
	}
	static public function magnitude($point)
	{
		$squares = array_map(function ($x) {
			return pow($x, 2);
		}, $point);
		return sqrt(array_reduce($squares, function ($a, $b) {
			return $a + $b;
		}));
	}
	static public function cosine($a, $b, $base)
	{
		$a = array_fill_keys($a, 1) + $base;
		$b = array_fill_keys($b, 1) + $base;
		ksort($a);
		ksort($b);
		return self::dot_product($a, $b) / (self::magnitude($a) * self::magnitude($b));
	}
}


function getNeighbors($movieUserID, $movieUsers, $k)
{
	$distances = [];
	foreach ($movieUsers as $movie) {
		foreach ($movieUserID as  $value) {
			if ($value != $movie) {
				$dist = computeDistance($movieUserID, $movie);
				$distances[] = [$movie, $dist];
			}
		}
	}
	$neighbors = [];
	for ($i = 0; $i < $k; $i++) {
		$neighbors[] = $distances[$i][0];
	}
	return $neighbors;
}
function computeDistance($a, $b)
{
	$all = Watchlist::all()->toArray();
	foreach ($all as  $value) {
		$dot = Similarity::dot($value);
	}
	foreach ($a as $keyA => $valueA) {
		foreach ($b as $keyB => $valueB) {
			$distance = Similarity::cosine($valueA[$keyA], $valueB[$keyB], $dot);
		}
	}
	return $distance;
}

function getI($array)
{
	$arrayKeys = array_keys($array);
	foreach ($arrayKeys as $value) {
		$result = $value;
	}
	return $result;
}
