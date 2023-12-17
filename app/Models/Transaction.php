<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = true;

    const DEBIT = "DEBIT", CREDIT = "CREDIT", DEPOSIT = "DEPOSIT";

    //TABLE
    public $table = 'transactions';

    //FILLABLE
    protected $fillable = [
        'employee_id',
        'amount',
        'type',
        'note',
    ];

    //HIDDEN
    protected $hidden = [];

    //APPENDS
    protected $appends = [];

    //WITH
    protected $with = [];

    //CASTS
    protected $casts = [];

    //RELATIONSHIPS
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    //SCOPES
    //public function scopeExample($query)
    //{
    //    $query->where('columns_name', 'some_condition');
    //}

    //ATTRIBUTES
    //public function getExampleAttribute()
    //{
    //    return $data;
    //}

}
