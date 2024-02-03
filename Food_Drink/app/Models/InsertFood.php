<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsertFood extends Model
{
    use HasFactory;


    protected $table='food_menu';
    protected $fillable=[
        'food_id',
        'food_name',
        'price',

    ];
}
