@extends('layouts.main')

@section('title','Operação')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Operação</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Sistema</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('account.index') }}" class="text-decoration-none">Operações</a>
                </li>
                <li class="breadcrumb-item active">Nova Operação</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Nova Operação</div>
                <div class="ms-auto">
                    <a href="{{ route('operation.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-receipt mx-2"></i>Operações
                    </a>
                </div>
            </div>
            <form action="{{ route('operation.store') }}" method="POST">
                @csrf
                    
                <div class="card-body">
                    <x-alert />

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="C">
                            <label class="form-check-label" for="type">Crédito</label>
                        </div>  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="D">
                            <label class="form-check-label" for="type">Débito</label>
                        </div>
                    </div>

                    <select name="account_id" id="account_id" class="form-select form-select-lg mb-3">
                        <option value="" disabled selected>Selecione uma Conta</option>
                        @foreach($accounts as $account) 
                            <option value="{{ $account->id }}" {{ old('account_id') == $account->id ? 'selected' : '' }}>
                                {{ $account->bank->name }} - {{ $account->number }}-{{ $account->digit }}
                            </option> 
                        @endforeach 
                    </select>

                    <select name="expense_id" id="expense_id" class="form-select form-select-lg mb-3">
                        <option value="" disabled selected>Selecione uma Despesa</option>
                        @foreach($expenses as $expense) 
                            <option value="{{ $expense->id }}" {{ old('expense_id') == $expense->id ? 'selected' : '' }}>
                                {{ $expense->name }}
                            </option> 
                        @endforeach 
                    </select>
 
                    <div class="d-flex">
                        <div class="form-floating mb-3 me-2">
                            <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}" placeholder="Data" required>
                            <label for="code">Data</label>
                        </div>

                        <div class="form-floating col-4 mb-3 me-2">
                            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="Conta" required>
                            <label for="code">Descrição</label>
                        </div>
                        <div class="form-floating mb-3 me-2">
                            <input type="text" class="form-control text-end" name="amount" id="amount" value="{{ old('amount') }}" placeholder="Saldo" required>
                            <label for="code">Valor (R$)</label> 
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-1">
                        
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                </div>
            </form>               
        </div>
    </div>
@endsection