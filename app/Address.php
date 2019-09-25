<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'adresses';

    protected $fillable = ['address', 'latitude', 'longitude', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}