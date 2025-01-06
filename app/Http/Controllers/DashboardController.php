<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Account;
use App\Models\Operation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Charts\ExpenseRevenue;

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

        $totalBalanceCC = Account::where('status', 1)
            ->where('type', 'CC')
            ->sum('balance');
        $totalBalanceCP = Account::where('status', 1)
            ->where('type', 'CP')
            ->sum('balance');

        //Dados para os gráficos
        $chartExpenses = DB::table('operations')
            ->where('status', 1)
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->where('type', 'D')
            ->select(DB::raw('SUM(amount) as total'), DB::raw('MONTH(date) as mes'))
            ->groupBy('mes')
            ->pluck('total', 'mes')->toArray();

        $chartRevenues = DB::table('operations')
            ->where('status', 1)
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->where('type', 'C')
            ->select(DB::raw('SUM(amount) as total'), DB::raw('MONTH(date) as mes'))
            ->groupBy('mes')
            ->pluck('total', 'mes')->toArray();

        $chart = new ExpenseRevenue;
        $chart->labels(\array_keys($chartExpenses));
        $chart->dataset('Despesas', 'line', \array_values($chartExpenses))
            ->color('red')
            ->backgroundcolor('red');
        $chart->dataset('Receitas', 'line', \array_values($chartRevenues))
            ->color('green')
            ->backgroundcolor('green');

        //Enviar os dados para a view    
              
        return \view('dashboards.index',[
            'menu' => 'dashboard',
            'totalRevenue' => $totalRevenue,
            'totalExpense' => $totalExpense,
            'accounts'     => $accounts,
            'totalBalanceCC' => $totalBalanceCC,
            'totalBalanceCP' => $totalBalanceCP,
            'chart' => $chart,
            ]);
    }
}
