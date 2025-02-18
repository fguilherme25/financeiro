<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Account;
use App\Models\Expense;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\OperationRequest;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentAccount = '';
        $currentMonth = ''; 
        $currentYear = ''; 

        $operations = Operation::where('status', 1)
            ->orderBy('date', 'DESC');

        $accounts = Account::where('status', 1)
            ->orderBy('bank_id')
            ->get();

        if($request->filled('operationMonth')){
            $currentMonth = $request->operationMonth; 
            $currentYear = $request->operationYear; 

            $operations->whereMonth('date', $currentMonth);
            $operations->whereYear('date', $currentYear);
        }

        if ($request->filled('account_id')){
            $operations->where('account_id', $request->account_id);

            $currentAccount = $request->account_id;
        }

        $operations = $operations
            ->paginate(20);

        return \view('operations.index',[
            'menu' => 'operation',
            'operations' => $operations,
            'accounts' => $accounts,
            'currentAccount' => $currentAccount,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::where('status', 1)
            ->orderBy('bank_id')
            ->get();

        $expenses = Expense::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('operations.create',[
            'menu' => 'operation',
            'accounts' => $accounts,
            'expenses' => $expenses,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OperationRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try{

            Operation::create([
                'account_id' => $request->account_id,    
                'expense_id' => $request->expense_id,
                'date' => $request->date,
                'type' => $request->type,
                'description' => $request->description,
                'amount' => $request->amount,
            ]);

            $this->updateBalance($request->account_id, $request->amount, $request->type);

            DB::commit();

            return \redirect()
                        ->route('operation.index')
                        ->with('success', 'Operação cadastrada com sucesso!');
        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                       ->route('operation.index')
                        ->with('error', 'Erro ao tentar cadastrar a Operação!');
        }
    }

    public function transfer()
    {
        $accounts = Account::where('status', 1)
            ->orderBy('bank_id')
            ->get();

        return \view('operations.transfer',[
            'menu' => 'operation',
            'accounts' => $accounts,
            ]);
    }

    public function dotransfer(OperationRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try{
            //Débito
            Operation::create([
                'account_id' => $request->account_id_debit,    
                'expense_id' => config('setup.transfer_account'),
                'date' => $request->date,
                'type' => 'S',
                'description' => $request->description,
                'amount' => $request->amount,
            ]);

            $this->updateBalance($request->account_id_debit, $request->amount, $request->type);

            //Crédito
            Operation::create([
                'account_id' => $request->account_id_credit,    
                'expense_id' => config('setup.transfer_account'),
                'date' => $request->date,
                'type' => 'E',
                'description' => $request->description,
                'amount' => $request->amount,
            ]);

            $this->updateBalance($request->account_id_credit, $request->amount, $request->type);

            DB::commit();

            return \redirect()
                        ->route('operation.index')
                        ->with('success', 'Operação cadastrada com sucesso!');
        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                       ->route('operation.index')
                        ->with('error', 'Erro ao tentar cadastrar a Operação!');
        }
    }
    
    private function updateBalance($account_id, $amount, $type)
    {
        $account = Account::findOrFail($account_id);

        if ($type === 'C' or $type === 'E') {
            $account->balance += $amount;
        } else {
            $account->balance -= $amount;
        }

        $account->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Operation $operation)
    {
        return \view('operations.show', [
            'menu' => 'operation',
            'operation' => $operation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OperationRequest $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operation $operation)
    {
        return \view('operations.destroy', [
            'menu' => 'operation',
            'operation' => $operation]);
    }

    public function disable(Operation $operation)
    {
        DB::beginTransaction();

        try{

            $operation->update([
                'status' => 0,
            ]);

            DB::commit();

            return \redirect()
                        ->route('operation.index')
                        ->with('success', 'Operação excluída com sucesso!');
        } catch (Exception $e){

            DB::rollBack();

            return \redirect()
                        ->route('account.index')
                        ->with('error', 'Erro ao tentar excluir a Operação!');
        }
    }
}
