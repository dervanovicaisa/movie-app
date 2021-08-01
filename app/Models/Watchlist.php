<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Watchlist extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function movie_type(){
        return $this->hasOne(MovieType::class);
    }
    public function genres(){
        // return  MovieGenres::where('user_id', Auth::id())->get();
        return $this->belongsToMany(MovieGenres::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
