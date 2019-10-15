<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use sortable;
    use SoftDeletes;

    public $sortable = ['id', 'name', 'price'];
    protected $fillable = ['store_id', 'name', 'price', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
