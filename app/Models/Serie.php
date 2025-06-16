<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    // Add this if your table is not named 'series' (plural of 'serie')
    // protected $table = 'your_table_name';

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, table: 'serie_id')->withTimestamps();
    }
}
