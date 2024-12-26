<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use Exception;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('expenses.index',['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('expenses.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try{

            Expense::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
            ]);

            DB::commit();

            return \redirect()
                        ->route('expense.index')
                        ->with('success', 'Despesa cadastrada com sucesso!');
        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                        ->route('expense.index')
                        ->with('error', 'Erro ao tentar cadastrar a Despesa!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return \view('expenses.show', ['expense' => $expense]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $categories = Category::where('status', 1)
            ->orderBy('name')
            ->get();

        return \view('expenses.edit', [
            'expense' => $expense,
            'categories' => $categories,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        $request->validated();

        DB::beginTransaction();

        try{

            $expense->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
            ]);

            DB::commit();

            return \redirect()
                        ->route('expense.index')
                        ->with('success', 'Despesa alterada com sucesso!');
        } catch (Exception $e){
            DB::rollBack();

            return \redirect()
                        ->route('expense.index')
                        ->with('error', 'Erro ao tentar alterar a Despesa!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        return \view('expenses.destroy', ['expense' => $expense]);
    }

    public function disable(Expense $expense)
    {
        DB::beginTransaction();

        try{

            $expense->update([
                'status' => 0,
            ]);

            DB::commit();

            return \redirect()
                        ->route('expense.index')
                        ->with('success', 'Despesa excluída com sucesso!');
        } catch (Exception $e){

            DB::rollBack();

            return \redirect()
                        ->route('expense.index')
                        ->with('error', 'Erro ao tentar excluir a Despesa!');
        }
    }
}
