<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['quantity', 'product_id', 'delivery_id'];

    protected $table = 'items';

    public function deliveries(){
        return $this->belongsTo(Delivery::class);
    }
}
