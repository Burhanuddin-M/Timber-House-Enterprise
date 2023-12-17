<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_two extends Model
{
    use HasFactory;

    protected $table = "two_column_products";

    protected $fillable = [ 
        'desc',
        'price',  
        'column_2_id',
    ];

    public function itemtwo()
    {
        return $this->belongsTo(item_two::class, 'column_2_id', 'id');
    }
}
