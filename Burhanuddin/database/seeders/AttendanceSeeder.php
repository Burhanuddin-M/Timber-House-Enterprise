<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::cursor();
        foreach ($employees as $employee) {
            $attendances = Attendance::factory(4)->for($employee)->create([
                'base_amount' => $employee->salary_per_day,
            ]);
            $date = Carbon::now()->subDays(10);
            foreach ($attendances as $attendance) {
                $attendance->date = $date;
                if ($attendance->type == Attendance::ABSENT) {
                    $attendance->base_amount = 0;
                    $attendance->total_amount = 0;
                    $attendance->extra_hours = 0;
                } else {
                    $attendance->total_amount = $attendance->base_amount + ($attendance->extra_hours * ($employee->salary_per_day / 8));
                }

                $attendance->save();
                $date = $date->addDay();
            }
        }
    }
}
