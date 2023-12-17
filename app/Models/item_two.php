<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_two extends Model
{
    use HasFactory;

    protected $table = "two_column_items";

    protected $fillable = [ 
        'name',
    ];

    public function producttwo(){
        return $this->hasMany(product_two::class,'column_2_id','id');
    }
}
