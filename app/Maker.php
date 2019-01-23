<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    //
     protected $fillable=['MakerId','MakerName'];
     protected $primaryKey = "MakerId";
}
