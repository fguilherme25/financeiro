<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Account;
use App\Models\Operation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Charts\ExpenseRevenue;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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

        $operationsExpense = DB::table('operations')
            ->select('expenses.name', DB::raw('SUM(amount) as total'))
            ->where('operations.status', 1)
            ->where('operations.type', 'D')
            ->join('expenses', 'expenses.id','=','operations.expense_id')
            ->groupBy('expenses.name')
            ->orderBy('total','DESC')
            ->get();

        $operationsCategory = DB::table('operations')
            ->select('categories.name', DB::raw('SUM(amount) as total'))
            ->where('operations.status', 1)
            ->where('operations.type', 'D')
            ->join('expenses', 'expenses.id','=','operations.expense_id')
            ->join('categories', 'categories.id','=','expenses.category_id')
            ->groupBy('categories.name')
            ->orderBy('total','DESC')
            ->get();

        $accounts = Account::where('status', 1)
            ->orderBy('type')
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
            'menu'               => 'dashboard',

            'totalRevenue'       => $totalRevenue,
            'totalExpense'       => $totalExpense,
            'operationsExpense'  => $operationsExpense,
            'operationsCategory' => $operationsCategory,
            'accounts'           => $accounts,
            'totalBalanceCC'     => $totalBalanceCC,
            'totalBalanceCP'     => $totalBalanceCP,
            'chart'              => $chart,
            'currentMonth'       => $currentMonth,
            'currentYear'        => $currentYear,
            ]);
    }
}
