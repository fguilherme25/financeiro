<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Bank;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::where('status', 1)
            ->orderBy('bank_id')
            ->paginate(2);

        return \view('accounts.index',['accounts' => $accounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banks = Bank::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('accounts.create',['banks' => $banks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try{

            Account::create([
                'type' => $request->type,    
                'bank_id' => $request->bank_id,
                'agency' => $request->agency,
                'number' => $request->number,
                'digit' => $request->digit,
                'limit' => $request->limit,
                'balance' => $request->balance,
            ]);

            DB::commit();

            return \redirect()
                        ->route('account.index')
                        ->with('success', 'Conta cadastrada com sucesso!');
        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                        ->route('account.index')
                        ->with('error', 'Erro ao tentar cadastrar a Conta!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return \view('accounts.show', ['account' => $account]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $banks = Bank::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('accounts.edit', [
            'account' => $account,
            'banks' => $banks,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request, Account $account)
    {
        $request->validated();

        DB::beginTransaction();

        try{

            $account->update([
                'bank_id' => $request->bank_id,
                'agency' => $request->agency,
                'number' => $request->number,
                'digit' => $request->digit,
                'limit' => $request->limit,
            ]);

            DB::commit();

            return \redirect()
                        ->route('account.index')
                        ->with('success', 'Conta alterada com sucesso!');
        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                        ->route('account.index')
                        ->with('error', 'Erro ao tentar alterar a Conta!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Account $account)
    {
        return \view('accounts.destroy', ['account' => $account]);
    }

    public function disable(Account $account)
    {
        DB::beginTransaction();

        try{

            $account->update([
                'status' => 0,
            ]);

            DB::commit();

            return \redirect()
                        ->route('account.index')
                        ->with('success', 'Conta excluída com sucesso!');
        } catch (Exception $e){

            DB::rollBack();

            return \redirect()
                        ->route('account.index')
                        ->with('error', 'Erro ao tentar excluir a Conta!');
        }
    }
}
