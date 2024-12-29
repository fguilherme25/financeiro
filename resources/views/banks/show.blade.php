@extends('layouts.main')

@section('title','Banco')

@section('content')
    <div class="container-fluid mt-4 px-4">
        <div class="hstack gap-2">
            <h4>Banco</h4>

            <ol class="breadcrumb ms-auto">
                <li class="breadcrumb-item">Cadastro</li>
                <li class="breadcrumb-item" >
                    <a href="{{ route('bank.index') }}" class="text-decoration-none">Bancos</a>
                </li>
                <li class="breadcrumb-item active">{{ $bank->name }}</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <div>Detalhes do Banco</div>
                <div class="ms-auto">
                    <a href="{{ route('bank.index') }}" class="btn btn-secondary btn-sm" role="button">
                        <i class="fa-solid fa-building-columns mx-2"></i>Bancos
                    </a>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-1">Código</dt>
                    <dd class="col-sm-11">{{ $bank->code }}</dd>
                    <dt class="col-sm-1">Nome</dt>
                    <dd class="col-sm-11">{{ $bank->name }}</dd>
                </dl>

                <hr>

                <table class="table table-sm caption-top">
                    <caption>Contas do Banco</caption>
                    <thead>
                        <th>Agëncia</th>
                        <th>Conta</th>
                    </thead>
                    <tbody>
                        @forelse ($bank->account as $account)
                            <td>{{ $account->agency }}</td>
                            <td>{{ $account->number }} - {{ $account->digit }}</td>
                        @empty
                            <div class="alert alert-info" role="alert">
                                Nenhuma Conta cadastrada no Banco!
                            </div>  
                        @endforelse
                    </tbody>
                </table>                    
            </div>
        </div>
    </div>
@endsection