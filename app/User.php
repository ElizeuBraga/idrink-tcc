<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Address;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'email', 'phone' ,'cpf', 'cnpj', 'password', 'api_token'
    ];

    // protected $fillable = ["name","email","phone","cpf","cep","api_token","password"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'store_id');
    }

    public function adresses(){
        return $this->hasMany(Address::class, 'user_id');
    }

    public function customerDeliveries(){
        return $this->hasMany(Delivery::class, 'customer_id');
    }


    public function storeDeliveries(){
        return $this->hasMany(Delivery::class, 'store_id');
    }
}
