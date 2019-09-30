<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';
    protected $fillable = ['status','payment','address_id','customer_id', 'store_id'];

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
