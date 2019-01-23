<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $fillable=['GenreId','GenreName'];
    protected $primaryKey = "GenreId";
}
