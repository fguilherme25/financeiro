<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Expense;
use App\Models\Payment;
use App\Models\Creditcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentCreditcard = '';
        $currentMonth = Carbon::now()->month; 
        $currentYear = Carbon::now()->year; 

        $payments = Payment::where('status', 1)
            ->orderBy('date', 'DESC');

        $creditcards = Creditcard::where('status', 1)
            ->orderBy('name')
            ->get();

        $allMonth = Payment::where('status', 1)
            ->distinct()->pluck('invoiceMonth');

        $allYear = Payment::where('status', 1)
            ->distinct()->pluck('invoiceYear');    
           
        if($request->filled('invoiceMonth')){
            $currentMonth = $request->invoiceMonth;
            $currentYear = $request->invoiceYear;
        
            if ($request->filled('creditcard_id')){
                $payments->where('creditcard_id', $request->creditcard_id);
                $currentCreditcard = $request->creditcard_id;
            }
        }

        $payments = $payments
            ->where('invoiceYear', $currentYear)
            ->where('invoiceMonth', $currentMonth)
            ->paginate(5000);

        return \view('payments.index',[
            'menu' => 'payment',
            'payments' => $payments,
            'creditcards' => $creditcards,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            'currentCreditcard' => $currentCreditcard,
            'allMonths' => $allMonth,
            'allYears' => $allYear,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $creditcards = Creditcard::where('status', 1)
            ->orderBy('name')
            ->get();

        $expenses = Expense::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('payments.create',[
            'menu' => 'payment',
            'creditcards' => $creditcards,
            'expenses' => $expenses,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        $invoiceMonth = $request->invoiceMonth;
        $invoiceYear = $request->invoiceYear;
        $first = $request->first;

        try{

            for ($i=$first; $i < $request->last + 1 ; $i++) { 
                Payment::create([
                    'creditcard_id' => $request->creditcard_id,    
                    'expense_id' => $request->expense_id,
                    'date' => $request->date,
                    'description' => $request->description,
                    'amount' => $request->amount,
                    'invoiceMonth' => $invoiceMonth,
                    'invoiceYear' => $invoiceYear,
                    'first' => $i,
                    'last' => $request->last,
                ]);

                $invoiceMonth++;

                if ($invoiceMonth == 13) {
                    $invoiceMonth = 1;
                    $invoiceYear++;
                }
            }

            DB::commit();

            return \redirect()
                        ->route('payment.index')
                        ->with('success', 'Despesa cadastrada com sucesso!');
        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                        ->route('payment.index')
                        ->with('error', 'Erro ao tentar cadastrar a Despesa!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return \view('payments.show', [
            'menu' => 'payment',
            'payment' => $payment
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $creditcards = Creditcard::where('status', 1)
            ->orderBy('name')
            ->get();

        $expenses = Expense::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('payments.edit',[
            'menu' => 'payment',
            'creditcards' => $creditcards,
            'expenses' => $expenses,
            'payment' => $payment,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Payment $payment)
    {
        return \view('payments.destroy', [
            'menu' => 'payment',
            'payment' => $payment
            ]);
    }

    public function disable(Payment $payment)
    {
        DB::beginTransaction();

        try{

            $payment->update([
                'status' => 0,
            ]);

            DB::commit();

            return \redirect()
                        ->route('payment.index')
                        ->with('success', 'Despesa excluída com sucesso!');
        } catch (Exception $e){

            DB::rollBack();

            return \redirect()
                        ->route('payment.index')
                        ->with('error', 'Erro ao tentar excluir a Despesa!');
        }
    }
}
