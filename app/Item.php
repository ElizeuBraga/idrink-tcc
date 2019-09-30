<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['customer_id','quantity', 'product_id', 'delivery_id'];

    protected $table = 'items';

    public function deliveries(){
        return $this->belongsTo(Delivery::class);
    }
}
