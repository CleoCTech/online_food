<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    protected $fillable =[
        'dish_name',
        'dish_detail',
        'dish_image',
        'dish_status',
        'full',
        'full_price',
        'half',
        'half_price'

    ];
    protected $primaryKey= 'dish_id';
}