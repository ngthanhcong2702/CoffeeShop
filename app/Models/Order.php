<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function products() {
        return $this->belongsToMany(Product::class );
    }

    public function user() {
        return $this->belongsTo(User::class );
    }

    public function staff() {
        return $this->belongsTo(Staff::class);
    }

    public function payment() {
        return $this->belongsTo(Payment::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    public function order_online()
    {
        return $this->hasOne(order_online::class);
    }
}
