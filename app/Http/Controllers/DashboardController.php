<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Operation;
use Illuminate\Http\Request;
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
            'totalRevenue' => $totalRevenue,
            'totalExpense' => $totalExpense,
            'accounts'     => $accounts,
            'totalBalance' => $totalBalance,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
