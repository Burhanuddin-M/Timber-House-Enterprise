<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Transaction;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function attendence()
    {
        $employees = Employee::with(['attendance' => function ($query) {
            $query->where('date', Carbon::now()->format('Y-m-d'));
        }])->get();
    
        $now = Carbon::now();

$CanHalfDay = Employee::with(['attendance' => function ($query) use ($now) {
    $query->whereMonth('date', $now->month)
        ->whereYear('date', $now->year)
        ->where('is_half_day', 1);
}])
->get()
->filter(function ($employee) {
    return $employee->attendance->where('is_half_day', 1)->count() < 2;
});

    
   
    
        return view('Attendence.attendence', compact('employees','CanHalfDay'));
    }



    public function attendencePost(Request $request, $id)
    {
        // Assuming you have an Employee model
        $employee = Employee::find($id);

        if (!$employee) {
            return redirect('attendence')->with('error', 'Employee not found');
        }

        $formattedDate = Carbon::now()->toDateString();

        if ($request->has('attendance')) {
            $attendance = Attendance::create([
                'employee_id' => $id,
                'type' => 'PRESENT',
                'date' => $formattedDate,
                'is_half_day' => $request->is_half_day,
                'extra_hours'=> $request->hours
            ]);
            if ($attendance->type == Attendance::PRESENT) {
                $employee_salary = $employee->salary_per_day;
                if ($request->has('hours') && !is_null($request->hours) && $request->hours > 0) {
                    $employee_salary = $employee_salary + (($employee->salary_per_day / 8) * $request->hours);
                }
                if ($attendance->is_half_day) {
                    $employee_salary = $employee_salary / 2;
                }
                Transaction::create(
                    [
                        'employee_id' => $employee->id,
                        'amount' => $employee_salary,
                        'type' => Transaction::CREDIT,
                        'note' => 'salary',
                    ]
                );
            }
        } else {
            $attendance = Attendance::create([
                'employee_id' => $id,
                'type' => 'ABSENT',
                'date' => $formattedDate,
            ]);
        }

        if ($request->has('withdraw') && !is_null($request->withdraw) && $request->withdraw > 0) {
            Transaction::create(
                [
                    'employee_id' => $employee->id,
                    'amount' => $request->withdraw,
                    'type' => Transaction::DEBIT,
                    'note' => 'withdraw',
                ]
            );
        }


        $message = $employee->name . ' attendance is updated';
        return redirect('/attendence/getattendence')->with('success', $message);
    }


    //Undo the Employee Attendence
    public function undoAttendence(Request $request, $id)
{
    $employee = Employee::find($id);

    $formattedDate = Carbon::now()->toDateString();

    // Delete attendance record
    $attendance = $employee->attendance()->where('date', $formattedDate)->first();
    if ($attendance) {
        $attendance->delete();
    }

    // Delete credit and debit transactions for the current date
    $employee->transactions()->whereDate('created_at', $formattedDate)
        ->whereIn('type', ['credit', 'debit'])
        ->delete();

    $employee->amount_portfolio = Employee::calculatePortfolio($employee);
    $employee->save();

    $message = $employee->name . " attendance " . $formattedDate . " have been Undo.";

    return redirect('/attendence/getattendence')->with('undo', $message);
}

    
}
