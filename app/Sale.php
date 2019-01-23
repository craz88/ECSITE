<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $fillable=['SaleId','SaleName','Discount','StartTime','EndTime','Attribute'];
    protected $primaryKey = "SaleId";
}
