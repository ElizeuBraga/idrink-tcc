<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Item extends Model
{
    use SoftDeletes;

    protected $fillable = ['quantity', 'product_id', 'delivery_id'];

    protected $table = 'items';

    public function deliveries(){
        return $this->belongsTo(Delivery::class);
    }
}
