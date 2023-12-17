<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_four extends Model
{
    use HasFactory;

    protected $table = "four_column_items";

    protected $fillable = [ 
        'name',
    ];


    public function productfour(){
        return $this->hasMany(product_four::class,'column_4_id','id');
    }


}
