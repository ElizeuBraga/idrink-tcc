<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;


class Delivery extends Model
{
    use SoftDeletes;
    protected $sortable = ['id'];
    protected $table = 'deliveries';
    protected $fillable = ['status','payment', 'change', 'address_id','customer_id', 'store_id'];

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
