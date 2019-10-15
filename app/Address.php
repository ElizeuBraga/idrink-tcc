<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    protected $table = 'adresses';

    protected $fillable = ['cep','status', 'logradouro', 'complemento', 'bairro', 'localidade', 'uf','numero', 'latitude', 'longitude', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
