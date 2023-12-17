<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    //public $timestamps = false;

    //TABLE
    public $table = 'employees';

    //FILLABLE
    protected $fillable = [
        'name',
        'contact_no',
        'salary_per_day',
        'amount_portfolio',
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
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
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

    static function calculateTotalEarning(Employee $employee)
    {
        return $employee->attendance()->sum('total_amount');
    }

    static function calculatePortfolio(Employee $employee)
    {
        $total_debited_amount = $employee->transactions()->where('type', Transaction::DEBIT)->sum('amount');
        $total_credited_amount = $employee->transactions()->where('type', Transaction::CREDIT)->sum('amount');
        $total_deposited_amount = $employee->transactions()->where('type', Transaction::DEPOSIT)->sum('amount');
        return $total_credited_amount +  $total_deposited_amount - $total_debited_amount;
    }
}