<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['Product_name', 'Product_description','Product_price', 'Product_quantity', 'Product_alert'];





}
