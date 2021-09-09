<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function watchlist()
    {
        $this->hasOne(Watchlist::class, 'id');
    }
}
