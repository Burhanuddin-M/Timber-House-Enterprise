<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    //public $timestamps = false;

    const ABSENT = "ABSENT", PRESENT = "PRESENT";

    //TABLE
    public $table = 'attendance';

    //FILLABLE
    protected $fillable = [
        'employee_id',
        'date',
        'type',
        'base_amount',
        'has_extra_time',
        'extra_hours',
        'total_amount',
        'is_half_day',
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
