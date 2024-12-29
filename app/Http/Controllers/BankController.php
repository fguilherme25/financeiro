<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Http\Requests\BankRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('banks.index', [
            'menu' => 'bank',
            'banks' => $banks
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('banks.create',['menu' => 'bank',]);
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(StoreBankRequest $request)
    public function store(BankRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try{
            Bank::create([
                'code' => $request->code,
                'name' => $request->name,
            ]);

            DB::commit();

            return \redirect()
                        ->route('bank.index')
                        ->with('success', 'Banco cadastrado com sucesso!');

        } catch (Exception $e){
            
            DB::rollBack();

            return \redirect()
                        ->route('bank.index')
                        ->with('error', 'Erro ao tentar cadastrar o Banco!');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {

        return \view('banks.show', [
            'menu' => 'bank',
            'bank' => $bank
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return \view('banks.edit', [
            'menu' => 'bank',
            'bank' => $bank
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankRequest $request, Bank $bank)
    {
        $request->validated();

        DB::beginTransaction();

        try{

            $bank->update([
                'code' => $request->code,
                'name' => $request->name,
            ]);

            DB::commit();

            return \redirect()
                        ->route('bank.index')
                        ->with('success', 'Banco alterado com sucesso!');
        } catch (Exception $e){

            DB::rollBack();

            return \redirect()
                        ->route('bank.index')
                        ->with('error', 'Erro ao tentar alterar o Banco!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        return \view('banks.destroy', [
            'menu' => 'bank',
            'bank' => $bank
            ]);
    }

    public function disable(Bank $bank)
    {

        DB::beginTransaction();

        try{
            $bank->update([
                'status' => 0,
            ]);

            DB::commit();

            return \redirect()
                        ->route('bank.index')
                        ->with('success', 'Banco excluído com sucesso!');

        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                        ->route('bank.index')
                        ->with('error', 'Erro ao tentar excluir o Banco!');
        }
    }
}
