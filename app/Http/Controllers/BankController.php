<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Http\Controllers\Controller;
use App\Http\Requests\BankRequest;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::orderBy('name', 'ASC')->get();


        return \view('banks.index',['banks' => $banks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('banks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(StoreBankRequest $request)
    public function store(BankRequest $request)
    {
        $request->validated();

        Bank::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return \redirect()
                    ->route('banks.index')
                    ->with('success', 'Banco cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {

        return \view('banks.show', ['bank' => $bank]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return \view('banks.edit', ['bank' => $bank]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankRequest $request, Bank $bank)
    {
        $bank->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return \redirect()
                    ->route('banks.index')
                    ->with('success', 'Banco alterado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        return \view('banks.destroy', ['bank' => $bank]);
    }

    public function disable(Bank $bank)
    {
        $bank->update([
            'status' => 0,
        ]);

        return \redirect()
                    ->route('banks.index')
                    ->with('success', 'Banco excluído com sucesso!');

    }
}
