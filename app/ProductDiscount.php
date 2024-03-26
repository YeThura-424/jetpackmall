<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'type','value','validtill','item_id'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
