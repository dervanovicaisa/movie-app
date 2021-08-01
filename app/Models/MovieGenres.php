<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MovieGenres extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function movie(){
        return $this->hasMany(Watchlist::class);
    }

    public function genres(){
        // return  MovieGenres::where('user_id', Auth::id())->get();
        return $this->belongsToMany(MovieGenres::class);
    }
}
