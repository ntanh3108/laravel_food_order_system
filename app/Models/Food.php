<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['food_name','food_detail','food_image','food_status','added_on'];

    protected $primaryKey = 'food_id';
}
