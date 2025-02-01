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
                <li class="breadcrumb-item active">Nova Conta</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Nova Conta</div>
                <div class="ms-auto">
                    <a href="{{ route('account.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-receipt mx-2"></i>Contas
                    </a>
                </div>
            </div>
            <form action="{{ route('account.store') }}" method="POST">
                @csrf
                    
                <div class="card-body">
                    <x-alert />

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="CC">
                            <label class="form-check-label" for="type">Conta Corrente</label>
                        </div>  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type" value="CP">
                            <label class="form-check-label" for="type">Conta Poupança</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="scope" id="scope" value="PF">
                            <label class="form-check-label" for="scope">Pessoa Física</label>
                        </div>  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="scope" id="scope" value="PJ">
                            <label class="form-check-label" for="scope">Pessoa Jurídica</label>
                        </div>
                    </div>

                    <select name="bank_id" id="bank_id" class="form-select form-select-lg mb-3">
                        <option value="" disabled selected>Selecione um Banco</option>
                        @foreach($banks as $bank) 
                            <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option> 
                        @endforeach 
                    </select>

                    <div class="d-flex">
                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control" name="agency" id="agency" value="{{ old('agency') }}" placeholder="Agência" required>
                            <label for="code">Agência</label>
                        </div>

                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control" name="number" id="number" value="{{ old('number') }}" placeholder="Conta" required>
                            <label for="code">Conta</label>
                        </div>

                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control" name="digit" id="digit" value="{{ old('digit') }}" placeholder="Dígito" required>
                            <label for="code">Dígito</label>
                        </div>

                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control text-end numeric-mask" name="limit" id="limit" value="{{ old('limit') }}" placeholder="Limite" required>
                            <label for="code">Limite (R$)</label>
                        </div>

                        <div class="form-floating mb-3 col-1 me-2">
                            <input type="text" class="form-control text-end numeric-mask" name="balance" id="balance" value="{{ old('balance') }}" placeholder="Saldo" required>
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