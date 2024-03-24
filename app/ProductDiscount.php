<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'type','validtill','product_id'
    ];

    public function products()
    {
        return $this->hasMany('App\Item');
    }
}
