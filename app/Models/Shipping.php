<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }
}
