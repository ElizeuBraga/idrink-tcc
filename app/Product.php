<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['store_id', 'name', 'price'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
