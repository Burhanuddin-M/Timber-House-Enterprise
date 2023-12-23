<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::cursor();
        foreach ($employees as $employee) {
            $transactions = Transaction::factory(10)->for($employee)->create();
        }
    }
}
