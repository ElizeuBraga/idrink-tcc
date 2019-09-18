<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';
    protected $fillable = ['customer_id', 'store_id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
