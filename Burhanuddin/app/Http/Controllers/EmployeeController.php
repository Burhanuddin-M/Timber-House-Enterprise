<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendence;
use App\Models\Transaction;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function AddEmployee(){
        $Employees = Employee::all();
        return view('addEmployee',compact('Employees'));
    }

    public function PostAddEmployee(Request $request){
        $request->validate([
            'name'=>'required',
            'contact_no'=>'required',
            'salary_per_day'=>'required'
        ]);

        $Employee = new Employee();

        $Employee->name = $request->name;
        $Employee->contact_no = $request->contact_no;
        $Employee->salary_per_day = $request->salary_per_day;

        $Employee->save();

        $Message = $request->name." is added Successfully";

        return redirect('addEmployee')->with('success',$Message);
    }

    public function PostEditEmployee(Request $request,$id)
{


    $request->validate([
        'name' => 'required',
        'contact_no' => 'required',
        'salary_per_day' => 'required'
    ]);

    $employee = Employee::find($id);

    $employee->update([
        'name' => $request->name,
        'contact_no' => $request->contact_no,
        'salary_per_day' => $request->salary_per_day,
    ]);

    $Message = $request->name." is Updated Successfully";

        return redirect('addEmployee')->with('success',$Message);
   
    
}


public function masterTable(){
    // Get employees with attendance for the current month
    $Employees = Employee::with(['attendance' => function ($query) {
        $query->whereYear('date', Carbon::now()->year)
              ->whereMonth('date', Carbon::now()->month);
    }])->get();

    return view('masterTable', compact('Employees'));
}

   
    
    
}
