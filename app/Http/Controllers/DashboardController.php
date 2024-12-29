<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Operation;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentMonth = Carbon::now()->month; 
        $currentYear = Carbon::now()->year; 

        $totalRevenue = Operation::where('status', 1)
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->where('type', 'C')
            ->sum('amount');

        $totalExpense = Operation::where('status', 1)
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->where('type', 'D')
            ->sum('amount');

        $accounts = Account::where('status', 1)
            ->orderBy('bank_id')
            ->get();

        $totalBalance = Account::where('status', 1)
            ->sum('balance');


        return \view('dashboards.index',[
            'menu' => 'dashboard',
            'totalRevenue' => $totalRevenue,
            'totalExpense' => $totalExpense,
            'accounts'     => $accounts,
            'totalBalance' => $totalBalance,
            ]);
    }
}
