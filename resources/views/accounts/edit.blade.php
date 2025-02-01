@extends('layouts.main')

@section('title','Conta')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Conta</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('account.index') }}" class="text-decoration-none">Contas</a>
                </li>
                <li class="breadcrumb-item active">{{ $account->number}} - {{ $account->digit}}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Alteração de Conta</div>
                <div class="ms-auto">
                    <a href="{{ route('account.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-receipt mx-2"></i>Contas
                    </a>
                </div>
            </div>
            <form action="{{ route('account.update', ['account' => $account->id]) }}" method="POST">
                @csrf
                @method('PUT')
                    
                <div class="card-body">
                    <x-alert />

                    <input type="hidden" name="type" id="type" value="{{ $account->type }}">

                    <div class="fs-5 mb-3">
                        @if ($account->type=="CC")
                            Conta Corrente / {{ ($account->scope == 'PF' ? 'Pessoa Física' : 'Pessoa Jurídica') }}
                        @else
                            Conta Poupança / {{ ($account->scope == 'PF' ? 'Pessoa Física' : 'Pessoa Jurídica') }}
                        @endif
                    </div>

                    <select name="bank_id" id="bank_id" class="form-select form-select-lg mb-3">
                        <option value="" disabled selected>Selecione um Banco</option>
                        @foreach($banks as $bank) 
                            <option value="{{ $bank->id }}" {{ old('bank_id',$account->bank_id) == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option> 
                        @endforeach 
                    </select>

                    <div class="d-flex">
                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control" name="agency" id="agency" value="{{ old('agency',$account->agency) }}" placeholder="Agência" required>
                            <label for="code">Agência</label>
                        </div>

                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control" name="number" id="number" value="{{ old('number',$account->number) }}" placeholder="Conta" required>
                            <label for="code">Conta</label>
                        </div>

                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control" name="digit" id="digit" value="{{ old('digit',$account->digit) }}" placeholder="Dígito" required>
                            <label for="code">Dígito</label>
                        </div>

                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control text-end numeric-mask" name="limit" id="limit" value="{{ old('limit',$account->limit) }}" placeholder="Limite" required>
                            <label for="code">Limite (R$)</label>
                        </div>

                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control text-end" name="balance" id="balance" value="{{ old('balance',$account->balance) }}" placeholder="Saldo" readonly>
                            <label for="code">Saldo (R$)</label>
                        </div>
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