<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Watchlist extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function movie_type()
    {
        return $this->belongsTo(MovieType::class, 'movie_type_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
