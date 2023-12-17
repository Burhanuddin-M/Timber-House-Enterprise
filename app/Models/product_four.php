<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_four extends Model
{
    use HasFactory;

    protected $table = "four_column_products";

    protected $fillable = [ 
        'one_price',
        'two_price',
        'three_price',
        'column_4_id',
    ];

    public function itemfour()
    {
        return $this->belongsTo(item_four::class, 'column_4_id', 'id');
    }
}
