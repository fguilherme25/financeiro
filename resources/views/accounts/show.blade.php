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
                <li class="breadcrumb-item active">{{ $account->number }} - {{ $account->digit }}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Detalhes da Conta</div>
                <div class="ms-auto">
                    <a href="{{ route('account.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-receipt mx-2"></i>Contas
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="fs-5 mb-3">
                    @if ($account->type=="CC")
                        Conta Corrente / {{ ($account->scope == 'PF' ? 'Pessoa Física' : 'Pessoa Jurídica') }}
                    @else
                        Conta Poupança / {{ ($account->scope == 'PF' ? 'Pessoa Física' : 'Pessoa Jurídica') }}
                    @endif
                </div>
                <dl class="row">
                    <dt class="col-sm-1">Banco</dt>
                    <dd class="col-sm-11">{{ $account->bank->name }}</dd>
                    <dt class="col-sm-1">Agência</dt>
                    <dd class="col-sm-11">{{ $account->agency }}</dd>
                    <dt class="col-sm-1">Conta</dt>
                    <dd class="col-sm-11">{{ $account->number }} - {{ $account->digit }}</dd>
                    <dt class="col-sm-1">Limite</dt>
                    <dd class="col-sm-11 numeric-mask">{{ $account->limit }}</dd>
                    <dt class="col-sm-1">Saldo</dt>
                    <dd class="col-sm-11 numeric-mask">{{ $account->balance }}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection