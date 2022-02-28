<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

    ];
    public function rewards()
    {
        return $this->belongsToMany(Rewards::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function order_onlines()
    {
        return $this->belongsToMany(Order_online::class, 'onlines')->withPivot('quantity');
    }

}
