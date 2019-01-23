<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOperation extends Model
{
    //
    protected $fillable=['ProductId','SaleId'];
    protected $primaryKey = ['ProductId', 'SaleId'];
    public $incrementing = false;
}
