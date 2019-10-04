<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'adresses';

    protected $fillable = ['address', 'cep', 'latitude', 'longitude', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
