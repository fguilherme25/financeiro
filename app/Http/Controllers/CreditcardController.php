<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Creditcard;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreditcardRequest;
use Illuminate\Http\Request;

class CreditcardController extends Controller
{
    public function dashboard(Request $request)
    {
        $currentCreditcard = '';
        $currentMonth = Carbon::now()->month; 
        $currentYear = Carbon::now()->year; 

        $creditcards = Creditcard::where('status', 1)
            ->orderBy('name')
            ->get();

        $paymentsExpense = DB::table('payments')
            ->select('expenses.name', DB::raw('SUM(amount) as total'))
            ->where('payments.status', 1)
            ->join('expenses', 'expenses.id','=','payments.expense_id')
            ->groupBy('expenses.name')
            ->orderBy('total');

        $paymentsCategory = DB::table('payments')
            ->select('categories.name', DB::raw('SUM(amount) as total'))
            ->where('payments.status', 1)
            ->join('expenses', 'expenses.id','=','payments.expense_id')
            ->join('categories', 'categories.id','=','expenses.category_id')
            ->groupBy('categories.name')
            ->orderBy('total');

        $totalExpense = Payment::where('status', 1);

        $allMonth = Payment::where('status', 1)
            ->distinct()->pluck('invoiceMonth');

        $allYear = Payment::where('status', 1)
            ->distinct()->pluck('invoiceYear');

        if($request->filled('invoiceMonth')){
            $currentMonth = $request->invoiceMonth;
            $currentYear = $request->invoiceYear;
        
            if ($request->filled('creditcard_id')){
                $totalExpense->where('creditcard_id', $request->creditcard_id);
                $paymentsExpense->where('payments.creditcard_id', $request->creditcard_id);
                $paymentsCategory->where('payments.creditcard_id', $request->creditcard_id);
                $currentCreditcard = $request->creditcard_id;
            }
        }

        $totalExpense = $totalExpense
            ->where('invoiceYear', $currentYear)
            ->where('invoiceMonth', $currentMonth)
            ->sum('amount');
        $paymentsExpense = $paymentsExpense
            ->where('invoiceYear', $currentYear)
            ->where('invoiceMonth', $currentMonth)
            ->get();
        $paymentsCategory = $paymentsCategory
            ->where('invoiceYear', $currentYear)
            ->where('invoiceMonth', $currentMonth)
            ->get();

        return \view('creditcards.dashboard',[
            'menu' => 'creditcarddashboard',
            'totalExpense' => $totalExpense,
            'paymentsExpense' => $paymentsExpense,
            'paymentsCategory' => $paymentsCategory,
            'creditcards' => $creditcards,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            'currentCreditcard' => $currentCreditcard,
            'allMonths' => $allMonth,
            'allYears' => $allYear,
            ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditcards = Creditcard::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('creditcards.index',[
            'menu' => 'creditcard',
            'creditcards' => $creditcards,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('creditcards.create',[
            'menu' => 'creditcard',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreditcardRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try{

            Creditcard::create([
                'flag' => $request->flag,    
                'name' => $request->name,
                'category' => $request->category,
                'duedate' => $request->duedate,
                'limit' => $request->limit,
            ]);

            DB::commit();

            return \redirect()
                        ->route('creditcard.index')
                        ->with('success', 'Cartão de Crédito cadastrado com sucesso!');
        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                        ->route('creditcard.index')
                        ->with('error', 'Erro ao tentar cadastrar o Cartão de Crédito!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Creditcard $creditcard)
    {
        return \view('creditcards.show', [
            'menu' => 'creditcard',
            'creditcard' => $creditcard
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Creditcard $creditcard)
    {
        return \view('creditcards.edit', [
            'menu' => 'creditcard',
            'creditcard' => $creditcard,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreditcardRequest $request, Creditcard $creditcard)
    {
        $request->validated();

        DB::beginTransaction();

        try{

            $creditcard->update([
                'flag' => $request->flag,    
                'name' => $request->name,
                'category' => $request->category,
                'duedate' => $request->duedate,
                'limit' => $request->limit,
            ]);

            DB::commit();

            return \redirect()
                        ->route('creditcard.index')
                        ->with('success', 'Cartão de Crédito alterado com sucesso!');
        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                        ->route('creditcard.index')
                        ->with('error', 'Erro ao tentar alterar o Cartão de Crédito!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Creditcard $creditcard)
    {
        return \view('creditcards.destroy', [
            'menu' => 'creditcard',
            'creditcard' => $creditcard
            ]);
    }

    public function disable(Creditcard $creditcard)
    {
        DB::beginTransaction();

        try{

            $creditcard->update([
                'status' => 0,
            ]);

            DB::commit();

            return \redirect()
                        ->route('creditcard.index')
                        ->with('success', 'Cartão de Crédito excluído com sucesso!');
        } catch (Exception $e){

            DB::rollBack();

            return \redirect()
                        ->route('creditcard.index')
                        ->with('error', 'Erro ao tentar excluir o Cartão de Crédito!');
        }
    }
}
