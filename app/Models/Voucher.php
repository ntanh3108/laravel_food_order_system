<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['voucher_code','voucher_type','voucher_value','cart_min_value','expired_on','voucher_status','added_on'];

    protected $primaryKey = 'voucher_id';
}
