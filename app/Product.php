<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=['ProductId','MakerId','BrandId','GenreId','Image','ProductName','Price','Detail'];
    protected $primaryKey = "ProductId";
}
