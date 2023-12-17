<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
//     public function showtransaction()
// {
//     $transactions = Transaction::latest()->get();
//     return view('transactions', compact('transactions'));
// }

public function showTransaction(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // If both start_date and end_date are provided, filter transactions within the date range
    $transactions = $startDate && $endDate
        ? Transaction::whereBetween('created_at', [date("$startDate 00:00:00"), date("$endDate 23:59:59")])->latest()->get()
        : Transaction::latest()->get();

    
    //Porfolio according to current Date
    $DebitsAmount = Transaction::whereDate('created_at', today())->where('type', 'DEBIT')->sum('amount');
    $CreditsAmount = Transaction::whereDate('created_at',Carbon::now())->where('type','DEPOSIT')->sum('amount');
    $Portfolio = $CreditsAmount - $DebitsAmount;


    return view('transactions', compact('transactions','DebitsAmount','CreditsAmount','Portfolio'));
}



}
