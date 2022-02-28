<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipper_id',
        'deli_id',
        'name',
        'phone',
        'bike_id',
    ]; 

    public function shippings(){
        return $this->hasMany(Shipping::class);
    }

    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }
    
}
