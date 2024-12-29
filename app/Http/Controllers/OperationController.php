<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Account;
use App\Models\Expense;
use App\Models\Operation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\OperationRequest;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operations = Operation::where('status', 1)
            ->orderBy('date')
            ->paginate(20);

        return \view('operations.index',[
            'menu' => 'operation',
            'operations' => $operations
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
