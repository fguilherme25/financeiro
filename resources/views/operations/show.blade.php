@extends('layouts.main')

@section('title','Operação')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Operação</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Sistema</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('operation.index') }}" class="text-decoration-none">Operações</a>
                </li>
                <li class="breadcrumb-item active">{{ $operation->expense->name }}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Detalhes da Operação</div>
                <div class="ms-auto">
                    <a href="{{ route('operation.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-money-bill-transfer mx-2"></i>Operações
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="fs-5 mb-3">
                    @if ($operation->type=="C")
                        Crédito
                    @else
                        Débito
                    @endif
                </div>
                <dl class="row">
                    <dt class="col-sm-1">Data</dt>
                    <dd class="col-sm-11">{{ $operation->date }}</dd>
                    <dt class="col-sm-1">Banco</dt>
                    <dd class="col-sm-11">{{ $operation->account->bank->name }}</dd>
                    <dt class="col-sm-1">Conta</dt>
                    <dd class="col-sm-11">{{ $operation->account->number }} - {{ $operation->account->digit }}</dd>
                    <dt class="col-sm-1">Despesa</dt>
                    <dd class="col-sm-11">{{ $operation->expense->name }}</dd>
                    <dt class="col-sm-1">Descrição</dt>
                    <dd class="col-sm-11">{{ $operation->description }}</dd>
                    <dt class="col-sm-1">Valor (R$)</dt>
                    <dd class="col-sm-11">{{ $operation->amount }}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection