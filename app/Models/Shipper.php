<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $fillable = ['shipper_name','shipper_phone_number','shipper_password','shipper_status','added_on'];

    protected $primaryKey = 'shipper_id';
}
