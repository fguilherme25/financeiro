@extends('layouts.main')

@section('title','Operação')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Transferência</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Sistema</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('account.index') }}" class="text-decoration-none">Operações</a>
                </li>
                <li class="breadcrumb-item active">Nova Transferência</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Nova Transferência</div>
                <div class="ms-auto">
                    <a href="{{ route('operation.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-receipt mx-2"></i>Operações
                    </a>
                </div>
            </div>
            <form action="{{ route('operation.dotransfer') }}" method="POST">
                @csrf
                    
                <div class="card-body">
                    <x-alert />

                    <select name="account_id_debit" id="account_id_debit" class="form-select form-select-lg mb-3">
                        <option value="" disabled selected>Selecione a Conta Débito</option>
                        @foreach($accounts as $account) 
                            <option value="{{ $account->id }}" {{ old('account_id_debit') == $account->id ? 'selected' : '' }}>
                                {{ $account->bank->name }} - {{ $account->number }}-{{ $account->digit }} / {{ $account->type }}-{{ $account->scope }}
                            </option> 
                        @endforeach 
                    </select>

                    <select name="account_id_credit" id="account_id_credit" class="form-select form-select-lg mb-3">
                        <option value="" disabled selected>Selecione a Conta Crédito</option>
                        @foreach($accounts as $account) 
                            <option value="{{ $account->id }}" {{ old('account_id_credit') == $account->id ? 'selected' : '' }}>
                                {{ $account->bank->name }} - {{ $account->number }}-{{ $account->digit }} / {{ $account->type }}-{{ $account->scope }}
                            </option> 
                        @endforeach 
                    </select>

                    <div class="d-flex">
                        <div class="form-floating mb-3 me-2">
                            <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}" placeholder="dd/mm/aaaa" required>
                            <label for="date">Data</label>
                        </div>

                        <div class="form-floating col-4 mb-3 me-2">
                            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="Conta" required>
                            <label for="description">Descrição</label>
                        </div>
                        <div class="form-floating mb-3 me-2">
                            <input type="text" class="form-control text-end numeric-mask" name="amount" id="amount" value="{{ old('amount') }}" placeholder="Saldo" required>
                            <label for="amount">Valor (R$)</label> 
                        </div>
                    </div>

                    <div class="form-floating mb-3 col-1">
                        
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-download mx-1"></i>
                        Salvar
                    </button>
                </div>
            </form>               
        </div>
    </div>
@endsection

