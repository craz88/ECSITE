<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $fillable=['BrandId','MakerId','BrandName'];
    protected $primaryKey = "BrandId";
}
